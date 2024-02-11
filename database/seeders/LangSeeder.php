<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Language::create([
            'name' => 'German',
            's_code' => 'de',
            'l_code' => 'de-DE',
            'is_active' =>true,
            'is_default' =>true,
        ]);
        Language::create([
            'name' => 'English',
            's_code' => 'en',
            'l_code' => 'en-US',
            'is_active' =>true,
        ]);
        Language::create([
            'name' => 'Turkish',
            's_code' => 'tr',
            'l_code' => 'tr-TR',
            'is_active' =>true,
        ]);
    }
}
