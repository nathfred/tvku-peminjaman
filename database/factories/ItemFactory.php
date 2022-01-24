<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $video_array = ['Camera PMW', 'Camera X70', 'Charger', 'Lens', 'Tripod', 'Monopod', 'Portajib', 'Dolly Track', 'Slider', 'Shoulder Mount', 'Video Cable'];
        $audio_array = ['Clip On', 'Hand Mic', 'Boom Mic', 'Headphone', 'Mixer', 'Speaker', 'Audio Cable', 'Connector'];
        $lighting_array = ['Cold Light', 'Read Head', 'Blonde', 'LED Light', 'LED Portable', 'Filter', 'Unomax', 'Reflector', 'Stand'];
        $additional_array = ['Battery', 'Battery AA', 'Battery AAA', 'Stand', 'Laptop', 'MMC 32GB', 'Flashdisk', 'USB Converter', 'Audio Converter', 'EZ Cap'];

        $full_array = ['Camera X', 'Camera Y', 'Battery A', 'Battery AA', 'Charger B', 'Charger BB', 'Lens 14', 'Lens 21', 'Tripod', 'Monopod', 'Portajib', 'Dolly Track', 'Slider', 'Shoulder Mount', 'Video Cable', 'Clip On', 'Hand Mic', 'Boom Mic', 'Headphone', 'Mixer', 'Speaker', 'Stand', 'Audio Cable', 'Connector', 'Cold Light', 'Read Head', 'Blonde', 'LED Light', 'LED Portable', 'Filter', 'Unomax', 'Reflector', 'Stand', 'Laptop', 'MC', 'Flashdisk', 'USB Converter', 'Audio Converter'];
        $items_array = array(
            'videos' => $video_array,
            'audios' => $audio_array,
            'lightings' => $lighting_array,
            'additional' => $additional_array,
        );

        $section = array_rand($items_array);

        return [
            // 'item' => $item_array[array_rand($item_array)],
            'item' => $items_array[$section][array_rand($items_array[$section])],
            'category' => $items_array[$section],
            'quantity' => mt_rand(1, 3),
        ];
    }
}
