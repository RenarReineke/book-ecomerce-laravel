<?php

namespace App\Services;

use App\Models\Tag;
use App\Models\Image;
use App\Models\Author;
use App\Models\Series;
use App\Models\Product;
use App\Models\Category;
use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\LengthAwarePaginator;

final class ProductService
{
    public function getProductList()
    {   
        // dd(get_class_methods(request()));
        return Product::filter(request(Product::FILTERS))->paginate(6)->withPath("?" . request()->getQueryString());
    }

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

            $images = array_map(fn($image) => Storage::disk('public')->put('/products', $image), $request['images']);
            foreach($images as $imagePath)
            {
                $product->images()->create(['url' => $imagePath]);
            }

            $product->push();

            return $product;
        });

        return $product;
    }

    public function getDataForFrontendFilters(): array
    {   
        $categories = Category::all();
        $publishers = Publisher::all();
        $seriesList = Series::all();

        $minPriceProducts = Product::min('price');
        $maxPriceProducts = Product::max('price');
        $avgPriceProducts = round(Product::avg('price'));

        $data = [
            'categories', 'publishers', 'seriesList', 
            'minPriceProducts', 'maxPriceProducts', 'avgPriceProducts'
        ];

        return compact(...$data);
    }
}
