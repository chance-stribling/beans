<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePlayerRequest;
use App\Http\Requests\UpdatePlayerRequest;
use App\Models\Player;
use Illuminate\Http\Request;


class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $players = Player::all();
        return $players;
    }

    /**
     * Display a listing of the resource.
     */
    public function getPlayerByID($id)
    {
        $player = Player::where('id', $id)->first();
        return $player;
    }
    public function getPlayerNicknameByID($id)
    {
        $player = Player::where('id', $id)->value('nickname');
        return $player;
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $player = Player::create([
            'name' => $request->name,
            'nickname' => $request->nickname,
            'totalPts' => 0,
            'totalBeans' => 0,
            'totalBakedBeans' => 0,
            'totalGoldenBeans' => 0
        ]);

        return  $player;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePlayerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Player $player)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Player $player)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePlayerRequest $request, Player $player)
    {
        $player = Player::where('id', $request->id)
            ->update([
                'name' => $request->name,
                'nickname' => $request->nickname,
                'totalPts' => $request->totalPts,
                'totalBeans' => $request->totalBeans
            ]);

        return  $player;
    }
    public function updateBeans(UpdatePlayerRequest $request, Player $player)
    {
        $player = Player::where('id', $request->id)
            ->update([
                'totalBeans' => $request->totalBeans
            ]);

        return  $player;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Player $player)
    {
        //
    }
}
