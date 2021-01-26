<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\User;
use Database\Seeders\Ship;
use Database\Seeders\Address;
use Database\Seeders\ItemStatus;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            User::class,
            Ship::class,
            Genre::class,
            Address::class,
            ItemStatus::class,
        ]);
        \App\Models\Item::factory()->count(50)->create();
    }
}
