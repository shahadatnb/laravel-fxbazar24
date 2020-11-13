<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Traits\Wallets;
use App\AdminWallet;
use App\Wallet;
use App\Product;
use App\Order;
use App\User;
use Session;
use Auth;

use Illuminate\Http\Request;

class OrderController extends Controller
{   use Wallets;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function buyPack($id)
    {
        $product = Product::find($id);
        if(!$product){
            return redirect()->route('home');
        }
        return view('order.buyPack',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function buyPackSubmit(Request $request)
    {
        $this->validate($request, array(
            'name' => 'required|string|max:255',
            'username' => 'required|alpha_dash|max:30|unique:users',
            'email' => 'required|string|email|max:50',
            'password' => 'required|string|min:6|confirmed',
            'mobile' => 'required',
            'referralId' => 'required|exists:users,id',
            'placementId' => 'required|exists:users,id',
            'hand' => 'required|unique_with:users,placementId,hand',
            'kuriar' => 'required',
            'address' => 'required',
            'product_id' => 'required',
        ),[
            //'placementId.unique_with' => 'This referral Id already 5 member registered, please try another referral ID'
            'hand.unique_with' => 'This hand side is already used, please try another hand or another Placement ID',
        ]);

        $product = Product::find($request->product_id);
        if($this->balance(Auth::user()->id,'registerWallet') >= $product->price){
            $order = new Order;
            $order->user_id = Auth::user()->id;
            $order->mobile = $request->mobile;
            $order->kuriar = $request->kuriar;
            $order->address = $request->address;
            $order->product_id = $request->product_id;
            $order->save();

            $data1 = new Wallet;
            $data1->user_id = Auth::user()->id;
            $data1->payment = $product->price;
            $data1->remark = 'Buy Product #'.$order->id;
            $data1->wType = 'registerWallet';
            $data1->save();

            $data = new Wallet;
            $data->user_id = Auth::user()->id;
            $data->receipt = $product->price/10;
            $data->remark = 'Buy Product';
            $data->wType = 'refferWallet';
            $data->save();

            $data = new User;
            $data->name = $request->name;
            $data->username = $request->username;
            $data->email = $request->email;
            $data->mobile = $request->mobile;
            $data->referralId = $request->referralId;
            $data->placementId = $request->placementId;
            $data->hand = $request->hand;
            $data->password = bcrypt($request->password);
            $data->save();

            //$this->spotBonus(Auth::user()->referralId,$product->pv);
            //$this->matchingBonus($this->goldCost);

            return redirect()->route('myOrder');
        }else{
            Session::flash('warning','Sorry, Your Balance Less then '.$product->price);
            return redirect()->back()->withInput();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function myOrder()
    {
        $orders = Order::where('user_id',Auth::user()->id)->latest()->paginate(20);
        return view('order.orderList',compact('orders'));
    }



protected function spotBonus($id,$bonus){        
        $data = new MyWallet;
        $data->user_id = $id;
        //dd($this->percentage($bonus,10));
        //exit;
        $data->receipt = $this->percentage($bonus,10);
        $data->remark = 'Buy Product, ID# '.Auth::user()->id.'('.Auth::user()->name.')';
        $data->save();
    }

    public function matchingBonus($bonus)
    {
        //$member = User::find(Auth::user()->id);
        $parent = User::find(Auth::user()->sponsorId);       
        $this->parent($parent,Auth::user()->hand,$bonus);
        $this->gBonus(Auth::user()->sponsorId,0,$bonus);
        //return redirect()->route('home');
    }


    public function parent($parent,$hand,$bonus){

        $countLeftChild = User::myChildOnlyPremium($parent->id, 1);
        $countRightChild = User::myChildOnlyPremium($parent->id, 2);

        if($hand == 1){
            if($countRightChild >= $countLeftChild){
                $data = new MyWallet;
                $data->user_id = $parent->id;
                $data->receipt = $this->percentage($bonus,10);
                $data->remark = 'Buy Product Bonus # '.Auth::user()->id;
                $data->save();
            }                
        }else{
            if($countLeftChild >= $countRightChild){
                $data = new MyWallet;
                $data->user_id = $parent->id;
                $data->receipt = $this->percentage($bonus,10);
                $data->remark = 'Buy Product Bonus # '.Auth::user()->id;
                $data->save();
            }                
        }

        if($parent->sponsorId){
            $pparent = User::find($parent->sponsorId);
            if($pparent->admin != 1){
                $this->parent($pparent,$parent->hand,$bonus);
            }            
        }
    }

    public function countChild($member,$count){
        $members = $this->where('sponsorId',$member)->get();
        foreach ($members as $member) {
            //dd($member);
            if(count($member->childs)){
                $count += count($member->childs);
                $this->countChild($member->id,$count);
            }
        }
        return $count;
    }

    
    public function gBonus($id,$count,$bon){
        if($count < 15){
            if($count < 5){
                $bonus = $this->percentage($bon,0.10);
            }else{$bonus = $this->percentage($bon,0.05);}

            //dd($this->percentage(1,.05));
            //exit;

            $data = new MyWallet;
            $data->user_id = $id;
            $data->receipt = $bonus;
            $data->remark = 'Buy Product Generation Bonus # '.Auth::user()->id;
            $data->save();
            $count++;
            $member = User::find($id);
            $parent = User::find($member->sponsorId);    

            if($parent){
                $this->gBonus($parent->id,$count,$bon);
            }
        }
    }
}
