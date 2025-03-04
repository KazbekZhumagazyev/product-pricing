<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Country;

class PriceCalculationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $countryCodes = Country::pluck('code')->implode('|');

        return [
            'product_id' => 'required|exists:products,id',
            'tax_number' => ['required', "regex:/^({$countryCodes})[0-9]{9,11}$/"],
        ];
    }

    public function messages(): array
    {
        return [
            'tax_number.regex' => 'Введите корректный tax номер',
        ];
    }
}
