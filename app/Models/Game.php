<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Game extends Model
{
    use HasFactory;
    protected $fillable = [
        'player1_id',
        'player2_id',
        'player3_id',
        'player4_id',
        'player5_id',
        'player1_sets_won',
        'player2_sets_won',
        'player3_sets_won',
        'player4_sets_won',
        'player5_sets_won',
        'num_of_sets',
        'num_of_matches',
        'num_of_players',
        'winner',
    ];
    public function sets(): HasMany
    {
        return $this->hasMany(Set::class);
    }

}
