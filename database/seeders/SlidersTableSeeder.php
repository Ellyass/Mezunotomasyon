<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SlidersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sliders')->insert(
            [
                [
                    'sliders_title' => 'sliders_title01',
                    'sliders_slug' => 'sliders_slug01',
                    'sliders_file' => 'sliders_file01',
                    'sliders_must' => 0,
                    'sliders_content' => 'sliders_content01',
                    'sliders_status' => '1',
                    'sliders_url' => 'www.youtube.com'
                ],
                [
                    'sliders_title' => 'sliders_title02',
                    'sliders_slug' => 'sliders_slug02',
                    'sliders_file' => 'sliders_file02',
                    'sliders_must' => 1,
                    'sliders_content' => 'sliders_content02',
                    'sliders_status' => '1',
                    'sliders_url' => 'www.facebook.com'
                ],
                [
                    'sliders_title' => 'sliders_title03',
                    'sliders_slug' => 'sliders_slug03',
                    'sliders_file' => 'sliders_file03',
                    'sliders_must' => 2,
                    'sliders_content' => 'sliders_content03',
                    'sliders_status' => '1',
                    'sliders_url' => 'www.instagram.com'
                ],
                [
                    'sliders_title' => 'sliders_title04',
                    'sliders_slug' => 'sliders_slug04',
                    'sliders_file' => 'sliders_file04',
                    'sliders_must' => 3,
                    'sliders_content' => 'sliders_content04',
                    'sliders_status' => '1',
                    'sliders_url' => 'www.twitch.com'
                ],
                [
                    'sliders_title' => 'sliders_title05',
                    'sliders_slug' => 'sliders_slug05',
                    'sliders_file' => 'sliders_file05',
                    'sliders_must' => 4,
                    'sliders_content' => 'sliders_content05',
                    'sliders_status' => '1',
                    'sliders_url' => 'www.twitter.com'
                ]
            ]
        );
    }
}
