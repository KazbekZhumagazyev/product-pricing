<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Services\TaxCalculatorService;
use App\Models\Product;
use App\Models\Country;

class PriceCalculationUnitTest extends TestCase
{
    protected TaxCalculatorService $taxCalculator;

    public function setUp(): void
    {
        parent::setUp();
        $this->taxCalculator = new TaxCalculatorService();
    }

    /** @test */
    public function it_calculates_price_correctly_for_germany()
    {
        $product = Product::firstWhere('name', 'Наушники');
        $taxNumber = 'DE123456789';

        $totalPrice = $this->taxCalculator->calculateTotalPrice($product->price, $taxNumber);
        $this->assertEquals(119.00, $totalPrice);
    }

    /** @test */
    public function it_calculates_price_correctly_for_italy()
    {
        $product = Product::firstWhere('name', 'Наушники');
        $taxNumber = 'IT12345678901';

        $totalPrice = $this->taxCalculator->calculateTotalPrice($product->price, $taxNumber);
        $this->assertEquals(122.00, $totalPrice);
    }

    /** @test */
    public function it_calculates_price_correctly_for_greece()
    {
        $product = Product::firstWhere('name', 'Наушники');
        $taxNumber = 'GR123456789';

        $totalPrice = $this->taxCalculator->calculateTotalPrice($product->price, $taxNumber);
        $this->assertEquals(124.00, $totalPrice);
    }

    /** @test */
    public function it_returns_original_price_for_invalid_country_code()
    {
        $product = Product::firstWhere('name', 'Наушники');
        $taxNumber = 'XX123456789';

        $totalPrice = $this->taxCalculator->calculateTotalPrice($product->price, $taxNumber);
        $this->assertEquals($product->price, $totalPrice);
    }
}
