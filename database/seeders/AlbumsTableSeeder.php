<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlbumsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Replace '1' with the actual ID of the band you want to associate with these albums
        $bandId = 1; // Ensure this ID exists in your bands table

        DB::table('albums')->insert([
            [
                'name' => 'Nevermind',
                'year' => 2001,
                'times_sold' => 1000,
                'band_id' => $bandId, // Add the band_id here
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'In Utero',
                'year' => 2005,
                'times_sold' => 2000,
                'band_id' => $bandId, // Add the band_id here
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'One by One',
                'year' => 2010,
                'times_sold' => 3000,
                'band_id' => $bandId, // Add the band_id here
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
