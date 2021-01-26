<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \App\Models\Item::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => 1,
            'genre_id' => 1,
            'dateship_id' => 1,
            'itemstatus_id' => 1,
            'itemid' => 'i' . $this->faker->randomNumber,
            'item_name' => $this->faker->company(),
            'item_detail' => $this->faker->text,
            'price' => $this->faker->randomNumber,
            'date_shipping' => '1',
            'item_detail_flag' => 0
        ];
    }
}
