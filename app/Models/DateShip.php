<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Item;

class DateShip extends Model
{
    use HasFactory;

    public function items()
    {
        return $this->hasMany(Item::class);
    }

    protected $fillable = [
        'date'
    ];
}