<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Genre;

class GenresController extends Controller
{
    // ジャンル一覧
    public function index()
    {
        $user = Auth::user();
        $genres = Genre::all();
        return view('genres.index', compact('user', 'genres'));
    }

    // ジャンル登録処理
    public function store(Request $request)
    {
        $rules = [
            'name' => ['required', 'string']
        ];

        $this->validate($request, $rules);

        Genre::create([
            'name' => $request->name
        ]);
        return redirect(route('genres.index'));
    }
}
