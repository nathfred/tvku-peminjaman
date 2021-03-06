<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\Loan;
use App\Models\User;
use App\Models\Audio;
use App\Models\Video;
use App\Models\Lighting;
use App\Models\Additional;
use App\Models\LoanItem;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        // SUPER
        User::create([
            'name' => 'Super User',
            'role' => 'super',
            'email' => 'root@tvku.tv',
            'email_verified_at' => now(),
            'password' => bcrypt('TvkuLogistik123!@$'),
            'remember_token' => Str::random(10),
        ]);

        // LOGISTIK
        User::create([
            'name' => 'Admin Logistik',
            'role' => 'logistik',
            'email' => 'logistik@tvku.tv',
            'email_verified_at' => now(),
            'password' => bcrypt('123123'),
            'remember_token' => Str::random(10),
        ]);

        // DIVISI
        $name_array = ['Divisi IT', 'Divisi Produksi', 'Divisi Teknikal Support', 'Divisi Marketing', 'Divisi Keuangan', 'Divisi Umum', 'Divisi Human Resources', 'Divisi News'];
        $division_array = ['IT', 'Produksi', 'Teknikal Support', 'Marketing', 'Keuangan', 'Umum', 'Human Resources', 'News'];

        for ($i = 0; $i < 8; $i++) {
            User::create([
                'name' => $name_array[$i],
                'role' => 'divisi',
                'email' => 'divisi' . trim(strtolower(str_replace(' ', '', $division_array[$i]))) . '@tvku.tv',
                'email_verified_at' => now(),
                'password' => bcrypt('123123'),
                'remember_token' => Str::random(10),
            ]);
        }

        // DINUS FM
        User::create([
            'name' => 'DINUS FM',
            'role' => 'divisi',
            'email' => 'dinusfm@tvku.tv',
            'email_verified_at' => now(),
            'password' => bcrypt('123123'),
            'remember_token' => Str::random(10),
        ]);

        // // VIDEO
        // $video_array = ['Camera X', 'Camera Y', 'Battery A', 'Battery AA', 'Charger B', 'Charger BB', 'Lens 14', 'Lens 21', 'Tripod', 'Monopod', 'Portajib', 'Dolly Track', 'Slider', 'Shoulder Mount', 'Video Cable'];
        // for ($i = 0; $i < count($video_array); $i++) {
        //     Video::create([
        //         'quantity' => mt_rand(1, 5),
        //         'item' => $video_array[array_rand($video_array)],
        //     ]);
        // }

        // // AUDIO
        // $audio_array = ['Clip On', 'Hand Mic', 'Boom Mic', 'Headphone', 'Mixer', 'Speaker', 'Stand', 'Audio Cable', 'Connector'];
        // for ($i = 0; $i < count($audio_array); $i++) {
        //     Audio::create([
        //         'quantity' => mt_rand(1, 5),
        //         'item' => $audio_array[array_rand($audio_array)],
        //     ]);
        // }

        // // LIGHTING
        // $lighting_array = ['Clip On', 'Hand Mic', 'Boom Mic', 'Headphone', 'Mixer', 'Speaker', 'Stand', 'lighting Cable', 'Connector'];
        // for ($i = 0; $i < count($lighting_array); $i++) {
        //     Lighting::create([
        //         'quantity' => mt_rand(1, 5),
        //         'item' => $lighting_array[array_rand($lighting_array)],
        //     ]);
        // }

        // // ADDITIONAL
        // $additional_array = ['Clip On', 'Hand Mic', 'Boom Mic', 'Headphone', 'Mixer', 'Speaker', 'Stand', 'additional Cable', 'Connector'];
        // for ($i = 0; $i < count($additional_array); $i++) {
        //     Additional::create([
        //         'quantity' => mt_rand(1, 5),
        //         'item' => $additional_array[array_rand($additional_array)],
        //     ]);
        // }

        // // ITEM
        // Loan::factory()->count(3)->create();

        // ITEM
        $video_array = ['Camera PMW', 'Camera X70', 'Charger', 'Lens', 'Tripod', 'Monopod', 'Portajib', 'Dolly Track', 'Slider', 'Shoulder Mount', 'Video Cable', 'Camera Canon 6D', 'Handycam Sony', 'Camera HD', 'Camera Nikon'];
        $audio_array = ['Clip On', 'Hand Mic', 'Boom Mic', 'Headphone', 'Mixer', 'Speaker', 'Stand', 'Audio Cable'];
        $lighting_array = ['Connector', 'Cold Light', 'Read Head', 'Blonde', 'LED Light', 'LED Portable', 'Filter', 'Unomax', 'Reflector'];
        $additional_array = ['Battery', 'Battery AA', 'Battery AAA', 'Stand', 'Laptop', 'MMC 32GB', 'Flashdisk', 'USB Converter', 'Audio Converter', 'Ezcap'];

        for ($i = 0; $i < count($video_array); $i++) {
            Item::create([
                'name' => $video_array[$i],
                'category' => 'Video',
            ]);
        }
        for ($i = 0; $i < count($audio_array); $i++) {
            Item::create([
                'name' => $audio_array[$i],
                'category' => 'Audio',
            ]);
        }
        for ($i = 0; $i < count($lighting_array); $i++) {
            Item::create([
                'name' => $lighting_array[$i],
                'category' => 'Lighting',
            ]);
        }
        for ($i = 0; $i < count($additional_array); $i++) {
            Item::create([
                'name' => $additional_array[$i],
                'category' => 'Additional',
            ]);
        }

        // LOANS
        // Loan::factory()->count(5)->create();

        // LOAN ITEMS
        // $all_items = Item::get();
        // for ($i = 0; $i < 3; $i++) { // 3 SAMPLE LOAN
        //     for ($j = 0; $j < mt_rand(1, 10); $j++) { // 1 - 10 ITEMS PER LOAN
        //         // GET RANDOM ITEM FROM ITEM MODEL
        //         $random_item = Item::inRandomOrder()->first();

        //         // GENERATE RANDOM CODE FOR ITEM
        //         $code = strtoupper($faker->randomLetter() . mt_rand(1, 20));

        //         LoanItem::create([
        //             'loan_id' => $i + 1,
        //             'item_id' => $random_item->id,
        //             'name' => $random_item->name,
        //             'category' => $random_item->category,
        //             'code' => $code,
        //         ]);
        //     }
        // }
    }
}
