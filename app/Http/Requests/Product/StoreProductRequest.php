<?php

namespace App\Http\Requests\Product;

use App\DTO\Product\ProductCreateDto;
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
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'amount' => 'numeric',
            'pages' => 'required|numeric',
            'size' => 'required|string',
            'cover_type' => 'required|string',
            'weight' => 'required|numeric',
            'year' => 'required|numeric',
            'rating' => 'required|numeric',
            'category' => 'required|numeric',
            'publisher' => 'required|numeric',
            'series' => 'required|numeric',
            'tags' => 'array',
            'authors' => 'array',
            'images.*' => 'image',
        ];
    }

    public function getDto(): ProductCreateDto
    {

        return new ProductCreateDto(
            $this->title,
            $this->description,
            $this->price,
            $this->amount,
            $this->pages,
            $this->size,
            $this->cover_type,
            $this->weight,
            $this->year,
            $this->rating,
            $this->category,
            $this->publisher,
            $this->series,
            $this->tags,
            $this->authors,
            $this->images,
        );
    }
}
