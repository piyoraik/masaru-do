<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Item;
use App\Models\Rating;
use Ramsey\Uuid\Uuid;

class Trade extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function rating()
    {
        return $this->hasMany(Rating::class);
    }

    protected $fillable = [
        'uuid',
        'item_id',
        'user_id',
        'sale_user_id',
        'payjp_trade_id',
        'status',
        'amount',
        'pay_method',
        'shipping',
        'postal_code',
        'address_name',
        'address'
    ];
}
