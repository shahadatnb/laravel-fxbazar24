<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Traits\Wallets;
use App\Wallet;
use App\User;
use Session;
use Auth;

class ProfileController extends Controller
{
    use Wallets;

    private $userReg = 10;
    private $userCom = 2;

    public function index(){
        return view('profile.profile');
    }

    public function profileView($id){
        $user = User::find($id);
        if($user){
            $wallets=$this->allBalance($user->id);
            return view('profile.profileView',compact('user','wallets'));
        }
        return redirect()->back();
    }

    public function allMemberList()
    {
        $member = User::latest()->paginate(50);
        return view('admin.allMemberList')->withMembers($member);
    }

    public function editProfile(){
        $user_id = User::find(Auth::User()->id); 
        return view('profile.edit')->withUser($user_id);
    }


    public function newMember()
    {
        return view('auth.newMember');
    }


    public function newMemberPost(Request $request)
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
        ),[
            //'placementId.unique_with' => 'This referral Id already 5 member registered, please try another referral ID'
            'hand.unique_with' => 'This hand side is already used, please try another hand or another Placement ID',
        ]);

        if($this->balance(Auth::user()->id,'registerWallet') >= $this->userReg){

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

            $data1 = new Wallet;
            $data1->user_id = Auth::user()->id;
            $data1->payment = $this->userReg;
            $data1->remark = 'New Member #'.$data->id;
            $data1->wType = 'registerWallet';
            $data1->save();

            $data2 = new Wallet;
            $data2->user_id = Auth::user()->id;
            $data2->receipt = $this->userCom;
            $data2->remark = 'New Member #'.$data->id;
            $data2->wType = 'sponsorWallet';
            $data2->save();
            return redirect()->route('home');
        }else{
            Session::flash('warning','Sorry, Your Balance Less then '.$this->userReg);
            return redirect()->back()->withInput();
        }
    }

    public function updateProfile(Request $request){
        $user_id = Auth::User()->id; 
        $this->validate($request, array(
            'name' => 'required|string|max:255',
            'username' => [
                'required','alpha_dash','max:30',
                Rule::unique('users')->ignore($user_id),
            ],
            'email' => [
                'required','email','max:50',
                Rule::unique('users')->ignore($user_id),
            ],
            /*'skypeid' => [
                'required','string','max:50',
                Rule::unique('users')->ignore($user_id),
            ],*/
            'mobile' => 'required|string|max:50'
        ));

                              
        $data = User::find(Auth::User()->id);
        
        $data->name = $request->name;
        $data->username = $request->username;
        $data->email = $request->email;
        $data->mobile = $request->mobile;
        //$data->skypeid = $request->skypeid;
        $data->save();
        Session::flash('success','Successfully Save');

        return redirect()->route('profile');
    }

    public function changePass(){
        return view('profile.changePass');
    }

    public function changePhoto(Request $request){
    	$this->validate($request, array(
        'photo' => 'mimes:jpg,jpeg,png|max:2000'
        ));

        $user_id = Auth::User()->id;                       
        $data = User::find($user_id);
        $image = $request->file('photo');
        if ($image) {
            $upload = 'public/upload/member';
            $filename = time() . '_' . $image->getClientOriginalName();
            $success = $image->move($upload, $filename);

            if ($success) {
                $data->photo = $filename;
                $data->save();
                Session::flash('success','Successfully Save');

                return redirect()->route('profile');
            } else {
                Session::flash('warning', "Image couldn't be uploaded.");
                return redirect()->route('profile');
            }
        }
    }
    
    public function changePassSave(Request $request){
    	$this->validate($request, array(
            'CurrentPassword'=>'required|max:15',
            'password' => 'required|string|min:6|max:15|confirmed',
            ));
    	//return Auth::user()->password.'<BR>'.Hash::make($request->CurrentPassword);

    	if(Hash::check($request->CurrentPassword, Auth::user()->password )){
    		$user_id = Auth::User()->id;                       
	        $obj_user = User::find($user_id);
	        $obj_user->password = Hash::make($request->password);
	        $obj_user->save(); 
	        return redirect()->route('profile');
    	}else{
    		return redirect()->route('changePass');
    	}

    }
    
    public function changePassAdmin(Request $request){
        $this->validate($request, array(
            'user_id' => 'required',
            'password' => 'required|string|min:6|max:15',
        ));

        $obj_user = User::find($request->user_id);
        $obj_user->password = Hash::make($request->password);
        $obj_user->save(); 
        return redirect()->back();
    }
}
