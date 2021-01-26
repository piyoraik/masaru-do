<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;

class SellsController extends Controller
{
    // 出品商品一覧
    public function index()
    {
        $user = Auth::user();
        $sells = $user->items;
        return view('sells.index', compact('user', 'sells'));
    }
}
