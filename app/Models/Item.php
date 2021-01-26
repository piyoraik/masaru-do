<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Genre;
use App\Models\DateShip;
use App\Models\Trade;
use App\Models\ItemStatus;

class Item extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function dateship()
    {
        return $this->belongsTo(DateShip::class);
    }

    public function trade()
    {
        return $this->hasOne(Trade::class);
    }

    public function itemstatus()
    {
        return $this->belongsTo(ItemStatus::class);
    }


    protected $fillable = [
        'user_id',
        'genre_id',
        'dateship_id',
        'itemstatus_id',
        'itemid',
        'item_path',
        'item_name',
        'item_detail',
        'price',
        'date_shipping',
        'item_detail_flag'
    ];
}
