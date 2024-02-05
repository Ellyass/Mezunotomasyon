<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert(
            [
                [
                    'settings_description' => 'Başlık',
                    'settings_key' => 'title',
                    'settings_value' => 'Laravel Learning',
                    'settings_type' => 'text',
                    'settings_must' => 0,
                    'settings_delete' => '0',
                    'settings_status' =>'1'
                ],
                [
                    'settings_description' => 'Açıklama',
                    'settings_key' => 'description',
                    'settings_value' => 'Laravel Learning 1',
                    'settings_type' => 'text',
                    'settings_must' => 1,
                    'settings_delete' => '0',
                    'settings_status' =>'1'
                ],
                [
                    'settings_description' => 'Logo',
                    'settings_key' => 'logo',
                    'settings_value' => 'logo.png',
                    'settings_type' => 'file',
                    'settings_must' => 2,
                    'settings_delete' => '0',
                    'settings_status' =>'1'
                ],
                [
                    'settings_description' => 'Icon',
                    'settings_key' => 'icon',
                    'settings_value' => 'icon.png',
                    'settings_type' => 'file',
                    'settings_must' => 3,
                    'settings_delete' => '0',
                    'settings_status' =>'1'
                ],
                [
                    'settings_description' => 'Anahtar Kelimeler',
                    'settings_key' => 'keywords',
                    'settings_value' => 'Laravel,mezun,otomasyon,mezunotomasyon,elyesa',
                    'settings_type' => 'text',
                    'settings_must' => 4,
                    'settings_delete' => '0',
                    'settings_status' =>'1'
                ]
            ]
        );
    }
}
