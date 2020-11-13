<?php 
namespace App\Traits;
use App\AdminWallet;
use App\Wallet;
use App\EarnWallet;
use App\User;

trait Wallets
{
    public $wallets =[
        'withdrawWallet'=>['title'=>'Withdraw wallet','bg'=>'primary'],
        'registerWallet'=>['title'=>'Register wallet','bg'=>'info'],
        'sponsorWallet'=>['title'=>'Sponsor wallet','bg'=>'warning'],
        'selfWallet'=>['title'=>'Generation income wallet','bg'=>'success'],
    ];

    public $rank = [
        0=>['point'=>0, 'amount'=>0, 'prize'=>'', 'title'=>'No Rank'],
        1=>['point'=>15, 'amount'=>500, 'prize'=>'500 BDT', 'title'=>'Assistant marketing officer'],
        2=>['point'=>60, 'amount'=>1500, 'prize'=>'1,500 BDT', 'title'=>'Marketing officer'],
        3=>['point'=>240, 'amount'=>5000, 'prize'=>'5,000 BDT', 'title'=>'Assistant executive'],
        4=>['point'=>960, 'amount'=>15000, 'prize'=>'15,000 BDT', 'title'=>'Executive'],
        5=>['point'=>3840, 'amount'=>40000, 'prize'=>'40,000 BDT + laptop', 'title'=>'Assistant manager'],
        6=>['point'=>15360, 'amount'=>150000, 'prize'=>'1,50,000 BDT', 'title'=>'Manager'],
        7=>['point'=>61440, 'amount'=>500000, 'prize'=>'5,00,000 BDT', 'title'=>'Additional Director'],
        8=>['point'=>245760, 'amount'=>1000000, 'prize'=>'10,00,000 BDT', 'title'=>'Director'],
        9=>['point'=>983040, 'amount'=>2500000, 'prize'=>'25,00,000 BDT', 'title'=>'Honorary Director'],
        10=>['point'=>3932160, 'amount'=>3500000, 'prize'=>'35 lak + axio car', 'title'=>'Vice chairman'],
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

    public function percentage($amt,$percentage){
        return ($percentage / 100) * $amt;
    }
}