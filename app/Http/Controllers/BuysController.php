<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BuysController extends Controller
{
    // 購入商品一覧
    public function index()
    {
        $user = Auth::user();
        $buys = $user->trades;
        return view('buys.index', compact('user', 'buys'));
    }
}
