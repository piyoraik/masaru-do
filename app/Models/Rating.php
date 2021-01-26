<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Trade;
use App\Models\User;

class Rating extends Model
{
    use HasFactory;

    public function trade()
    {
        return $this->belongsTo(Trade::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'trade_id',
        'user_id',
        'opponent_userid',
        'rating',
        'rating_comment'
    ];
}
