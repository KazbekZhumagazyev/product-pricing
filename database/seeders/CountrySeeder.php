<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Country;

class CountrySeeder extends Seeder
{
    public function run(): void
    {
        Country::insert([
            ['code' => 'DE', 'name' => 'Германия'],
            ['code' => 'IT', 'name' => 'Италия'],
            ['code' => 'GR', 'name' => 'Греция'],
        ]);
    }
}
