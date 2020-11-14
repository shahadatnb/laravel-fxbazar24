<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\PointValue;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email','mobile', 'hand', 'referralId', 'placementId', 'password','pin',
    ];

    private $return_count = 0;

    //protected static $count = 1;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function packeg(){
        return $this->hasOne('App\Packeg','id','packeg_id');
    }


    public function childs() {
        return $this->hasMany('App\User','placementId','id');//->orderBy('hand');
    }

    public static function nChilds($id) {
        return User::where('placementId',$id)->get();
    }


    public static function myChild($id){
        global $count;
        $count = 0;
        $child =  User::where('placementId',$id)->pluck('id')->toArray();
        //dd($child); exit;
        if(count($child)>0){            
            $count = count($child);
            $count = User::cChild($child,$count);
        }
        return $count; 
    }

    public static function cChild($child,$count){
        global $count;
        $child =  User::whereIn('placementId',$child)->pluck('id')->toArray();
        if(count($child)>0){            
            $count += count($child);
            User::cChild($child,$count);
        }
        return $count;
    }


    public static function myChildAmount($id, $hand){
        global $amount;
        $amount = 0;
        $child =  User::where('hand',$hand)->where('placementId',$id)->first(); //->pluck('id')
        
        if($child){
            $amount = $child->packeg->amount;
            if(count($child->childs)){
              $amount = User::cChildAmount($child->childs,$amount);
            }
        }
        return $amount;
    }

    public static function cChildAmount($child,$amount){
        global $amount;
        //dd($child);
        foreach ($child as $member) { //dd($member->childs);//dd(count(User::nChilds($member->id)));            
            $amount = $member->packeg->amount;
            if(count($member->childs)){
                User::cChildAmount($member->childs,$amount);
            }
        }
        return $amount;
    }

    public static function myChildLR($id, $hand){
        global $count;
        $count = 0;
        $child =  User::where('hand',$hand)->where('placementId',$id)->first(); //->pluck('id')
        
        if($child){
            $count = 1;
            if(count($child->childs)){
              $count = User::cChildLR($child->childs,$count);
            }
        }
        return $count;
    }

    public static function cChildLR($child,$count){
        global $count;
        //dd($child);
        foreach ($child as $member) { //dd($member->childs);//dd(count(User::nChilds($member->id)));            
            $count ++;
            if(count($member->childs)){
                User::cChildLR($member->childs,$count);
            }
        }
        return $count;
    }



    public static function myChildByPack($id, $hand, $pack){
        global $count;
        $count = 0;
        $child =  User::where('hand',$hand)->where('placementId',$id)->first(); //->pluck('id')
        if($child){            
            if($child->packeg_id == $pack){$count = 1;} // || $child->premium == 2
            if(count($child->childs) > 0){
              $count = User::cChildOnlyPremium($child->childs,$count,$pack);
            }           
        }
        return $count; 
    }

    public static function cChildByPack($child,$count){
        foreach ($child as $member) {
            global $count;
            //dd($child); exit;
            if($member->packeg_id == $pack){$count ++;}
            if(count($member->childs) > 0){
                    User::cChildByPack($member->childs,$count,$pack);
            }
        }
        return $count;
    }




    public function count_sum($parentChildren) {
        foreach ($parentChildren->children as $child) {
            $this->return_count += $child->childs;
            $this->count_sum($child);
        }
        return $this->return_count;
    }

    function countChild($member,$count){
        $members = User::where('placementId',$member)->get();
        foreach ($members as $member) {
            if(count($member->childs)){
                $count += count($member->childs);
                $this->countChild($member->id,$count);
            }
        }
        return $count;
    }

    public function get($id = null) {
        
            $data = ModelOne::withCount('model_two')->where('id', $id)->get();                 
            return $data->map(function ($i) {
                $children = $this->get_recursive($i->id);
                if (!empty(array_filter((array)$children->children))) {
                    $i->model_two_count = $this->count_sum($children);                         
                    $this->return_count = 0;
                 } 
                 return $i;
             })->first();
     }


    public function defth() {

        return $this->hasMany('App\User','placementId','id');

    }


}
