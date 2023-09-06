<?php

namespace App\Services;

use App\Models\Tag;
use App\Models\Author;
use App\Models\Series;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

final class ProductService
{
    public function store(array $request): Product
    {
        $product = DB::transaction(function () use ($request) {
            $product = new Product();

            $product->title = $request['title'];
            $product->description = $request['description'];
            $product->price = $request['price'];
            $product->amount = $request['amount'];
            $product->pages = $request['pages'];
            $product->size = $request['cover-type'];
            $product->cover_type = $request['cover-type'];
            $product->weight = $request['weight'];
            $product->year = $request['year'];
            $product->rating = $request['rating'];

            $product->save();

            $category = Category::findOrFail($request['category']);
            $product->category()->associate($category);

            $series = Series::findOrFail($request['series']);
            $product->series()->associate($series);

            foreach($request['tags'] as $tagId)
            {
                $tag = Tag::findOrFail($tagId);
                $product->tags()->attach($tag);
            }

            foreach($request['authors'] as $authorId)
            {
                $author = Author::findOrFail($authorId);
                $product->authors()->attach($author);
            }

            $product->push();

            return $product;
        });

        return $product;
    }
}
