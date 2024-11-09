<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Set extends Model
{
    use HasFactory;
    protected $fillable = [
        'game_id',
        'player1_id',
        'player2_id',
        'player3_id',
        'player4_id',
        'player5_id',
        'player1_matches_won',
        'player2_matches_won',
        'player3_matches_won',
        'player4_matches_won',
        'player5_matches_won',
        'num_of_matches',
        'winner',
    ];
    public function matches(): HasMany
    {
        return $this->hasMany(aMatch::class);
    }
}
