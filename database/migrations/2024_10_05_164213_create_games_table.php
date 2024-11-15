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
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->integer('player1_id');
            $table->integer('player2_id');
            $table->integer('player3_id')->nullable();
            $table->integer('player4_id')->nullable();
            $table->integer('player5_id')->nullable();
            $table->integer('player1_sets_won')->nullable();
            $table->integer('player2_sets_won')->nullable();
            $table->integer('player3_sets_won')->nullable();
            $table->integer('player4_sets_won')->nullable();
            $table->integer('player5_sets_won')->nullable();
            $table->integer('num_of_sets');
            $table->integer('num_of_matches');
            $table->integer('num_of_players');
            $table->integer('winner')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
