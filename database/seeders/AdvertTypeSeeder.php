<?php

namespace Database\Seeders;

use App\Models\AdvertDesc;
use App\Models\AdvertType;
use App\Models\AdvertTypeDesc;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdvertTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type =AdvertType::create([]);
        AdvertTypeDesc::create([
            'advert_type_id' => $type->id,
            'lang_id' => 1,
            'title' => 'Apartment',
            'description' => 'Apartment',
        ]);
        AdvertTypeDesc::create([
            'advert_type_id' => $type->id,
            'lang_id' => 2,
            'title' => 'Apartment',
            'description' => 'Apartment',
        ]);
        AdvertTypeDesc::create([
            'advert_type_id' => $type->id,
            'lang_id' => 3,
            'title' => 'Apartman',
            'description' => 'Apartman',
        ]);
    }
}
