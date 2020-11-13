<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    public function adminWattet(){
    	return $this->hasOne('App\AdminWallet','id','adminWid');
    }
}
