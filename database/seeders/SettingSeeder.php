<?php

namespace Database\Seeders;

use App\Models\Setting;
use App\Models\SettingDesc;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = Setting::create([
            'logo' => null,
            'favicon' => null,
        ]);

        SettingDesc::create([
            'setting_id' => $settings->id,
            'lang_id' => 1,
            'title' => 'Orka Group',
            'keywords' => 'orka',
            'description' => 'Orka Group',
        ]);

        SettingDesc::create([
            'setting_id' => $settings->id,
            'lang_id' => 2,
            'title' => 'Orka Group',
            'keywords' => 'orka',
            'description' => 'Orka Group',
        ]);

        SettingDesc::create([
            'setting_id' => $settings->id,
            'lang_id' => 3,
            'title' => 'Orka Group',
            'keywords' => 'orka',
            'description' => 'Orka Group',
        ]);
    }
}
