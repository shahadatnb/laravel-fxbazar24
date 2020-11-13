<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\Wallets;
use App\EarnWallet;
use App\Wallet;
use App\Ptc;
use App\User;
use DB;
use Session;
use Auth;

class PtcController extends Controller
{use Wallets;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //if(Auth::user()->id != 1999){return redirect()->route('/');}
        $ptc = Ptc::latest()->paginate(20);
        return view('ptc.ptc-input')->withPtcs($ptc);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function youtubeClick()
    {
        $p = Ptc::where('publish_date',date('Y-m-d'))->latest()->get();
        /*$ptc = DB::table('ptcs')
            ->leftJoin('ptc_click','ptcs.id','ptc_click.ptc_id')
            //->whereNot()
            ->select('ptcs.*','ptc_click.user_id')
            ->get();
        dd($ptc);exit;*/

        $ptcs = [];

        foreach ($p as $key => $value) {
            $cl = DB::table('ptc_click')->where('ptc_id',$value->id)->where('user_id',Auth::User()->id)->first();
            if(!$cl){
                $ptcs[$key] = $value->id;
            }            
        }
        //dd($ptc); exit;
        $youtubeEarn = $this->youtubeBalance(Auth::User()->id);
        return view('ptc.pctClick', compact('ptcs','youtubeEarn'));
    }

    public function youtubeClickPost($id)
    {
        $ptc = Ptc::where('publish_date',date('Y-m-d'))->where('id',$id)->first();
        if($ptc){
            $cl = DB::table('ptc_click')->where('ptc_id',$ptc->id)->where('user_id',Auth::User()->id)->first();
            if(!$cl){
                DB::table('ptc_click')->insert(
                    ['ptc_id' => $ptc->id, 'user_id' => Auth::User()->id]
                );
                $youtube_earn = settingValue('youtube_earn');
                $data = new EarnWallet;                
                $data->receipt = $youtube_earn;
                $data->user_id = Auth::User()->id;
                $data->save();

                $user = User::find(Auth::User()->placementId);
                if($user){
                    $c=$this->selfIncomeCheck($user->id);
                    $amt = $youtube_earn*.5;
                    if($c){
                        $this->selfIncomeUpdate($c->id,$amt+$c->receipt);
                    }else{
                        $this->selfIncomeNew($user->id, $amt);
                    }
                    //------------- L-2
                    $user2 = User::find($user->placementId);
                    if($user2){
                    $c=$this->selfIncomeCheck($user2->id);
                    $amt = $youtube_earn*.5;
                    if($c){
                        $this->selfIncomeUpdate($c->id,$amt+$c->receipt);
                    }else{
                        $this->selfIncomeNew($user2->id, $amt);
                    }
                      //------------- L-3
                      $user3 = User::find($user2->placementId);
                      if($user3){
                      $c=$this->selfIncomeCheck($user3->id);
                      $amt = $youtube_earn*.4;
                      if($c){
                          $this->selfIncomeUpdate($c->id,$amt+$c->receipt);
                      }else{
                          $this->selfIncomeNew($user3->id, $amt);
                      }
                        //------------- L-3
                        $user4 = User::find($user3->placementId);
                        if($user4){
                        $c=$this->selfIncomeCheck($user4->id);
                        $amt = $youtube_earn*.3;
                        if($c){
                            $this->selfIncomeUpdate($c->id,$amt+$c->receipt);
                        }else{
                            $this->selfIncomeNew($user4->id, $amt);
                        }
                          //------------- L-3
                          $user5 = User::find($user4->placementId);
                          if($user5){
                          $c=$this->selfIncomeCheck($user5->id);
                          $amt = $youtube_earn*.2;
                          if($c){
                              $this->selfIncomeUpdate($c->id,$amt+$c->receipt);
                          }else{
                              $this->selfIncomeNew($user5->id, $amt);
                          }
                        } // user5
                      }// user4
                    } // user3
                  } // user2
                } // user

                return redirect($ptc->link);
            } //if(!$cl)
        } //if($ptc)
        return '';
    } //function

    protected function selfIncomeNew($id, $amt){
        $data2 = new Wallet;
        $data2->user_id = $id;
        $data2->receipt = $amt;
        $data2->wType = 'selfWallet';
        $data2->save();
    }
    protected function selfIncomeCheck($id){
        return Wallet::where('wType','selfWallet')->where('user_id',$id)->first();
    }
    protected function selfIncomeUpdate($id,$amt){
        DB::table('wallets')
            ->where('id', $id)
            ->update(['receipt' => $amt]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Ptc;
        $data->publish_date = $request->publish_date;
        $data->link =  $request->link;
        $data->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
