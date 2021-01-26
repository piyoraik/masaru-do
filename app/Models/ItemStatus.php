<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Item;

class ItemStatus extends Model
{
    use HasFactory;

    public function item()
    {
        $this->hasMany(Item::class);
    }

    protected $fillable = [
        'status'
    ];
}
