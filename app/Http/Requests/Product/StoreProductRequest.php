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
            'category' => 'required|numeric|exists:categories,id',
            'publisher' => 'required|numeric|exists:publishers,id',
            'series' => 'required|numeric|exists:series,id',
            'tags' => 'array',
            'tag.*' => 'required|numeric|exists:tags,id',
            'authors' => 'array',
            'authors.*' => 'required|numeric|exists:authors,id',
            'images' => 'array',
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
