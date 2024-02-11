<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $country_path = 'public/locations/countries_lite.sql';
        DB::unprepared(file_get_contents($country_path));
        $this->command->info('Country table seeded!');

        //TODO: because of the file size, we will not seed the city table for now
        // $city_path = 'public/locations/cities_lite.sql';
        // DB::unprepared(file_get_contents($city_path));
        // $this->command->info('City table seeded!');

        $states_path = 'public/locations/states_lite.sql';
        DB::unprepared(file_get_contents($states_path));
        $this->command->info('States table seeded!');

        $this->call([
            UserSeeder::class,
            LangSeeder::class,
            FeatureSeeder::class,
            PropertyDetailSeeder::class,
            FacilitySeeder::class,
            AdvertTypeSeeder::class,
            CurrencySeeder::class,
            AdvertSeeder::class,
            SettingSeeder::class,
        ]);
    }
}
