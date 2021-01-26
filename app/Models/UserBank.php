<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class UserBank extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'user_id',
        'financial_institution_name',
        'account_number',
        'account_last_name',
        'account_first_name',
        'postal_code',
        'prefectures',
        'address'
    ];
}
