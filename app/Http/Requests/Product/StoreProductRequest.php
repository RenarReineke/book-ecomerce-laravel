<?php

namespace App\Http\Requests\Product;

use App\DTO\ProductCreateDto;
use Illuminate\Foundation\Http\FormRequest;

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
            'title' => 'required|string',
            'description' => 'string',
            'price' => 'required|numeric',
            'category_id' => 'required|numeric',
        ];
    }

    // public function getDto(): ProductCreateDto
    // {
    //     $ta = [
    //         'title' => $this->title,
    //         'desc' => $this->desc,
    //         'price' => $this->price,
    //         'category' => $this->category_id
    //     ];
    //     return new ProductCreateDto(
    //         $this->title,
    //         $this->price,
    //         $this->category_id,
    //         $this->description,
    //     );
    // }
}
