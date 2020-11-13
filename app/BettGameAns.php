<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class BettGameAns extends Model
{
    public function userInfo(){
    	return $this->hasOne('App\User','id','user_id');
    }

    public function gameBalance($id){
    	$bill = BettBalance::where('user_id',$id)->whereBetween('created_at', 
            array(Carbon::now()->subDay(30)->format('Y-m-d').' 00:00:00', date('Y-m-d 23:59:59')))->sum('receipt');//;
    	return $bill;
    }
}
