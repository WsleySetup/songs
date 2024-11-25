<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SongsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $songs = [
            ['title' => 'Everlong', 'singer' => 'Foo Fighters'],
            ['title' => 'The Pretender', 'singer' => 'Foo Fighters'],
            ['title' => 'My Hero', 'singer' => 'Foo Fighters'],
            ['title' => 'Smells like Teen Spirit', 'singer' => 'Nirvana'],
            ['title' => 'In the End', 'singer' => 'Linkin Park']
        ];

        // Insert data into the 'songs' table
        DB::table('songs')->insert($songs);
    }
}
