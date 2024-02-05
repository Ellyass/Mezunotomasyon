<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages')->insert(
            [
                [
                    'pages_title' => 'pages_title01',
                    'pages_slug' => 'pages_slug01',
                    'pages_file' => 'pages_file01',
                    'pages_must' => 0,
                    'pages_content' => 'pages_content01',
                    'pages_status' => '1'
                ],
                [
                    'pages_title' => 'pages_title02',
                    'pages_slug' => 'pages_slug02',
                    'pages_file' => 'pages_file02',
                    'pages_must' => 1,
                    'pages_content' => 'pages_content02',
                    'pages_status' => '1'
                ],
                [
                    'pages_title' => 'pages_title03',
                    'pages_slug' => 'pages_slug03',
                    'pages_file' => 'pages_file03',
                    'pages_must' => 2,
                    'pages_content' => 'pages_content03',
                    'pages_status' => '1'
                ],
                [
                    'pages_title' => 'pages_title04',
                    'pages_slug' => 'pages_slug04',
                    'pages_file' => 'pages_file04',
                    'pages_must' => 3,
                    'pages_content' => 'pages_content04',
                    'pages_status' => '1'
                ],
                [
                    'pages_title' => 'pages_title05',
                    'pages_slug' => 'pages_slug05',
                    'pages_file' => 'pages_file05',
                    'pages_must' => 4,
                    'pages_content' => 'pages_content05',
                    'pages_status' => '1'
                ]
            ]
        );
    }
}
