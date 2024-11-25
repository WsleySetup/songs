<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bands')->insert([
            [
                'name' => 'The Rolling Stones',
                'genre' => 'Rock',
                'founded' => 1962,
                'active_till' => 'Heden',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'The Beatles',
                'genre' => 'Rock',
                'founded' => 1960,
                'active_till' => '1970',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Nirvana',
                'genre' => 'Progressive Rock',
                'founded' => 1965,
                'active_till' => 'Heden',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Foo Fighters',
                'genre' => 'Progressive Rock',
                'founded' => 1965,
                'active_till' => 'Heden',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'One direction',
                'genre' => 'Pop',
                'founded' => 1965,
                'active_till' => 'Heden',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
