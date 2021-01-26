<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemStatus extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('item_statuses')->insert([
            'status' => '未使用・新品',
        ]);

        DB::table('item_statuses')->insert([
            'status' => '未使用に近い',
        ]);

        DB::table('item_statuses')->insert([
            'status' => '目立った傷や汚れなし',
        ]);

        DB::table('item_statuses')->insert([
            'status' => 'やや傷や汚れ有り',
        ]);

        DB::table('item_statuses')->insert([
            'status' => '傷や汚れ有り'
        ]);

        DB::table('item_statuses')->insert([
            'status' => '全体的に状態が悪い'
        ]);
    }
}
