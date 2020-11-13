<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\EarnWallet;
use App\CurrentWallet;
use App\BettBalance;
use App\BettGameAns;
use App\BettGame;
use App\Setting;
use Session;
use Auth;

class earnController extends Controller
{
    //protected Setting::settingValue('live_bett_amt')=Setting::settingValue('live_bett_amt');
    public function __construct()
    {
        $this->middleware('gold');
    }
    
    public function index(){
    	return view('earn.index');
    }

    
    public function live(){
    	//dd(Carbon::now());
    	if($this->bettBalance() >= Setting::settingValue('live_bett_amt')){
    		$data = BettGame::where('lastTime','>', date('Y-m-d H:i:s'))->where('name','live')->where('winner',null)->first();	
	    	$msg='<span class="label label-success">You are ready, Your Balance $'.$this->bettBalance().', Game Balance Remening '.$this->bettBalanceRemening().' Days, You can give bett</span>';
    	}else{
	    	$msg='<span class="label label-warning">Your balance less than $'.Setting::settingValue('live_bett_amt').', <a href="'.url('addGameBalance').'">Please chick here to add $'.Setting::settingValue('live_bett_amt').' from current wallet.</a></span>';
	    	$data = null;
    	}
	    	return view('earn.live')->withMsg($msg)->withBett($data);
    }


    public function live2(){
        if($this->currentBalance() >= Setting::settingValue('live2_bett_amt')){
            $data = BettGame::where('lastTime','>', date('Y-m-d H:i:s'))->where('name','live2')->where('winner',null)->first();
            $msg='<span class="label label-success">You are ready, Your Balance upto $'.Setting::settingValue('live2_bett_amt').', You can give bett</span>';
        }else{
            $msg='<span class="label label-warning">Your current balance less than $'.Setting::settingValue('live2_bett_amt');
            $data = null;
        }
            return view('earn.live2')->withMsg($msg)->withBett($data);
    }

    public function currentBalance()
    {
        $receipt = CurrentWallet::where('user_id',Auth::user()->id)->sum('receipt');
        $payment = CurrentWallet::where('user_id',Auth::user()->id)->sum('payment');
        $balance = $receipt-$payment;
        return $balance;
    }

    public function bettBalance()
    {
        $data = BettBalance::where('user_id',Auth::user()->id)->where('bal_type','live')->whereBetween('created_at', 
            array(Carbon::now()->subDay(Setting::settingValue('live_bett_du'))->format('Y-m-d').' 00:00:00', date('Y-m-d 23:59:59')))->sum('receipt');
        if($data){
        return $data;           
        }else{return 0;}
    }

    public function bettBalanceRemening()
    {
        $data = BettBalance::where('user_id',Auth::user()->id)->where('bal_type','live')->latest()->first();
        if($data){
            $day = $data->created_at->diff(Carbon::now())->days;
        return Setting::settingValue('live_bett_du')-$day;        	
        }else{return 0;}
    }

    public function liveWin($id,$win)
    {
        $data1 = BettGame::where('lastTime','>', date('Y-m-d H:i:s'))->where('id',$id)->first();
        if($data1){
            if($this->bettBalance() >= Setting::settingValue('live_bett_amt')){
            	if($this->gvalidity($id) == null){
    	            $data2 = new BettGameAns;
    	            $data2->user_id = Auth::user()->id;
    	            $data2->game_id = $id;
    	            $data2->ans = $win;
    	            $data2->save();
    	            Session::flash('success','Team Selected');
    	            return redirect()->route('live');        		
            	}else{
    	            Session::flash('warning','You are already winner selecded.');
            		return redirect()->route('live');
            	}
            }else{
                Session::flash('warning','You balance less then $'.Setting::settingValue('live_bett_amt').'.');
                return redirect()->route('live');
            }
        }
        Session::flash('warning','Time expire.');
        return redirect()->route('live');
    }

    public function live2Win($id,$win)
    {
        $data1 = BettGame::where('lastTime','>', date('Y-m-d H:i:s'))->where('id',$id)->first();
        if($data1){
            if($this->currentBalance() >= Setting::settingValue('live2_bett_amt')){
                if($this->gvalidity($id) == null){
                    $data2 = new BettGameAns;
                    $data2->user_id = Auth::user()->id;
                    $data2->game_id = $id;
                    $data2->ans = $win;
                    $data2->save();

                    $data = new CurrentWallet;
                    $data->user_id = Auth::user()->id;
                    $data->payment = Setting::settingValue('live2_bett_amt');
                    $data->remark = "Live2 Game";
                    $data->save();

                    Session::flash('success','Team Selected');
                    return redirect()->route('live2');               
                }else{
                    Session::flash('warning','You are already winner selecded.');
                    return redirect()->route('live2');
                }
            }else{
                Session::flash('warning','You balance less then $'.Setting::settingValue('live2_bett_amt').'.');
                return redirect()->route('live2');
            }
        }
        Session::flash('warning','Time expire.');
        return redirect()->route('live');
    }

    protected function gvalidity($id){
            $data = BettGameAns::where('game_id',$id)->where('user_id',Auth::user()->id)->first();
            return $data;
    }

    public function addGameBalance()
    {
        if($this->currentBalance() < Setting::settingValue('live_bett_amt') ){
            Session::flash('warning','Sorry, Your Balance Less than $'.Setting::settingValue('live_bett_amt').'. Please collect balance');
        }else{
            $data = new CurrentWallet;
            $data->user_id = Auth::user()->id;
            $data->payment = Setting::settingValue('live_bett_amt');
            $data->remark = 'Transfar to Games Live';
            $data->save();

            $data2 = new BettBalance;
            $data2->user_id = Auth::user()->id;
            $data2->bal_type = 'live';
            $data2->receipt = Setting::settingValue('live_bett_amt');
            $data2->remark = 'Collect from Current Wallet.';
            $data2->save();

            Session::flash('success','Balance Collected');
        }

        return redirect()->back();
    }


    public function addOutBalance()
    {
        $bal = 10;
        $gball = BettBalance::where('user_id',Auth::user()->id)->where('bal_type','Outsourcing')->sum('receipt');
        if($gball >= $bal){
            Session::flash('warning','Your Outsourcing Balance Suficent.');
        }else{            
            if($this->currentBalance() < $bal ){ //Setting::settingValue('live_bett_amt')
                Session::flash('warning','Sorry, Your Balance Less than $'.$bal.'. Please collect balance');
            }else{
                $data = new CurrentWallet;
                $data->user_id = Auth::user()->id;
                $data->payment = $bal;
                $data->remark = 'Transfar to Games, Outsourcing';
                $data->save();

                $data2 = new BettBalance;
                $data2->user_id = Auth::user()->id;
                $data2->bal_type = 'Outsourcing';
                $data2->receipt = $bal;
                $data2->remark = 'Collect from Current Wallet.';
                $data2->save();

                Session::flash('success','Balance Collected');
            }
        }

        return redirect()->back();
    }

    public function outsourcing(){
        $ball = BettBalance::where('user_id',Auth::user()->id)->where('bal_type','Outsourcing')->sum('receipt');
        //dd($data);
        if($ball >= 10){
            $data['affiliate'] = Setting::settingValue('affiliate');
            $data['data_entry'] = Setting::settingValue('data-entry');
            $data['out_others'] = Setting::settingValue('out-others');
            $data['outsourcing_msg'] = Setting::settingValue('outsourcing_msg');
            $msg = null;
        }else{
            $msg='<span class="label label-warning">Your balance less than $10, <a href="'.url('/addOutsourcingBalance').'">Please chick here to add $10 from current wallet.</a></span>';
            $data = null;
        }
        return view('pages.Outsourcing',compact('data','msg'));//->withMsg($msg)->withBett($data);
    }
}
