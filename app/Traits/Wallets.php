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
      'currentWallet'=>['title'=>'Current Wallet','bg'=>'1','wid'=>1,'trns'=>0,'wid_d'=>0],
      'registerWallet'=>['title'=>'Register wallet','bg'=>'2','wid'=>0,'trns'=>1,'wid_d'=>0],
      'worksWallet'=>['title'=>'Works Wallet','bg'=>'3','wid'=>1,'trns'=>0,'wid_d'=>30],
      'referralWallet'=>['title'=>'Referral Wallet','bg'=>'4','wid'=>1,'trns'=>0,'wid_d'=>0],
      'rankWallet'=>['title'=>'Rank Wallet','bg'=>'5','wid'=>1,'trns'=>0,'wid_d'=>0],
      'generationWallet'=>['title'=>'Generation Income','bg'=>'6','wid'=>1,'trns'=>0,'wid_d'=>30],
      'matchingWallet'=>['title'=>'Matching Wallet','bg'=>'1','wid'=>1,'trns'=>0,'wid_d'=>0],
    ];

    public $rank = [
      0=>['point'=>0, 'req'=>0, 'amount'=>0, 'prize'=>'', 'title'=>'No Rank'],
      1=>['point'=>5000, 'req'=>'Matching', 'amount'=>62.50, 'prize'=>'$62.50', 'title'=>'Rubi member'],
      2=>['point'=>2, 'req'=>'Rubi member', 'amount'=>125, 'prize'=>'$125', 'title'=>'Rubi Executive member'],
      3=>['point'=>3, 'req'=>'Rubi Executive member', 'amount'=>187.50, 'prize'=>'$187.50', 'title'=>'Executive member'],
      4=>['point'=>3, 'req'=>'Executive member', 'amount'=>625, 'prize'=>'$625', 'title'=>'Silver Executive'],
      5=>['point'=>3, 'req'=>'Silver Executive', 'amount'=>1875, 'prize'=>'$1875', 'title'=>'Gold Executive'],
      6=>['point'=>3, 'req'=>'Gold Executive', 'amount'=>3750, 'prize'=>'$3750', 'title'=>'Platinum Executive'],
      7=>['point'=>3, 'req'=>'Platinum Executive', 'amount'=>12500, 'prize'=>'$12500', 'title'=>'Diamond Executive'],
      8=>['point'=>3, 'req'=>'Diamond Executive', 'amount'=>25000, 'prize'=>'$25000', 'title'=>'Crown Director'],
      9=>['point'=>3, 'req'=>'Crown Director', 'amount'=>62500, 'prize'=>'$62500', 'title'=>'Crown Amassador'],
      //10=>['point'=>3932160, 'amount'=>3500000, 'prize'=>'35 lak + axio car', 'title'=>'Vice chairman'],
    ];

    public $slot = [
        0   => 0,
        1   => 12.5,
        2   => 25,
        3   => 50,
        4   => 100,
        5   => 200,
        6   => 500,
        7   => 1000,
        8   => 1500,
        9   => 2500,
        10  => 3600,
        11  => 5000,
        12  => 10000,
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


    public function totalReceive($id)
    {
        return Wallet::where('user_id',$id)->where('receive',1)->sum('receipt');
    }

    public function totalTransfar($id)
    {
        return Wallet::where('user_id',$id)->where('transfar',1)->sum('payment');
    }

    public function withdrawalRequest($user_id){
        return AdminWallet::where('user_id',$user_id)->sum('payment');
    }

    public function withdrawalRequestSuccess($user_id){
        return AdminWallet::where('user_id',$user_id)->where('confirm',1)->sum('payment');
    }

// *********************
    public function generationBonusDist($id,$bonus,$bonus_couse){      
        
        $user = User::find($id);
        if($user){
            $amt = $bonus*.3;
            $this->generationBonusSave($user->id,$amt,$bonus_couse,$user->username);

            //------------- L-2
            $user2 = User::find($user->placementId);
            if($user2){
              $amt = $bonus*.2;
              $this->generationBonusSave($user2->id,$amt,$bonus_couse,$user->username);
              //------------- L-3
              $user3 = User::find($user2->placementId);
              if($user3){
              $amt = $bonus*.1;
              $this->generationBonusSave($user3->id,$amt,$bonus_couse,$user->username);
                //------------- L-4
                $user4 = User::find($user3->placementId);
                if($user4){
                $amt = $bonus*.1;
                $this->generationBonusSave($user4->id,$amt,$bonus_couse,$user->username);
                  //------------- L-5
                  $user5 = User::find($user4->placementId);
                  if($user5){
                  $amt = $bonus*.1;
                  $this->generationBonusSave($user5->id,$amt,$bonus_couse,$user->username);
                } // user5
              }// user4
            } // user3
          } // user2
        } // user
    }

    protected function generationBonusSave($id, $amt,$bonus_couse,$mainId){
        $data = new Wallet;                
        $data->receipt = $amt;
        $data->user_id = $id;
        $data->wType = 'generationWallet';
        $data->remark = 'Generation Bonus('.$bonus_couse.')#'.$mainId;
        $data->save();
    }

// **************************************
    public function userArray()
    {
        $user = User::all();
        $users=array();
        foreach ($user as $data) {
            $users[$data->id]= $data->username.' '.$data->name;
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