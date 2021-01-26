<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserBank;

class BankAccountsController extends Controller
{
    // ログインしていない場合、ログインページに遷移
    public function __construct()
    {
        $this->middleware('auth');
    }

    // 口座一覧
    public function index()
    {
        $user = Auth::user();
        $banks = $user->user_banks;
        return view('bankaccount.index', compact('user', 'banks'));
    }

    // 口座登録
    public function store(Request $request)
    {
        //validate条件
        $rules = [
            'financial_institution_name' => ['required','string'],
            'account_number' => ['required','string','size:7'],
            'account_last_name' => ['required', 'string','regex:/^[ア-ン゛゜ァ-ォャ-ョー]+$/u'],
            'account_first_name' =>['required', 'string','regex:/^[ア-ン゛゜ァ-ォャ-ョー]+$/u'], 
            'postal_code' => ['required','string','size:7'],
            'prefectures' => ['required','string'],
            'address' => ['required', 'string']
        ];

        $this->validate($request, $rules);

        UserBank::create([
            'user_id' => Auth::user()->id,
            'financial_institution_name' => $request->financial_institution_name,
            'account_number' => $request->account_number,
            'account_last_name' => $request->account_last_name,
            'account_first_name' => $request->account_first_name,
            'postal_code' => $request->postal_code,
            'prefectures' => $request->prefectures,
            'address' => $request->address
        ]);
        return redirect(route('banks.index'));
    }

    //口座情報編集
    public function edit(Request $request)
    {
        $user = Auth::user();
        $bank = Userbank::find($request->bank);
        return view('bankaccount.edit', compact('bank', 'user'));
    }

    public function update(Request $request , Userbank $bank)
    {
        $bank->financial_institution_name = $request->financial_institution_name;
        $bank->account_number = $request->account_number;
        $bank->account_last_name = $request->account_last_name;
        $bank->account_first_name = $request->account_first_name;
        $bank->postal_code = $request->postal_code;
        $bank->prefectures = $request->prefectures;
        $bank->address = $request->address;
        $bank->save();
        return redirect(route('banks.index'));
    }

    public function destroy(Request $request)
    {
        $bank = Userbank::find($request->bank);
        $bank->delete();
        return redirect(route('banks.index'));
    }

}
