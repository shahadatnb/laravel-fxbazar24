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
        $ptcs = $this->checkLinks();
        return view('ptc.pctClick', compact('ptcs'));
    }

    protected function checkLinks(){
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

        return $ptcs;
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

                $ptcs = $this->checkLinks();
                //dd($ptcs); exit;
                if(empty($ptcs)){
                    $youtube_earn = Auth::User()->packeg->payment;
                    $data = new Wallet;                
                    $data->receipt = $youtube_earn;
                    $data->user_id = Auth::User()->id;
                    $data->wType = 'worksWallet';
                    $data->remark = 'Daily Bonus';
                    $data->save();
                }

                return redirect($ptc->link);
            } //if(!$cl)
        } //if($ptc)
        return '';
    } //function


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
