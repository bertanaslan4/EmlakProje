<?php

namespace Database\Seeders;

use App\Models\Advert;
use App\Models\AdvertDesc;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdvertSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adv =Advert::create([
            'uuid' => Str::uuid(),
            'thumbnail'=> null,
            'rent_price'=>123.12,
            'deposit_price'=>345.34,
            'currency_id' => 1,
            'country_id' => 82,
            // 'city_id' => 26756,
            'state_id' => 3010,
            'address' => 'Address',
            'category_id' => 1,
            'type_id' => 1,
            'user_id' => 1,
            'is_active'=>true,
        ]);

        AdvertDesc::create([
            'lang_id' => 1,
            'advert_id' => $adv->id,
            'title' => 'Anzeige 1',
            'description' => 'Anzeige Beschreibung 1',
            'sef_link' => 'anzeige-1',
        ]);

        AdvertDesc::create([
            'lang_id' => 2,
            'advert_id' => $adv->id,
            'title' => 'Advert 1',
            'description' => 'Advert Description 1',
            'sef_link' => 'advert-1',
        ]);

        AdvertDesc::create([
            'lang_id' => 3,
            'advert_id' => $adv->id,
            'title' => 'İlan 1',
            'description' => 'Advert Description 1',
            'sef_link' => 'ilan-1',
        ]);

        $adv->propertyDetails()->attach(1, ['value' => 2]);
        $adv->facilities()->attach(1, ['value' => 2]);
        $adv->features()->attach(1);

        $adv2 =Advert::create([
            'uuid' => Str::uuid(),
            'thumbnail'=> null,
            'rent_price'=>321.21,
            'deposit_price'=>543.43,
            'currency_id' => 1,
            'country_id' => 82,
            // 'city_id' => 26756,
            'state_id' => 3010,
            'address' => 'Address 2',
            'category_id' => 2,
            'type_id' => 1,
            'user_id' => 1,
            'is_active'=>true,
        ]);

        AdvertDesc::create([
            'lang_id' => 1,
            'advert_id' => $adv2->id,
            'title' => 'Anzeige 2',
            'description' => 'Anzeige Beschreibung 2',
            'sef_link' => 'anzeige-2',
        ]);

        AdvertDesc::create([
            'lang_id' => 2,
            'advert_id' => $adv2->id,
            'title' => 'Advert 2',
            'description' => 'Advert Description 2',
            'sef_link' => 'advert-2',
        ]);

        AdvertDesc::create([
            'lang_id' => 3,
            'advert_id' => $adv2->id,
            'title' => 'İlan 2',
            'description' => 'Advert Description 2',
            'sef_link' => 'ilan-2',
        ]);

        $adv2->propertyDetails()->attach(2, ['value' => 2]);
        $adv2->facilities()->attach(1, ['value' => 2]);
        $adv2->features()->attach(1);

    }
}
