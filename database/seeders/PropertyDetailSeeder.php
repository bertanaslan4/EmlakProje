<?php

namespace Database\Seeders;

use App\Models\PropertyDetail;
use App\Models\PropertyDetailDesc;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PropertyDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pd=PropertyDetail::create([
            'icon'=>'bed.svg',
        ]);
        PropertyDetailDesc::create([
            'lang_id'=>1,
            'property_detail_id'=>$pd->id,
            'name'=>'Bett'
        ]);
        PropertyDetailDesc::create([
            'lang_id'=>2,
            'property_detail_id'=>$pd->id,
            'name'=>'Bed'
        ]);
        PropertyDetailDesc::create([
            'lang_id'=>3,
            'property_detail_id'=>$pd->id,
            'name'=>'Yatak'
        ]);

        $pd2 = PropertyDetail::create([
            'icon'=>'bath.svg',
        ]);
        PropertyDetailDesc::create([
            'lang_id'=>1,
            'property_detail_id'=>$pd2->id,
            'name'=>'Bad'
        ]);
        PropertyDetailDesc::create([
            'lang_id'=>2,
            'property_detail_id'=>$pd2->id,
            'name'=>'Bath'
        ]);
        PropertyDetailDesc::create([
            'lang_id'=>3,
            'property_detail_id'=>$pd2->id,
            'name'=>'Banyo'
        ]);
    }
}
