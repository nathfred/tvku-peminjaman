<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LightingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $item_array = ['Cold Light', 'Read Head', 'Blonde', 'LED Light', 'LED Portable', 'Filter', 'Unomax', 'Reflector', 'Stand'];

        return [
            'quantity' => mt_rand(1, 5),
            'item' => $item_array[array_rand($item_array)],
        ];
    }
}
