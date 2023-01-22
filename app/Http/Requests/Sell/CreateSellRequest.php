<?php

namespace App\Http\Requests\Sell;

use Illuminate\Foundation\Http\FormRequest;

class CreateSellRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'value' => 'numeric|required',
        ];
    }

    public function getValue(): int
    {
        return $this->validated('value') * 100;
    }
}
