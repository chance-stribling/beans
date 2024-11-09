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
        Schema::create('a_matches', function (Blueprint $table) {
            $table->id();
            $table->integer('set_id');
            $table->integer('player1_id');
            $table->integer('player2_id');
            $table->integer('player3_id')->nullable();
            $table->integer('player4_id')->nullable();
            $table->integer('player5_id')->nullable();
            $table->integer('player1_pts')->nullable();
            $table->integer('player2_pts')->nullable();
            $table->integer('player3_pts')->nullable();
            $table->integer('player4_pts')->nullable();
            $table->integer('player5_pts')->nullable();
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
        Schema::dropIfExists('a_matches');
    }
};
