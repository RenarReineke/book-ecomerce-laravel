<?php

namespace App\Http\Requests\Cart;

use App\DTO\Cart\CartCreateDto;
use App\Rules\CartRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreCartRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'products' => ['required', 'array', new CartRule()],
        ];
    }

    public function getDto(): CartCreateDto
    {
        $client = $this->user();

        return new CartCreateDto($this->products, $client);
    }
}
