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
        $faker = Faker::create('id_ID');
        $now = Carbon::now('GMT+7');
        $today = Carbon::today('GMT+7');

        // SET RANDOM FOR TOTAL ITEMS PER LOAN
        $number = mt_rand(4, 16);

        // QUANTITY
        $quantity = '';
        for ($i = 0; $i < $number; $i++) {
            $quantity = $quantity . mt_rand(1, 5) . PHP_EOL;
        }
        // dd($quantity);

        // // ITEM
        // $videos = Video::inRandomOrder()->get();
        // $audios = Audio::inRandomOrder()->get();
        // $lightings = Lighting::inRandomOrder()->get();
        // $additionals = Additional::inRandomOrder()->get();
        // // dd($videos->item);
        // $item = '';
        // for ($i = 0; $i < $number; $i++) {
        //     $j = 0;
        //     if ($j == 0) {
        //         $video = $videos->random();
        //         $item = $item . $video->item . PHP_EOL;
        //         $j++;
        //     }
        //     if ($j == 1) {
        //         $audio = $audios->random();
        //         $item = $item . $audio->item . PHP_EOL;
        //         $j++;
        //     }
        //     if ($j == 2) {
        //         $lighting = $lightings->random();
        //         $item = $item . $lighting->item . PHP_EOL;
        //         $j++;
        //     }
        //     if ($j == 3) {
        //         $additional = $additionals->random();
        //         $item = $item . $additional->item . PHP_EOL;
        //         $j++;
        //     }
        // }
        // // dd($item);

        // CODE
        $code = '';
        for ($i = 0; $i < $number; $i++) {
            $code = $code . strtoupper($faker->randomLetter()) . mt_rand(1, 20) . PHP_EOL;
        }

        $program_array = ['Program A', 'Program B', 'Program C'];
        $division_array = ['Produksi', 'News', 'Studio', 'Lain-lain'];
        $crew_division_array = ['Campers', 'Audio', 'Lighting'];

        return [
            // 'quantity' => $quantity,
            // 'item' => $item,
            // 'code' => $code,
            'approval' => FALSE,
            'return' => FALSE,
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
