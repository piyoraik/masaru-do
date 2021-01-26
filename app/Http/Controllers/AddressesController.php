<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Address;
use stdClass;

class AddressesController extends Controller
{
    // ログインしていない場合、ログインページに遷移
    public function __construct()
    {
        $this->middleware('auth');
    }

    // 配送先一覧
    public function index()
    {
        $user = Auth::user();
        $addresses = $user->addresses;
        return view('addresses.index', compact('user', 'addresses'));
    }

    // 配送先登録
    public function store(Request $request)
    {   //validate条件
        $rules = [
            'postal_code' => ['required', 'string', 'size:7'],
            'prefectures' => ['required', 'string'],
            'address' => ['required', 'string'],
            'name' => ['required', 'string']
        ];

        $this->validate($request, $rules);

        Address::create([
            'user_id' => Auth::user()->id,
            'postal_code' => $request->postal_code,
            'prefectures' => $request->prefectures,
            'address' => $request->address,
            'name' => $request->name
        ]);
        return redirect(route('addresses.index'));
    }
    //配送先編集
    public function edit(Request $request)
    {
        $user = Auth::user();
        $address = Address::find($request->address);
        return view('addresses.edit', compact('address', 'user'));
    }

    public function update(Request $request, Address $address)
    {
        $address->postal_code = $request->postal_code;
        $address->prefectures = $request->prefectures;
        $address->address = $request->address;
        $address->name = $request->name;
        $address->save();
        return redirect(route('addresses.index'));
    }

    public function destroy(Request $request)
    {
        $address = Address::find($request->address);
        $address->delete();
        return redirect(route('addresses.index'));
    }
}
