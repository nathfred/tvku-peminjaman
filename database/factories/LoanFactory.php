<?php

namespace Database\Factories;

use App\Models\Additional;
use App\Models\Audio;
use App\Models\Lighting;
use App\Models\Video;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

class LoanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $now = Carbon::now('GMT+7');
        $today = Carbon::today('GMT+7');

        $quantity = '';
        for ($i = 0; $i < 4; $i++) {
            $quantity = $quantity . mt_rand(1, 5) . '\n';
        }

        $videos = Video::random();
        $audios = Audio::random();
        $lightings = Lighting::random();
        $additionals = Additional::random();
        $item = '';
        for ($i = 0; $i < 4; $i++) {
            if ($i == 0) {
                $item = $item . $videos->item . '\n';
            }
            if ($i == 1) {
                $item = $item . $audios->item . '\n';
            }
            if ($i == 2) {
                $item = $item . $lightings->item . '\n';
            }
            if ($i == 3) {
                $item = $item . $additionals->item . '\n';
            }
        }

        $program_array = ['Program A', 'Program B', 'Program C'];
        $division_array = ['Produksi', 'News', 'Studio', 'Lain-lain'];
        $crew_division_array = ['Campers', 'Audio', 'Lighting'];

        $faker = Faker::create('id_ID');
        return [
            'quantity' => $quantity,
            'item' => $item,
            'program' => $program_array[array_rand($program_array)],
            'location' => 'TVKU UDINUS',
            'created' => $today,
            'book_date' => $today->addDay(),
            'book_time' => $now->format('H:i:s'),
            'division' => $division_array[array_rand($division_array)],
            'req_name' => $faker->name(),
            'req_phone' => $faker->phoneNumber(),
            'req_signed' => TRUE,
            'crew_name' => $faker->name(),
            'crew_phone' => $faker->phoneNumber(),
            'crew_signed' => TRUE,
            'crew_division' => $crew_division_array[array_rand($crew_division_array)],
            'app_name' => $faker->name(),
            'app_phone' => $faker->phoneNumber(),
            'app_signed' => FALSE,
        ];
    }
}
