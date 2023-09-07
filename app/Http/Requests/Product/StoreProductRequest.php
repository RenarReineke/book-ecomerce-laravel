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
            'amount' => 'numeric',
            'pages' => 'required|numeric',
            'size' => 'required|string',
            'cover-type' => 'required|string',
            'weight' => 'required|numeric',
            'year' => 'required|numeric',
            'rating' => 'required|numeric',
            'category' => 'required|numeric',
            'publisher' => 'required|numeric',
            'series' => 'required|numeric',
            'tags' => 'array',
            'authors' => 'array',
            'images.*' => 'image'
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
