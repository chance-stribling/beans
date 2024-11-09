<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class aMatch extends Model
{
    use HasFactory;
    protected $fillable = [
        'set_id',
        'player1_id',
        'player2_id',
        'player3_id',
        'player4_id',
        'player5_id',
        'player1_pts',
        'player2_pts',
        'player3_pts',
        'player4_pts',
        'player5_pts',
        'num_of_players',
        'winner',
    ];
    public function set(): BelongsTo
    {
        return $this->belongsTo(Set::class);
    }
}
