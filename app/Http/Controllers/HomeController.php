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
        //$this->rank();
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
        return view('wallet.'.$wallet,compact('transaction','balance','walletName','wallet'));
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
        $cLeft=User::myChildLR(Auth::user()->id,1);
        $cRight=User::myChildLR(Auth::user()->id,2);
        if($cLeft<=$cRight){
            $small = $cLeft;
        }else{
            $small = $cRight;
        }
        
        $userRank = Auth::user()->rank;
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



/* ################# Aprove ID     Premium        #########################*/
    public function getpremium()
    {
        $member = User::find(Auth::user()->id);
        if($member->premium == 0){
            $member->premium = 1;
            $member->save();

            $this->bonusDist($member->id);            
            
            Session::flash('success','Success');
        }        
        
        return redirect()->route('home');
    }


    protected function bonusDist($id){
        $member = User::find($id);
        if($member->referralId != 0){

            $refMember = User::find($member->referralId);
            $refCount = User::where('referralId',$member->referralId)->count();

            if($refCount==2){
                $this->joinBonus($member->referralId);
            }
            
            if($refMember->referralId != 0){      
                $parent = User::find($refMember->referralId);          
                $this->levelBonus($parent,$refMember->hand);
            }
        }
    }


    protected function levelBonus($parent,$hand){              
        $countLeftChild = User::myChildLR($parent->id, 1);
        $countRightChild = User::myChildLR($parent->id, 2);

        $this->count++;
        //echo $parent->id.'-'.$countLeftChild.' '.$countRightChild.'<br>';

        if($hand == 1){
            if($countRightChild >= $countLeftChild){
                $this->joinBonus($parent->id);
                //echo 'left';
            }                
        }else{
            if($countLeftChild >= $countRightChild){
                $this->joinBonus($parent->id);
                //echo 'right';
            }                
        }

        if($parent->referralId &&  $this->count < 10){
            $pparent = User::find($parent->referralId);
            if($pparent->admin != 1){
                $this->levelBonus($pparent,$parent->hand);
            }
        }
    }



    protected function joinBonus($referralId){
        if($referralId !=0 ){
            $member = User::find($referralId); 
            if($member->premium == 1){
                $earn = EarnWallet::where('user_id',$referralId)->sum('receipt');
                if($earn >= $this->freeLimit){
                    return true;
                }
            }elseif($member->premium == 2){
                $earn = EarnWallet::where('user_id',$referralId)->whereDate('created_at', Carbon::today())->sum('receipt');
                if($earn >= $this->dayLimit){
                    return true;
                }               
            }else{
                return true;
            }
            
            $data = new EarnWallet;
            $data->user_id = $referralId;
            $data->receipt = $this->mBonus;
            $data->adminWid = 0;
            $data->remark = 'L-'.$this->count.' join ID#'.Auth::user()->id;
            $data->save();            
        }
    }
  
    public function xxxxxbonusDist($id){
        if($this->count == 1){
            $amt = 3;
        }elseif($this->count == 2){
            $amt = 2;
        }
        elseif($this->count == 3){
            $amt = 1;
        }
        elseif($this->count == 4){
            $amt = 1;
        }
        elseif($this->count == 5){
            $amt = 0.5;
        }
        elseif($this->count == 6){
            $amt = 0.5;
        }else{
            $amt = 0;
        }
        if($amt>0){
            $data = new MyWallet;
            $data->user_id = $id;
            $data->receipt = $amt;
            $data->remark = 'T Bonus';
            $data->save();
            $count = ++$this->count;
            if($count < 7){
                $this->aproveBonus($id,$count);
            } 

        }      
    }


    public function upgrateStandrad(){
        $member = User::find(Auth::user()->id);
        $balance = $this->currentBalance(Auth::user()->id);
        if($member->premium != 1){
            Session::flash('warning','Sorry');
        }
        if($balance >= $this->upgrateAmt) {
            $member->premium = 2;
            $member->save();

            $data = new CurrentWallet;
            $data->user_id = $member->id;
            $data->payment = $this->upgrateAmt;
            $data->remark = 'Upgrate Standrad';
            $data->save();
        }else{
            Session::flash('warning','Sorry, Your Balance Less then '.$this->upgrateAmt.' Tk');
        }
        return redirect()->back();
    }
   

/* ########################### Bonus ###########################*/


    public function parent($parent,$hand,$bonus){

        $countLeftChild = User::myChildOnlyPremium($parent->id, 1);
        $countRightChild = User::myChildOnlyPremium($parent->id, 2);

        if($hand == 1){
            if($countRightChild >= $countLeftChild){
                $data = new MyWallet;
                $data->user_id = $parent->id;
                $data->receipt = $this->percentage($bonus,10);
                $data->remark = 'Matching Bonus # '.Auth::user()->id;
                $data->save();
            }                
        }else{
            if($countLeftChild >= $countRightChild){
                $data = new MyWallet;
                $data->user_id = $parent->id;
                $data->receipt = $this->percentage($bonus,10);
                $data->remark = 'Matching Bonus # '.Auth::user()->id;
                $data->save();
            }                
        }

        if($parent->sponsorId){
            $pparent = User::find($parent->sponsorId);
            if($pparent->admin != 1){
                $this->parent($pparent,$parent->hand,$bonus);
            }            
        }
    }

    public function countChild($member,$count){
        $members = $this->where('sponsorId',$member)->get();
        foreach ($members as $member) {
            //dd($member);
            if(count($member->childs)){
                $count += count($member->childs);
                $this->countChild($member->id,$count);
            }
        }
        return $count;
    }

    
    public function gBonus($id,$count,$bon){
        if($count < 15){
            if($count < 5){
                $bonus = $this->percentage($bon,0.10);
            }else{$bonus = $this->percentage($bon,0.05);}

            //dd($this->percentage(1,.05));
            //exit;

            $data = new MyWallet;
            $data->user_id = $id;
            $data->receipt = $bonus;
            $data->remark = 'Generation Bonus # '.Auth::user()->id;
            $data->save();
            $count++;
            $member = User::find($id);
            $parent = User::find($member->sponsorId);    

            if($parent){
                $this->gBonus($parent->id,$count,$bon);
            }
        }
    }

    public function bonus($id){
        $data = new MyWallet;
        $data->user_id = $id;
        $data->receipt = 1;
        $data->remark = 'Matching Bonus';
        $data->save();
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
