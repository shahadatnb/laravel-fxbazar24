<?php

namespace App\Http\Controllers;
use App\User;
use App\EarnWallet;
use App\BettGame;
use App\BettGameAns;
use Session;
use Auth;

use Illuminate\Http\Request;

class BettController extends Controller
{
    public function createBett()
    {
        $data = BettGame::latest()->paginate(20);
        return view('admin.liveBett')->withGames($data );
    }

    public function viewParticipant($id)
    {
        $data = BettGameAns::where('game_id',$id)->get();
        return view('admin.viewParticipant')->withGames($data);
    }

    public function postCreateBett(Request $request)
    {
        $this->validate($request, array(
            'name' => 'required',
            'description' => 'required|string|max:255',
            'teamA' => 'required|string|max:255',
            'teamB' => 'required|string|max:255',
            'draw' => 'required|string|max:255',
            'lastTime' => 'required',
        ));


        $lastTime = date('Y-m-d').' '.$request->lastTime;//->format('HH MM');
        $lastTime = date('Y-m-d H:i:s', strtotime($lastTime));
        //dd($lastTime);
        $data = new BettGame;
        
        $data->description = $request->description;
        $data->admin_id = Auth::User()->id;
        $data->name = $request->name;
        $data->lastTime = $lastTime;
        $data->teamA = $request->teamA;
        $data->teamB = $request->teamB;
        $data->draw = $request->draw;
        $data->save();
        Session::flash('success','Successfully Save');

        return redirect()->route('createBett');
    }

    public function winnerSelect(Request $request)
    {
        $this->validate($request, array(
            'winner' => 'required'
        ));

        $ans = BettGameAns::where('game_id',$request->id)->where('ans',$request->winner)->get();

        foreach ($ans as $value) {
            $earn = new EarnWallet;
            $earn->user_id = $value->user_id;
            $earn->receipt = $request->bonus;
            $earn->remark = 'Bonus $'.$request->bonus.' from games';
            $earn->save();
        }
                              
        $data = BettGame::find($request->id);
        $data->winner = $request->winner;
        $data->bonus = $request->bonus;
        $data->parson = count($ans);
        $data->save();

        Session::flash('success','Successfully Save & sent to bonus '.count($ans).' parson.');

        return redirect()->route('createBett');
    }

    public function gameDelete($id)
    {
        $item=BettGame::find($id);
        
/*        $bill=Receipt::find($item->bill_no);
        if($bill->post == 1){
            Session::flash('warning','Bill Already Posted');
            return redirect()->route('receipt.edit',$item->bill_no);
        }*/
        $item->delete();
        Session::flash('success','Item Removed');
        return redirect()->route('createBett');
    }
}
