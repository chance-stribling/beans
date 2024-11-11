<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGameRequest;
use App\Http\Requests\UpdateGameRequest;
use App\Models\Game;
use App\Models\Player;
use App\Models\Set;
use App\Models\aMatch;
use Illuminate\Http\Request;


class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $games = Game::all();
        $games->map(function ($game) {
            $game->player1_nickname = Player::where('id',$game->player1_id)->value('nickname');
            $game->player2_nickname = Player::where('id',$game->player2_id)->value('nickname');
            $game->player3_nickname = Player::where('id',$game->player3_id)->value('nickname');
            $game->player4_nickname = Player::where('id',$game->player4_id)->value('nickname');
            $game->player5_nickname = Player::where('id',$game->player5_id)->value('nickname');

        });
        return $games;
    }
    public function indexWithWinner()
    {
        $games = Game::where('winner', !null)->orderBy('id', 'desc')->get();
        $games->map(function ($game) {
            $game->player1_nickname = Player::where('id',$game->player1_id)->value('nickname');
            $game->player2_nickname = Player::where('id',$game->player2_id)->value('nickname');
            $game->player3_nickname = Player::where('id',$game->player3_id)->value('nickname');
            $game->player4_nickname = Player::where('id',$game->player4_id)->value('nickname');
            $game->player5_nickname = Player::where('id',$game->player5_id)->value('nickname');

        });
        return $games;
    }
    public function indexWithoutWinner()
    {
        $games = Game::where('winner', null)->orderBy('id', 'desc')->get();
        $games->map(function ($game) {
            $game->player1_nickname = Player::where('id',$game->player1_id)->value('nickname');
            $game->player2_nickname = Player::where('id',$game->player2_id)->value('nickname');
            $game->player3_nickname = Player::where('id',$game->player3_id)->value('nickname');
            $game->player4_nickname = Player::where('id',$game->player4_id)->value('nickname');
            $game->player5_nickname = Player::where('id',$game->player5_id)->value('nickname');

        });
        return $games;
    }
    /**
     * Display a listing of the resource.
     */
    public function getGameByID($id)
    {
        $game = Game::where('id', $id)->first();
        $game->player1_nickname = Player::where('id',$game->player1_id)->value('nickname');
        $game->player2_nickname = Player::where('id',$game->player2_id)->value('nickname');
        $game->player3_nickname = Player::where('id',$game->player3_id)->value('nickname');
        $game->player4_nickname = Player::where('id',$game->player4_id)->value('nickname');
        $game->player5_nickname = Player::where('id',$game->player5_id)->value('nickname');
        $game->winner_nickname = Player::where('id',$game->winner)->value('nickname');
        return $game;
    }

    public function getPlayers($game_id, $set_id, $match_id)
    {
        $game = Game::where('id', $game_id)->first();
        $players = [];

        array_push($players, (Player::where('id',$game->player1_id)->first()));
        array_push($players, (Player::where('id',$game->player2_id)->first()));
        
        $players[0]->setAttribute('pts', aMatch::where('id', $match_id)->value('player1_pts'));
        $players[0]->setAttribute('golden_beans', Set::where('id', $set_id)->value('player1_matches_won'));
        
        $players[1]->setAttribute('pts', aMatch::where('id', $match_id)->value('player2_pts'));
        $players[1]->setAttribute('golden_beans', Set::where('id', $set_id)->value('player2_matches_won'));


        if($game->num_of_players >= 3){
            array_push($players, (Player::where('id',$game->player3_id)->first()));
            $players[2]->setAttribute('pts', aMatch::where('id', $match_id)->value('player3_pts'));
            $players[2]->setAttribute('golden_beans', Set::where('id', $set_id)->value('player3_matches_won'));

        }
        else if($game->num_of_players >= 4){
            array_push($players, (Player::where('id',$game->player4_id)->first()));
            $players[3]->setAttribute('pts', aMatch::where('id', $match_id)->value('player4_pts'));
            $players[3]->setAttribute('golden_b1eans', Set::where('id', $set_id)->value('player4_matches_won'));

        }
        else if($game->num_of_players == 5){
            array_push($players, (Player::where('id',$game->player5_id)->first()));
            $players[4]->setAttribute('pts', aMatch::where('id', $match_id)->value('player5_pts'));
            $players[4]->setAttribute('golden_beans', Set::where('id', $set_id)->value('player5_matches_won'));

        }

        return $players;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $game = Game::create([
            'player1_id' => $request->player1_id,
            'player2_id' => $request->player2_id,
            'player3_id' => $request->player3_id ? $request->player3_id:null,
            'player4_id' => $request->player4_id ? $request->player4_id:null,
            'player5_id' => $request->player5_id ? $request->player5_id:null,
            'player1_sets_won' => 0,
            'player2_sets_won' => 0,
            'player3_sets_won' => $request->player3_id ? 0:null,
            'player4_sets_won' => $request->player4_id ? 0:null,
            'player5_sets_won' => $request->player5_id ? 0:null,
            'num_of_sets' => $request->num_of_sets,
            'num_of_matches' => $request->num_of_matches,
            'num_of_players' => $request->num_of_players,
        ]);
        // create x sets
        foreach(range(1,$game->num_of_matches) as $index) {
            $set = Set::create([
                'game_id' => $game->id,
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
                'num_of_matches' => $game->num_of_matches,
            ]);
         }

        return  $game;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGameRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Game $game)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Game $game)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGameRequest $request, Game $game)
    {
        $game = Game::where('id', $request->id)
        ->update([
            'player1_pts' => $request->player1_pts,
            'player2_pts' => $request->player2_pts
        ]);

    return  $game;
    }
    public function updateGame(Request $request, $id)
    {
        $game = Game::where('id', $id)->first();
        
        if(isset($request->player1_sets_won)){
            $game->player1_sets_won = $request->player1_sets_won;
            if($game->player1_sets_won == $game->num_of_sets){
                $game->winner = $game->player1_id;

            } 
        }
        else if(isset($request->player2_sets_won)){
            $game->player2_sets_won = $request->player2_sets_won; 
            if($game->player2_sets_won == $game->num_of_sets){
                $game->winner = $game->player2_id;

            } 
        }
        else if(isset($request->player3_sets_won)){
            $game->player3_sets_won = $request->player3_sets_won; 
            if($game->player3_sets_won == $game->num_of_sets){
                $game->winner = $game->player3_id;

            } 
        }
        else if(isset($request->player4_sets_won)){
            $game->player4_sets_won = $request->player4_sets_won; 
            if($game->player4_sets_won == $game->num_of_sets){
                $game->winner = $game->player4_id;

            } 
        }
        else if(isset($request->player5_sets_won)){
            $game->player5_sets_won = $request->player5_sets_won; 
            if($game->player5_sets_won == $game->num_of_sets){
                $game->winner = $game->player5_id;

            } 
        }
        
        
        $game->save(); 

        return  $game;
    }
    public function updatePts(UpdateGameRequest $request, Game $game)
    {
        $game = Game::where('id', $request->id)->update([
            'player1_pts' => $request->player1_pts,
            'player2_pts' => $request->player2_pts
        ]);

        return $game;
    }
    public function updateWinner(UpdateGameRequest $request, Game $game)
    {
        $game = Game::where('id', $request->id)->update([
            'winner' => $request->winner,
        ]);

        return $game;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game)
    {
        //
    }
}
