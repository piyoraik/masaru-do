<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;
use App\Models\Trade;

class TradesController extends Controller
{
    // 取引一覧
    public function index()
    {
        $user = Auth::user();
        $trades = Trade::where('user_id', $user->id)
            ->orwhere('sale_user_id', $user->id)->get()
            ->whereNotIn('status', [4]);
        return view('trade.index', compact('user', 'trades'));
    }

    // 取引詳細
    public function show(Request $request)
    {
        $user = Auth::user();
        $trade = Trade::where('uuid', $request->trade)->first();
        if ($user->id == $trade->user_id || $user->id == $trade->sale_user_id) {
            return view('trade.show', compact('user', 'trade'));
        }
        return redirect(route('root'));
    }

    // 決済
    public function cash(Request $request)
    {
        $trade = Trade::where('uuid', $request->id)->first();
        $user = Auth::user();
        \Payjp\Payjp::setApiKey('sk_test_ee926359d6a098b9866fd5e9');
        $charge = \Payjp\Charge::create(array(
            'card' => $request["payjp-token"],
            'amount' => $request->amount,
            'currency' => 'jpy'
        ));

        if ($charge["captured"] == true) {
            $trade->update([
                'status' => 1,
                'payjp_trade_id' => $charge["id"]
            ]);
        }
        return redirect(route('trade.show', ['trade' => $trade->uuid]));
    }

    // 発送完了
    public function shipping(Request $request)
    {
        $trade = Trade::where('uuid', $request->trade)->first();
        if ($request->shipping == 1) {
            $trade->update([
                'status' => 2
            ]);
        }
        return redirect(route('trade.show', ['trade' => $trade->uuid]));
    }
}
