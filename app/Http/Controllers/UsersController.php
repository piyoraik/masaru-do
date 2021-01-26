<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UsersController extends Controller
{
    // ログインしていない場合、ログインページに遷移
    public function __construct()
    {
        $this->middleware('auth');
    }

    // 会員情報ページ
    public function index()
    {
        $user = Auth::user();
        return view('user.index', compact('user'));
    }

    // マイページ
    public function show(Request $request)
    {
        $user = User::where('user_id', $request->user)->first();

        return view('user.show', compact('user'));
    }
}
