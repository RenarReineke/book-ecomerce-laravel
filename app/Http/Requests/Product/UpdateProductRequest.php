<?php

namespace App\Http\Requests\Product;

use App\DTO\Product\ProductUpdateDto;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'title' => 'string',
            'description' => 'nullable|string',
            'price' => 'numeric',
            'amount' => 'numeric',
            'pages' => 'numeric',
            'size' => 'string',
            'cover_type' => 'string',
            'weight' => 'numeric',
            'year' => 'numeric',
            'rating' => 'numeric',
            'category' => 'numeric',
            'publisher' => 'numeric',
            'series' => 'numeric',
            'tags' => 'array',
            'authors' => 'array',
            'images.*' => 'image',
        ];
    }

    public function getDto(): ProductUpdateDto
    {
        return new ProductUpdateDto(
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
