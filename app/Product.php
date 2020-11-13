<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function cat(){
    	return $this->hasOne('App\ProCat','id','cat_id');
    }
}
