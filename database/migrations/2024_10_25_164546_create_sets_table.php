<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sets', function (Blueprint $table) {
            $table->id();
            $table->integer('game_id');
            $table->integer('player1_id');
            $table->integer('player2_id');
            $table->integer('player3_id')->nullable();
            $table->integer('player4_id')->nullable();
            $table->integer('player5_id')->nullable();
            $table->integer('player1_matches_won')->nullable();
            $table->integer('player2_matches_won')->nullable();
            $table->integer('player3_matches_won')->nullable();
            $table->integer('player4_matches_won')->nullable();
            $table->integer('player5_matches_won')->nullable();
            $table->integer('num_of_matches');
            $table->integer('winner')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sets');
    }
};
