<?php

namespace App\Http\Requests\Cart;

use App\DTO\Cart\CartUpdateDto;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCartRequest extends FormRequest
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
            'product_id' => ['required', 'numeric'],
            'amount' => ['numeric'],
        ];
    }

    public function getDto(): CartUpdateDto
    {
        $client = $this->user();

        return new CartUpdateDto($this->product_id, $this->amount, $client);
    }
}
