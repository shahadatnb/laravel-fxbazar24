<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    static function settingValue($col){
    	return Setting::where('name',$col)->pluck('value')->first();
    }
}
