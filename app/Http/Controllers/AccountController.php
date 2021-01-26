<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Rating;
use App\Models\Trade;
use App\Models\Item;

class AccountController extends Controller
{
    // アカウント詳細ページ
    public function show(Request $request)
    {
        $user = Auth::user();
        $u = User::where('user_id', $request->u)->first();
        $items = Item::where('user_id', $u->id)
            ->where('item_detail_flag', 0)
            ->get();
        $trades = Trade::where('user_id', $u->id)
            ->orWhere('sale_user_id', $u->id)
            ->get(['id']);
        $trade_list = array();
        foreach ($trades as $trade) {
            array_push($trade_list, $trade->id);
        }
        $ratings = Rating::whereIn('trade_id', $trade_list)
            ->Where('user_id', '!=', $u->id)
            ->get();
        return view('account.show', compact('user', 'u', 'items', 'ratings'));
    }
}
