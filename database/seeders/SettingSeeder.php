<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Setting::updateOrCreate(
            ['key' => 'hero_image'],
            [
                'label' => 'Gambar Hero Utama',
                'value' => null,
                'type' => 'image'
            ]
        );

        \App\Models\Setting::updateOrCreate(
            ['key' => 'site_name'],
            [
                'label' => 'Nama Website',
                'value' => 'SMK Negeri 1 Adiwerna',
                'type' => 'text'
            ]
        );
    }
}
