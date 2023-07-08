<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;
use ProductCreateDto;

class StoreProductRequest extends FormRequest
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
            'title' => '',
            'desciption' =>  'nullable',
            'price' => 'numeric',
            'category_id' => 'numeric',
        ];
    }

    public function getDto(): ProductCreateDto
    {
        return new ProductCreateDto(
            $this->title,
            $this->description,
            $this->price,
            $this->category_id,
        );
    }
}
