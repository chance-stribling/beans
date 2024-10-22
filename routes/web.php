<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\GameController;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/players', [PlayerController::class, 'index']);

Route::get('/games', [GameController::class, 'index']);
Route::post('/game', [GameController::class, 'create']);



Route::any('/{any}', function () {
    return view('welcome');
})->where(['any' => '.*']);