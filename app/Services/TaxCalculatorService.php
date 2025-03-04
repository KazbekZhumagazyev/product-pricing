<?php

namespace App\Services;

use App\Models\Country;

class TaxCalculatorService
{
    public function calculateTotalPrice(float $price, string $taxNumber): float
    {
        $countryCode = substr($taxNumber, 0, 2);
        $country = Country::where('code', $countryCode)->first();

        if (!$country || !$country->taxRate) {
            throw new \Exception("Страна с кодом $countryCode не найдена или налоговая ставка отсутствует.");
        }

        return round($price * (1 + $country->taxRate->rate), 2);
    }
}
