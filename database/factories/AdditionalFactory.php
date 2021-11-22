<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AdditionalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $item_array = ['Laptop', 'MC', 'Flashdisk', 'USB Converter', 'Audio Converter'];

        return [
            'quantity' => mt_rand(1, 5),
            'item' => $item_array[array_rand($item_array)],
        ];
    }
}
