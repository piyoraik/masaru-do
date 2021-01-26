<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Genre extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('genres')->insert([
            'name' => 'Windowsデスクトップ'
        ]);

        DB::table('genres')->insert([
            'name' => 'Windowsノート'
        ]);

        DB::table('genres')->insert([
            'name' => 'MacBook'
        ]);

        DB::table('genres')->insert([
            'name' => 'MacBookAir'
        ]);
    }
}
