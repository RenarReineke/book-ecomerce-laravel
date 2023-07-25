<?php

namespace App\Http\Resources;

use App\Models\Rewiew;
use App\Models\Tag;
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
            'category' => $this->category?->title,
            'tags' => TagResource::collection($this->tags),
            'rewiews' => RewiewResource::collection($this->rewiews),
        ];
    }
}
