<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function myProduct(){
    	return $this->hasOne('App\Product','id','product_id');
    }

    public function userInfo(){
    	return $this->hasOne('App\User','id','user_id');
    }
}
