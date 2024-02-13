<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Bertan',
            'surname' => 'Aslan',
            'email' => 'bertan@bekatos.com',
            'password' => Hash::make('password'),
            'street' => 'Street',
            'street_number' => '1',
            'postal_code' => '12356',
            'dob' => '1990-01-01',
            'eu_citizen' => true,
            'is_admin' => true,
        ]);
    }
}
