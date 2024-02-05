<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blogs')->insert(
            [
                [
                    'blogs_title' => 'blogs_title01',
                    'blogs_slug' => 'blogs_slug01',
                    'blogs_file' => 'blogs_file01',
                    'blogs_must' => 0,
                    'blogs_content' => 'blogs_content01',
                    'blogs_status' => '1'
                ],
                [
                    'blogs_title' => 'blogs_title02',
                    'blogs_slug' => 'blogs_slug02',
                    'blogs_file' => 'blogs_file02',
                    'blogs_must' => 1,
                    'blogs_content' => 'blogs_content02',
                    'blogs_status' => '1'
                ],
                [
                    'blogs_title' => 'blogs_title03',
                    'blogs_slug' => 'blogs_slug03',
                    'blogs_file' => 'blogs_file03',
                    'blogs_must' => 2,
                    'blogs_content' => 'blogs_content03',
                    'blogs_status' => '1'
                ],
                [
                    'blogs_title' => 'blogs_title04',
                    'blogs_slug' => 'blogs_slug04',
                    'blogs_file' => 'blogs_file04',
                    'blogs_must' => 3,
                    'blogs_content' => 'blogs_content04',
                    'blogs_status' => '1'
                ],
                [
                    'blogs_title' => 'blogs_title05',
                    'blogs_slug' => 'blogs_slug05',
                    'blogs_file' => 'blogs_file05',
                    'blogs_must' => 4,
                    'blogs_content' => 'blogs_content05',
                    'blogs_status' => '1'
                ]
            ]
        );
    }
}
