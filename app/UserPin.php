<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPin extends Model
{
    public function userInfo(){
    	return $this->hasOne('App\User','pin','pin');
    }
}
