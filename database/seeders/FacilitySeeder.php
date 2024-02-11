<?php

namespace Database\Seeders;

use App\Models\Facility;
use App\Models\FacilityDesc;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fac = Facility::create([]);
        FacilityDesc::create([
            'lang_id' => 1,
            'facility_id' => $fac->id,
            'name' => 'Stadtzentrum',
        ]);
        FacilityDesc::create([
            'lang_id' => 2,
            'facility_id' => $fac->id,
            'name' => 'Hospital',
        ]);
        FacilityDesc::create([
            'lang_id' => 3,
            'facility_id' => $fac->id,
            'name' => 'Şehir merkezi',
        ]);
    }
}
