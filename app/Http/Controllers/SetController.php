<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Set;
use App\Models\Player;
use App\Models\aMatch;
use App\Models\Game;

class SetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $sets = Set::where('game_id', $id)->get();
        
        $sets->map(function ($set) {
            $set->matches = aMatch::where('set_id',$set->id)->get();

            $set->matches->map(function ($match) {
                if(isset($match->winner)){
                    $match->winner_nickname = Player::where('id',$match->winner)->value('nickname');
                }
            });
        });
        return $sets->toJson();
    }
    public function getSetById($set_id)
    {
        $set = Set::where('id', $set_id)->first();
        return $set;
    }
    public function getSetIds($id)
    {
        $setIds = Set::where('game_id', $id)->get();
        $pluck = $setIds->pluck('id');
        return $pluck;
    }
    public function getWinners($set_id)
    {
        $matches = aMatch::where('set_id', $set_id)->get();
        $pluck = $matches->pluck('winner');
        return $pluck;
    }
    public function playersScores($game_id, $set_id)
    {
        $sets = Set::where('game_id', $game_id)->where('winner', !null)->orderBy('id', 'desc')->value('player1_matches_won');
        return $sets;
    }
    public function getSetMatches($id)
    {
        $sets = Set::has('matches')->get();
        return $sets;
    }
    public function create(Request $request)
    {
        $set = Set::create([
            'game_id' => $request->game_id,
            'player1_id' => $request->player1_id,
            'player2_id' => $request->player2_id,
            'player3_id' => $request->player3_id ? $request->player3_id:null,
            'player4_id' => $request->player4_id ? $request->player4_id:null,
            'player5_id' => $request->player5_id ? $request->player5_id:null,
            'player1_matches_won' => 0,
            'player2_matches_won' => 0,
            'player3_matches_won' => $request->player3_id ? 0:null,
            'player4_matches_won' => $request->player4_id ? 0:null,
            'player5_matches_won' => $request->player5_id ? 0:null,
            'num_of_matches' => $request->num_of_matches,
        ]);

        return  $set;
    }
    public function updateSet(Request $request, $set_id)
    {
        $set = Set::where('id', $set_id)->first();
        $game = Game::where('id', $set->game_id)->first();

        if(isset($request->player1_matches_won)){
            $set->player1_matches_won = $request->player1_matches_won;
            if($set->player1_matches_won == $set->num_of_matches){
                $set->winner = $set->player1_id;
                $game->player1_sets_won = $game->player1_sets_won + 1;
                if($game->player1_sets_won == $game->num_of_sets){
                    $game->winner = $game->player1_id;
                }

            } 
        }
        else if(isset($request->player2_matches_won)){
            $set->player2_matches_won = $request->player2_matches_won; 
            if($set->player2_matches_won == $set->num_of_matches){
                $set->winner = $set->player2_id;

            } 
        }
        else if(isset($request->player3_matches_won)){
            $set->player3_matches_won = $request->player3_matches_won;
            if($set->player3_matches_won == $set->num_of_matches){
                $set->winner = $set->player3_id;

            } 
        }
        else if(isset($request->player4_matches_won)){
            $set->player4_matches_won = $request->player4_matches_won; 
            if($set->player4_matches_won == $set->num_of_matches){
                $set->winner = $set->player4_id;

            } 
        }
        else if(isset($request->player5_matches_won)){
            $set->player5_matches_won = $request->player5_matches_won;
            if($set->player5_matches_won == $set->num_of_matches){
                $set->winner = $set->player5_id;

            } 
        }
        else if(isset($request->winner)){
            $set->winner = $request->winner;
        }
        
        $set->save(); 
        $game->save(); 

        return  $set;
    }
}
