<?php 
namespace App\Traits;
use App\AdminWallet;
use App\Wallet;
use App\EarnWallet;
use App\Packeg;
use App\User;

trait Wallets
{
    public $wallets =[
        'currentWallet'=>['title'=>'Current Wallet','bg'=>'primary'],
        'registerWallet'=>['title'=>'Register wallet','bg'=>'info'],
        'worksWallet'=>['title'=>'Works Wallet','bg'=>'warning'],
    ];

    public $rank = [
        0=>['point'=>0, 'amount'=>0, 'prize'=>'', 'title'=>'No Rank'],
        1=>['point'=>500, 'amount'=>62.50, 'prize'=>'$62.50', 'title'=>'Rubi member'],
        2=>['point'=>1000, 'amount'=>125, 'prize'=>'$125', 'title'=>'Rubi Executive member'],
        3=>['point'=>3000, 'amount'=>187.50, 'prize'=>'$187.50', 'title'=>'Executive member'],
        4=>['point'=>9000, 'amount'=>625, 'prize'=>'$625', 'title'=>'Silver Executive'],
        5=>['point'=>27000, 'amount'=>1875, 'prize'=>'$1875', 'title'=>'Gold Executive'],
        6=>['point'=>81000, 'amount'=>3750, 'prize'=>'$3750', 'title'=>'Platinum Executive'],
        7=>['point'=>243000, 'amount'=>12500, 'prize'=>'$12500', 'title'=>'Diamond Executive'],
        8=>['point'=>729000, 'amount'=>25000, 'prize'=>'$25000', 'title'=>'Crown Director'],
        9=>['point'=>2187000, 'amount'=>62500, 'prize'=>'$62500', 'title'=>'Crown Amassador'],
        //10=>['point'=>3932160, 'amount'=>3500000, 'prize'=>'35 lak + axio car', 'title'=>'Vice chairman'],
    ];
    
    public function wallets() {
        $wallets = [];
        foreach($this->wallets as $key=>$item){
            $wallets[$key] = $item['title'];
        }
        return $wallets;
    }

    public function balance($id,$wType)
    {
        $receipt = Wallet::where('user_id',$id)->where('wType',$wType)->sum('receipt');
        $payment = Wallet::where('user_id',$id)->where('wType',$wType)->sum('payment');
        $balance = $receipt-$payment;
        return $balance;
    }

    public function totalBalance($id,$wType)
    {
        $receipt = Wallet::where('user_id',$id)->where('wType',$wType)->sum('receipt');
        return $receipt;
    }

    public function allBalance($id){
        $balances = [];
            foreach ($this->wallets as $key=>$value) {
                $balances[$key] = ['balance'=>$this->balance($id,$key),'title'=>$value['title'],'bg'=>$value['bg']];
            }
        return $balances;
    }

    public function listBalance($id,$wType)
    {
        $transaction = Wallet::where('user_id',$id)->where('wType',$wType)->latest()->take(10)->get();
        return $transaction;
    }


    public function youtubeBalance($id)
    {
        $receipt = EarnWallet::where('user_id',$id)->sum('receipt');
        $payment = EarnWallet::where('user_id',$id)->sum('payment');
        $balance = $receipt-$payment;
        return $balance;
    }

    public function userArray()
    {
        $user = User::all();
        $users=array();
        foreach ($user as $data) {
            $users[$data->id]= $data->id.' '.$data->name;
        }
        return $users;
    }

    public function packArray()
    {
        $user = Packeg::all();
        $users=array();
        foreach ($user as $data) {
            $users[$data->id]= $data->title.' $'.$data->amount;
        }
        return $users;
    }

    public function percentage($amt,$percentage){
        return ($percentage / 100) * $amt;
    }
}