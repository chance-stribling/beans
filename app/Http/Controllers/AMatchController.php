<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreaMatchRequest;
use App\Http\Requests\UpdateaMatchRequest;
use App\Models\aMatch;
use App\Models\Player;
use Illuminate\Http\Request;


class AMatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $matches = aMatch::where('set_id', $id)->get();
        
        return $matches;
    }
    public function getMatchById($id)
    {
        $match = aMatch::where('id', $id)->first();
        if(isset($match->winner)){
            $match->winner_nickname = Player::where('id',$match->winner)->value('nickname');
        }

        return $match;
    }
    public function getMostRecentMatch($set_id)
    {
        $mostRecentMatch = aMatch::where('set_id', $set_id)->orderBy('id', 'desc')->first();
        
        return $mostRecentMatch;
    }
    public function getMatchesCount($id)
    {
        $matches = aMatch::where('set_id', $id)->get();
        $matchesCount = $matches->count();
        return $matchesCount;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $match = aMatch::create([
            'set_id' => $request->set_id,
            'player1_id' => $request->player1_id,
            'player2_id' => $request->player2_id,
            'player3_id' => $request->player3_id ? $request->player3_id:null,
            'player4_id' => $request->player4_id ? $request->player4_id:null,
            'player5_id' => $request->player5_id ? $request->player5_id:null,
            'player1_pts' => 0,
            'player2_pts' => 0,
            'player3_pts' => $request->player3_id ? 0:null,
            'player4_pts' => $request->player4_id ? 0:null,
            'player5_pts' => $request->player5_id ? 0:null,
            'num_of_players' => $request->num_of_players,
        ]);

        return $match;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreaMatchRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(aMatch $aMatch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(aMatch $aMatch)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateaMatchRequest $request, aMatch $aMatch)
    {
        $match = aMatch::where('id', $request->id)->first();
        
        if(isset($request->player1_pts)){
            $match->player1_pts = $request->player1_pts; 
        }
        else if(isset($request->player2_pts)){
            $match->player2_pts = $request->player2_pts; 
        }
        else if(isset($request->player3_pts)){
            $match->player3_pts = $request->player3_pts;
        }
        else if(isset($request->player4_pts)){
            $match->player4_pts = $request->player4_pts; 
        }
        else if(isset($request->player5_pts)){
            $match->player5_pts = $request->player5_pts;
        }
        else if(isset($request->winner)){
            $match->winner = $request->winner;
        }
        
        $match->save(); 

        return  $match;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(aMatch $aMatch)
    {
        //
    }
}
