<?php

namespace App\Http\Controllers;

use App\Http\Requests\PriceCalculationRequest;
use App\Models\Product;
use App\Services\TaxCalculatorService;

class PriceCalculatorController extends Controller
{
    public function __construct(private TaxCalculatorService $taxCalculator) {}

    public function showForm()
    {
        return view('calculate', ['products' => Product::all()]);
    }

    public function calculatePrice(PriceCalculationRequest $request)
    {
        $product = Product::findOrFail($request->product_id);
        $totalPrice = $this->taxCalculator->calculateTotalPrice($product->price, $request->tax_number);

        return back()->with('result', "Цена с налогом: {$totalPrice} евро");
    }
}
