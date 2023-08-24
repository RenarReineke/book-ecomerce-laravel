<?php

namespace App\Http\Requests\Category;

use App\DTO\CategoryDto;
use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'description' => 'required|string'
        ];
    }

    // public function getDto()
    // {
    //     return new CategoryDto($this->title, $this->description);
    // }

    public function messages()
    {
        return [
            'title.required' => 'No title - vot eta povorot!'
        ];
    }
}
