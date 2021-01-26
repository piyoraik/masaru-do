<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Ship extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('date_ships')->insert([
            'date' => '1~3日'
        ]);

        DB::table('date_ships')->insert([
            'date' => '2~5日'
        ]);

        DB::table('date_ships')->insert([
            'date' => '7日以上'
        ]);

        DB::table('date_ships')->insert([
            'date' => '倉庫'
        ]);
    }
}
