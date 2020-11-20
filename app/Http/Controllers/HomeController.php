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
        $slotAmt = $this->slot();
        $user_id= Auth::user()->id;
       $wallets=$this->allBalance($user_id);
       $wallets['withdrawTotal'] = ['balance'=>$this->totalBalance($user_id,'withdrawWallet'),'title'=>'Total Withdraw','bg'=>'2'];
       $wallets['sponsorTotal'] = ['balance'=>$this->totalBalance($user_id,'sponsorWallet'),'title'=>'Total Sponsor Income','bg'=>'3'];
       $wallets['worksWalletTotal'] = ['balance'=>$this->totalBalance($user_id,'worksWallet'),'title'=>'Total Works Earn','bg'=>'4'];
       $wallets['generationTotal'] = ['balance'=>$this->totalBalance($user_id,'generationWallet'),'title'=>'Generation Total','bg'=>'5'];
       $wallets['registeredTotal'] = ['balance'=>Auth::user()->sponsorChilds->count(),'title'=>'Total Registered','bg'=>'6'];
       $wallets['Shopping'] = ['balance'=>0,'title'=>'Shopping','bg'=>'1'];
       $wallets['TotalShopping'] = ['balance'=>0,'title'=>'Total Shopping','bg'=>'2'];
       $wallets['wrTotal'] = ['balance'=>$this->withdrawalRequest($user_id),'title'=>'Withdrawal Request Total','bg'=>'3'];
       $wallets['wsTotal'] = ['balance'=>$this->withdrawalRequestSuccess($user_id),'title'=>'Withdrawal Success Total','bg'=>'4'];
       $wallets['frTotal'] = ['balance'=>$this->totalReceive($user_id),'title'=>'Total Fund Receive','bg'=>'5'];
       $wallets['ftTotal'] = ['balance'=>$this->totalTransfar($user_id),'title'=>'Total Fund Transfer','bg'=>'6'];
       $wallets['matchTotal'] = ['balance'=>$this->slot[Auth::user()->slot],'title'=>'Total Matched','bg'=>'1'];
       $wallets['lfTotal'] = ['balance'=>0,'title'=>'Left Flash','bg'=>'2'];
       $wallets['tfTotal'] = ['balance'=>0,'title'=>'Right Flash','bg'=>'3'];
       $wallets['lvTotal'] = ['balance'=>$slotAmt['lvTotal'],'title'=>'Total Left Value','bg'=>'4'];
       $wallets['rvTotal'] = ['balance'=>$slotAmt['rvTotal'],'title'=>'Total Right Value','bg'=>'5'];
       $wallets['LeftCary'] = ['balance'=>0,'title'=>'Left Cary','bg'=>'6'];
       $wallets['RightCary'] = ['balance'=>0,'title'=>'Right Cary','bg'=>'1'];


       $wallets2['rankName'] = ['balance'=>'Rank','title'=>$this->rank[Auth::user()->rank]['title'],'bg'=>'5'];
       $wallets2['myPackeg'] = ['balance'=>Auth::user()->packeg->title,'title'=>'My Packeg','bg'=>'6'];
       //dd($wallets2); exit;
        return view('pages.dashboard',compact('wallets','wallets2'));
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
        $walletInfo = $this->wallets[$wallet];
        return view('pages.wallet',compact('transaction','balance','walletInfo','wallet'));
    }

    public function withdrawWallet()
    {
        $transaction = $this->listBalance(Auth::user()->id,'withdrawWallet');
        $balance = $this->balance(Auth::user()->id,'withdrawWallet');
        $walletName = 'Withdraw Wallet';
        return view('wallet.withdrawWallet',compact('transaction','balance','walletName'));
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
        //dd($slot[$userSlot]); exit;
        if($small >= $slot[$userSlot]){

            $user = User::find(Auth::user()->id);
            $user->slot = $userSlot;
            $user->save();

            $data2 = new Wallet;
            $data2->user_id = Auth::user()->id;
            $data2->receipt = $slot[$userSlot]*.05;
            $data2->wType = 'matchingWallet';
            $data2->remark = 'Matching Bonus #'.$userSlot;
            $data2->save();

            $this->generationBonusDist($user->placementId,$data2->receipt,'Matching');
        }

        return ['lvTotal'=>$cLeft,'rvTotal'=>$cRight];
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
            'username' => 'required|exists:users,username',
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
            $data->remark = 'Sent to ID# '.$request->username.' '.$request->remark;
            $data->save();

            $user = User::where('username',$request->username)->first();

            $data2 = new Wallet;
            $data2->user_id = $user->id;
            $data2->receipt = $request->payment;//$payble;
            $data2->wType = $request->wType;
            $data2->remark = 'Receipt Form ID# '.Auth::user()->username;
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

        $wallet_info = $this->wallets[$request->wType]['wid_d'];
        if($wallet_info>0){
            $last_tx = Wallet::where('wType',$request->wType)->where('user_id',Auth::user()->id)
                ->whereNotNull('payment')->latest()->first();
            if($last_tx){
                $last_tx_date= $last_tx->created_at;                
            }else{
                $last_tx_date= Auth::user()->created_at;
            }

            $today = Carbon::today()->subDay($wallet_info);

            if($last_tx_date > $today){
                //dd('Not Mature, wait '.$wallet_info.' dsys after last transfer.'); exit;
                Session::flash('warning','Not Mature, wait '.$wallet_info.' dsys after last transfer.');
                return redirect()->back();
            }
        }
        //exit;

        if($this->balance(Auth::user()->id,$request->wType) < $request->payment ){
            Session::flash('warning','Sorry, Your Balance Less then $'.$request->payment);
        }else{
            //$remark = $request->paymentMethod.' : '.$request->accountNo;
            //$payble = $request->payment - ($request->payment/100)*10;
            $data2 = new Wallet;
            $data2->user_id = Auth::user()->id;
            //$data2->payment = round($payble);
            $data2->payment = $request->payment;
            $data2->remark = 'Withdraw '.$request->remark;
            $data2->wType = $request->wType;
            //$data2->admin_id = 1;//$request->paymentId;
            $data2->save();

            
            $data = new Wallet;
            $data->user_id = Auth::user()->id;
            $data->receipt = $request->payment;
            $data->remark = 'Withdraw - '.$request->remark;
            $data->wType = 'withdrawWallet';
            $data->save();

            Session::flash('success','Transfared to Withdraw');
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
            $payble = $request->payment;// - ($request->payment/100)*10;
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
