<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class VideoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $item_array = ['Camera X', 'Camera Y', 'Battery A', 'Battery AA', 'Charger B', 'Charger BB', 'Lens 14', 'Lens 21', 'Tripod', 'Monopod', 'Portajib', 'Dolly Track', 'Slider', 'Shoulder Mount', 'Video Cable'];

        return [
            'quantity' => mt_rand(1, 5),
            'item' => $item_array[array_rand($item_array)],
        ];
    }
}
