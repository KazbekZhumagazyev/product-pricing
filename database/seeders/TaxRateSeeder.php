<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TaxRate;
use App\Models\Country;

class TaxRateSeeder extends Seeder
{
    public function run(): void
    {
        foreach (['DE' => 0.19, 'IT' => 0.22, 'GR' => 0.24] as $code => $rate) {
            $country = Country::where('code', $code)->first();
            TaxRate::updateOrCreate(['country_id' => $country->id], ['rate' => $rate]);
        }
    }
}
