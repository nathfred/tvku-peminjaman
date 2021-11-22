<?php

namespace Database\Seeders;

use App\Models\User;
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
    }
}
