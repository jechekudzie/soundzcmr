<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StreamingPlatformsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //
        $streaming_platforms = include __DIR__.'/StreamingPlatformsSeeder.php';
        DB::table('streaming_platforms')->insert($streaming_platforms);
    }
}
