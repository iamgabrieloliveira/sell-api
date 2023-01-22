<?php

namespace App\Http\Requests\Seller;

use Illuminate\Foundation\Http\FormRequest;

class CreateSellerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'string|required',
            'email' => 'email|required',
        ];
    }

    public function getName(): string
    {
        return $this->validated('name');
    }
    public function getEmail(): string
    {
        return $this->validated('email');
    }
}
