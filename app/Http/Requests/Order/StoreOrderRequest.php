<?php

namespace App\Http\Requests\Order;

use App\DTO\Order\OrderCreateDto;
use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
            'phone' => ['required', 'string'],
            'address' => ['required', 'string'],
        ];
    }

    public function getDto(): OrderCreateDto
    {
        // Проверить, есть ли поле client в запросе, если заказ создается из админки
        $client = $this->has('client') ? $this->client : $this->user();

        return new OrderCreateDto(
            $this->phone,
            $this->address,
            $client
        );
    }
}
