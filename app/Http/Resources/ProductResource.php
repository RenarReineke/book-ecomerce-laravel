<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'amount' => $this->amount,
            'pages' => $this->pages,
            'size' => $this->size,
            'cover_type' => $this->cover_type,
            'weight' => $this->weight,
            'year' => $this->year,
            'rating' => $this->rating,
            'category' => $this->category->title,
            'publisher' => $this->series->publisher->title,
            'series' => $this->series->title,
            'tags' => TagResource::collection($this->tags),
            'authors' => AuthorResource::collection($this->authors),
            'images' => ImageResource::collection($this->images),
            'rewiews' => RewiewResource::collection($this->rewiews),
        ];
    }
}
