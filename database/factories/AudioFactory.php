<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AudioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $item_array = ['Clip On', 'Hand Mic', 'Boom Mic', 'Headphone', 'Mixer', 'Speaker', 'Stand', 'Audio Cable', 'Connector'];

        return [
            'quantity' => mt_rand(1, 5),
            'item' => $item_array[array_rand($item_array)],
        ];
    }
}
