<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Currency::create([
            "name" => "Euro",
            "code" => "EUR",
            "symbol" => "€",
        ]);

        Currency::create([
            "name" => "Dollar",
            "code" => "USD",
            "symbol" => "$",
        ]);

        Currency::create([
            "name" => "Turkish Lira",
            "code" => "TRY",
            "symbol" => "₺",
        ]);

        Currency::create([
            "name" => "Pound",
            "code" => "GBP",
            "symbol" => "£",
        ]);
    }
}
