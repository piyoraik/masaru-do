<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class User extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'user_name' => 'test_user',
            'user_id' => 'test_id',
            'first_name' => 'test',
            'last_name' => 'user',
            'first_name_kana' => 'テスト',
            'last_name_kana' => 'ユーザー',
            'email' => 'test@test.com',
            'password' => bcrypt('password'),
            'email_verified_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('users')->insert([
            'user_name' => 'らいちゅー',
            'user_id' => 'piyoraik',
            'first_name' => '田中',
            'last_name' => '俊',
            'first_name_kana' => 'タナカ',
            'last_name_kana' => 'シュン',
            'email' => 'piyoraik@gmail.com',
            'password' => bcrypt('123123123'),
            'email_verified_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('users')->insert([
            'user_name' => 'そうま',
            'user_id' => 'satosou',
            'first_name' => '佐藤',
            'last_name' => '颯真',
            'first_name_kana' => 'サトウ',
            'last_name_kana' => 'ソウマ',
            'email' => 'sato.souma07@gmail.com',
            'password' => bcrypt('123123123'),
            'email_verified_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
