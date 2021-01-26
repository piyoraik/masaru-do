<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Trade;
use App\Models\Rating;

class RatingsController extends Controller
{
    // 購入者評価
    public function buyer(Request $request)
    {
        $trade = Trade::where('uuid', $request->trade)->first();

        $trade->update([
            'status' => 3,
        ]);

        Rating::create([
            'trade_id' => $trade->id,
            'user_id' => Auth::user()->id,
            'opponent_userid' => $trade->sale_user_id,
            'rating' => $request->rating,
            'rating_comment' => $request->comment
        ]);

        return redirect(route('trade.show', ['trade' => $trade->uuid]));
    }

    // 出品者評価
    public function seller(Request $request)
    {
        $trade = Trade::where('uuid', $request->trade)->first();

        $trade->update([
            'status' => 4,
        ]);

        Rating::create([
            'trade_id' => $trade->id,
            'user_id' => Auth::user()->id,
            'opponent_userid' => $trade->user_id,
            'rating' => $request->rating,
            'rating_comment' => $request->comment
        ]);

        return redirect(route('trade.show', ['trade' => $trade->uuid]));
    }
}
