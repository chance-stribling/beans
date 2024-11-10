<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\SetController;
use App\Http\Controllers\AMatchController;



Route::get('/', function () {
    return view('welcome');
});
Route::prefix('web')->group(function () {
    Route::get('/players', [PlayerController::class, 'index']);
    Route::get('/player/{id}', [PlayerController::class, 'getPlayerByID']);
    Route::get('/player/nickname/{id}', [PlayerController::class, 'getPlayerNicknameByID']);
    Route::put('/player/{id}/beans', [PlayerController::class, 'updateBeans']);
    Route::post('/player', [PlayerController::class, 'create']);
    
    Route::get('/games', [GameController::class, 'index']);
    Route::get('/games/withWinners', [GameController::class, 'indexWithWinner']);
    Route::get('/games/withoutWinners', [GameController::class, 'indexWithoutWinner']);
    Route::get('/game/{id}', [GameController::class, 'getGameByID']);
    Route::put('/game/{id}/pts', [GameController::class, 'updatePts']);
    Route::put('/game/{id}/pts', [GameController::class, 'updatePts']);
    Route::put('/game/{id}', [GameController::class, 'updateGame']);
    Route::get('/game/{game_id}/{set_id}/{match_id}/players', [GameController::class, 'getPlayers']);
    Route::post('/game', [GameController::class, 'create']);
    
    Route::get('/sets/{id}', [SetController::class, 'index']);
    Route::get('/set/{set_id}', [SetController::class, 'getSetById']);
    Route::get('/sets/ids/{id}', [SetController::class, 'getSetIds']);
    Route::get('/sets/winners/{set_id}', [SetController::class, 'getWinners']);
    Route::get('/sets/matches/{id}', [SetController::class, 'getSetMatches']);
    Route::put('/set/{set_id}', [SetController::class, 'updateSet']);
    Route::post('/set', [SetController::class, 'create']);
    
    Route::get('/matches/{id}', [AMatchController::class, 'index']);
    Route::get('/match/{id}', [AMatchController::class, 'getMatchById']);
    Route::put('/match/update', [AMatchController::class, 'update']);
    Route::get('/match/last/{set_id}', [AMatchController::class, 'getMostRecentMatch']);
    Route::post('/match/{id}', [AMatchController::class, 'create']);
});




Route::any('/{any}', function () {
    return view('welcome');
})->where(['any' => '.*']);