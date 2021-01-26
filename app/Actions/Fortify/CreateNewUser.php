<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'user_name' => ['required', 'string', 'max:20'],
            'user_id' => ['required', 'string', 'max:20', 'unique:users'],
            'last_name' => ['required', 'string', 'max:10'],
            'first_name' => ['required', 'string', 'max:10'],
            'last_name_kana' => ['required', 'string', 'max:15', 'regex:/^[ァ-ヾ　〜ー]+$/u'],
            'first_name_kana' => ['required', 'string', 'max:15', 'regex:/^[ァ-ヾ　〜ー]+$/u'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
        ])->validate();

        return User::create([
            'user_name' => $input['user_name'],
            'user_id' => $input['user_id'],
            'last_name' => $input['last_name'],
            'first_name' => $input['first_name'],
            'last_name_kana' => $input['last_name_kana'],
            'first_name_kana' => $input['first_name_kana'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
