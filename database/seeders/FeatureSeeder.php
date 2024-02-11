<?php

namespace Database\Seeders;

use App\Models\Feature;
use App\Models\FeatureDesc;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeatureSeeder extends Seeder
{
    public function run()
    {
        $fea =Feature::create([
            'is_active'=>true,
        ]);
        FeatureDesc::create([
            'lang_id'=>1,
            'feature_id'=>$fea->id,
            'name'=>'Schwimmbad',

        ]);
        FeatureDesc::create([
            'lang_id'=>2,
            'feature_id'=>$fea->id,
            'name'=>'Swimming Pool',

        ]);
        FeatureDesc::create([
            'lang_id'=>3,
            'feature_id'=>$fea->id,
            'name'=>'Yüzme Havuzu',

        ]);
    }
}
