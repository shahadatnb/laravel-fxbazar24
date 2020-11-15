<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\Wallets;
use App\Wallet;
use App\AdminWallet;
use App\EarnWallet;
use App\UserPin;
use App\User;
use Session;
use Carbon\Carbon;
use Auth;
use DB;

class HomeController extends Controller
{
    use Wallets;
    private $withdrowAmt = 3;
    private $mBonus = 10;
    private $dayLimit = 200;
    private $freeLimit = 50;
    private $upgrateAmt = 120;
    private $count = 1;
    private $lCcount = 1;

    public function pending(){
         return view('pages.pending');
    }

    public function index(){
        $this->rank();
        $this->slot();
        $user_id= Auth::user()->id;
       $wallets=$this->allBalance($user_id);
       $wallets['totalWithdraw'] = ['balance'=>$this->totalBalance($user_id,'withdrawWallet'),'title'=>'Total Withdraw','bg'=>'success'];
       $wallets['totalSponsor'] = ['balance'=>$this->totalBalance($user_id,'sponsorWallet'),'title'=>'Total Sponsor','bg'=>'dark'];
       $wallets['totalSelf'] = ['balance'=>$this->totalBalance($user_id,'selfWallet'),'title'=>'Total Youtube Income','bg'=>'secondary'];
       $wallets['youtube'] = ['balance'=>$this->youtubeBalance($user_id),'title'=>'Youtube Wallet','bg'=>'danger'];
        return view('pages.dashboard',compact('wallets'));
    }    

    public function rankList(){
       $rankInfo = $this->rank;
       array_shift($rankInfo);
       //dd($rankInfo);
        return view('pages.rankList',compact('rankInfo'));
    }

    public function memberList()
    {
        $totalMember = User::myChild(Auth::user()->id);
        $members = User::where('placementId',Auth::user()->id)->get();
        return view('pages.memberList',compact('members','totalMember'));
    }

    public function mySponsor()
    {
        $members = User::where('referralId',Auth::user()->id)->get();
        return view('pages.mySponsor',compact('members'));
    }

    public function memberListId($id)
    {
        $totalMember = User::myChild($id);
        $members = User::where('placementId',$id)->get();
        return view('pages.memberList',compact('members','totalMember'));
    }

    public function myWallet($wallet)
    {
        $transaction = $this->listBalance(Auth::user()->id,$wallet);
        $balance = $this->balance(Auth::user()->id,$wallet);
        $walletName = $this->wallets[$wallet]['title'];
        return view('pages.wallet',compact('transaction','balance','walletName','wallet'));
    }

    public function youtubeWallet()
    {
        $user_id = Auth::user()->id;
        $transaction = EarnWallet::where('user_id',$user_id)->whereNull('receipt')->take(10)->get();
        $balance = $this->youtubeBalance($user_id);
        $walletName = 'Youtube Earn';
        $wallet = 'youtubeWallet';
        return view('wallet.youtubeWallet',compact('transaction','balance','walletName','wallet'));
    }

    public function rank(){
        $userRank = Auth::user()->rank;

        if($userRank == 0){
            $cLeft=User::myChildAmount(Auth::user()->id,1);
            $cRight=User::myChildAmount(Auth::user()->id,2);           
        }else{
            $cLeft=User::myChildByPack(Auth::user()->id,1,$userRank);
            $cRight=User::myChildByPack(Auth::user()->id,2,$userRank); 
        }
        
        if($cLeft<=$cRight){
            $small = $cLeft;
        }else{
            $small = $cRight;
        } 

        $userRank++;
        $rank = $this->rank;
        //dd($cLeft); exit;
        if($small >= $rank[$userRank]['point']){

            $user = User::find(Auth::user()->id);
            $user->rank = $userRank;
            $user->save();

            $data2 = new Wallet;
            $data2->user_id = Auth::user()->id;
            $data2->receipt = $rank[$userRank]['amount'];
            $data2->wType = 'rankWallet';
            $data2->remark = 'Rank Bonus #'.$userRank;
            $data2->save();
        }

        return null;
    }


   protected function slot(){
        $cLeft=User::myChildAmount(Auth::user()->id,1);
        $cRight=User::myChildAmount(Auth::user()->id,2);
        if($cLeft<=$cRight){
            $small = $cLeft;
        }else{
            $small = $cRight;
        }
        
        $userSlot = Auth::user()->slot;
        $userSlot++;
        $slot = $this->slot;
        //dd($cLeft); exit;
        if($small >= $slot[$userSlot]){

            $user = User::find(Auth::user()->id);
            $user->rank = $userSlot;
            $user->save();

            $data2 = new Wallet;
            $data2->user_id = Auth::user()->id;
            $data2->receipt = $slot[$userSlot]*.5;
            $data2->wType = 'generationWallet';
            $data2->remark = 'Generation Bonus #'.$userSlot;
            $data2->save();
        }

        return null;
    }


    public function level()
    {
        $ids  = array(Auth::user()->id);
        //$ids  = array(2,3,30,31);
        $datas  = array();
        for($i=1;$i<11;$i++){
            if(!empty($ids)){
                $ids = User::whereIn('referralId',$ids)->pluck('id')->toArray();
                $datas[$i] = count($ids);
            }
        }

        return view('pages.lavelList',compact('datas'));
    }

    
    public function levelTree()
    {
        $member = User::find(Auth::user()->id);
        return view('pages.levelTree')->withMembers($member);
    }

    public function levelTreeId($id)
    {
        if($id < Auth::user()->id){
            return redirect()->back();
        }
        $member = User::find($id);
        return view('pages.levelTree')->withMembers($member);
    }



/*#################            ########################################  */

    public function sendMoneyAc(Request $request)
    {
        $this->validate($request, array(
            'user_id' => 'required|exists:users,id',
            'wType' => 'required',
            'remark' => 'nullable',
            'payment' => 'required|numeric',//|min:'.$this->withdrowAmt,
            )
        );

        if($this->balance(Auth::user()->id,$request->wType) < $request->payment ){
            Session::flash('warning','Sorry, Your Balance Less then'.$request->payment);
        }else{
            $data = new Wallet;
            $data->user_id = Auth::user()->id;
            $data->payment = $request->payment;
            $data->wType = $request->wType;
            $data->remark = 'Sent to ID# '.$request->user_id.' '.$request->remark;
            $data->save();

            //$payble = $request->payment - ($request->payment/100)*5;
            $data2 = new Wallet;
            $data2->user_id = $request->user_id;
            $data2->receipt = $request->payment;//$payble;
            $data2->wType = $request->wType;
            $data2->remark = 'Receipt Form ID# '.Auth::user()->id.'('.Auth::user()->name.')';
            $data2->save();

            Session::flash('success','Money Sent');
        }

        return redirect()->back();
    }


    protected function adminId($id){
        $parent = User::find($id);
        if($parent->admin == 1 ){
           Session::flash('adminId',$parent->id);// = $parent->id;
        }else{
            $this->adminId($parent->sponsorId);
        }
    }


    public function sendMoneyWw(Request $request)
    {
        $this->validate($request, array(
            'remark' => 'nullable',
            'payment' => 'required|numeric|min:'.$this->withdrowAmt,
            )
        );

        if($this->balance(Auth::user()->id,$request->wType) < $request->payment ){
            Session::flash('warning','Sorry, Your Balance Less then $'.$request->payment);
        }else{
            //$remark = $request->paymentMethod.' : '.$request->accountNo;
            //$payble = $request->payment - ($request->payment/100)*10;
            $data2 = new Wallet;
            $data2->user_id = Auth::user()->id;
            //$data2->payment = round($payble);
            $data2->payment = $request->payment;
            $data2->remark = $request->remark;
            $data2->wType = $request->wType;
            //$data2->admin_id = 1;//$request->paymentId;
            $data2->save();

            
            $data = new Wallet;
            $data->user_id = Auth::user()->id;
            $data->receipt = $request->payment;
            $data->remark = 'Withdraw - '.$request->remark;
            $data->wType = 'withdrawWallet';
            $data->save();

            Session::flash('success','Transfared to ');
        }
        return redirect()->back();
    }

    public function withdrawBalance(Request $request)
    {
        $this->validate($request, array(
            'bankName' => 'required',
            'accountNo' => 'required',
            'remark' => 'nullable',
            'payment' => 'required|numeric|min:'.$this->withdrowAmt,
            )
        );

        if($request->payment < $this->withdrowAmt ){
            Session::flash('warning','Sorry, Withdraw request minimum Balance $'.$this->withdrowAmt.'.');
        }elseif($this->balance(Auth::user()->id,'withdrawWallet') < $request->payment ){
            Session::flash('warning','Sorry, Your Balance Less then $'.$request->payment);
        }else{
            //$remark = $request->paymentMethod.' : '.$request->accountNo;
            $payble = $request->payment - ($request->payment/100)*10;
            $data2 = new AdminWallet;
            $data2->user_id = Auth::user()->id;
            $data2->payment = round($payble);
            //$data2->payment = $request->payment;
            $data2->remark = $request->bankName.' : '.$request->accountNo.' - '.$request->remark;            
            //$data2->admin_id = 1;//$request->paymentId;
            $data2->save();

            
            $data = new Wallet;
            $data->user_id = Auth::user()->id;
            //$data->payment = round($payble);
            $data->payment = $request->payment;
            $data->remark = 'Withdraw-'.$request->bankName.' : '.$request->accountNo.' - '.$request->remark;
            $data->wType = 'withdrawWallet';
            $data->adminWid = $data2->id;
            $data->save();

            Session::flash('success','Withdraw Processing, Please wait 24 hours');
        }
        return redirect()->back();
    }
    
  



}
