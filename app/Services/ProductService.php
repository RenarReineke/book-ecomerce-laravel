<?php

namespace App\Services;

use App\DTO\Product\ProductCreateDto;
use App\DTO\Product\ProductUpdateDto;
use App\Exceptions\BusinessException;
use App\Models\Author;
use App\Models\Category;
use App\Models\Product;
use App\Models\Publisher;
use App\Models\Series;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

final class ProductService
{
    public function getProductList()
    {
        return Product::filter(request(Product::FILTERS))->paginate(6)->withPath('?'.request()->getQueryString());
    }

    public function store(ProductCreateDto $request): Product
    {
        $product = DB::transaction(function () use ($request) {
            $product = new Product();

            $product->title = $request->title;
            $product->slug = $request->title;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->amount = $request->amount;
            $product->pages = $request->pages;
            $product->size = $request->size;
            $product->cover_type = $request->cover_type;
            $product->weight = $request->weight;
            $product->year = $request->year;
            $product->rating = $request->rating;

            $product->save();

            $category = Category::findOrFail($request->category_id);
            $product->category()->associate($category);

            $series = Series::findOrFail($request->series_id);
            $product->series()->associate($series);

            if (isset($request->tags)) {
                foreach ($request->tags as $tagId) {
                    $tag = Tag::findOrFail($tagId);
                    $product->tags()->attach($tag);
                }
            }

            if (isset($request->authors)) {
                foreach ($request->authors as $authorId) {
                    $author = Author::findOrFail($authorId);
                    $product->authors()->attach($author);
                }
            }

            if (isset($request->images)) {
                // Превратить массив файлов в массив ссылок, попутно сохраняя файлы на диск
                $images = array_map(fn ($image) => Storage::disk('public')->put('/products', $image), $request['images']);
                foreach ($images as $imagePath) {
                    $product->images()->create(['url' => $imagePath]);
                }
            }

            $product->push();

            return $product;
        });

        return $product;
    }

    public function update(ProductUpdateDto $request, Product $product): Product
    {
        $updatedProduct = DB::transaction(function () use ($request, $product) {

            // ToDo: исправить на другой тип ошибки
            if (! $product->update($request->toArray())) {
                throw new BusinessException('Не удалось обновить товар');
            }

            // $product->save();

            if (isset($request->category_id)) {
                $category = Category::findOrFail($request->category_id);
                $product->category()->associate($category);
            }

            if (isset($request->series_id)) {
                $series = Series::findOrFail($request->series_id);
                $product->series()->associate($series);
            }

            if (isset($request->tags)) {
                foreach ($request->tags as $tagId) {
                    $tag = Tag::findOrFail($tagId);
                    $product->tags()->attach($tag);
                }
            }

            if (isset($request->authors)) {
                foreach ($request->authors as $authorId) {
                    $author = Author::findOrFail($authorId);
                    $product->authors()->attach($author);
                }
            }

            if (isset($request->images)) {
                // Превратить массив файлов в массив ссылок, попутно сохраняя файлы на диск
                $images = array_map(fn ($image) => Storage::disk('public')->put('/products', $image), $request['images']);
                foreach ($images as $imagePath) {
                    $product->images()->create(['url' => $imagePath]);
                }
            }

            $product->push();

            return $product;
        });

        return $updatedProduct;
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
            'minPriceProducts', 'maxPriceProducts', 'avgPriceProducts',
        ];

        return compact(...$data);
    }

    public function getDataForModalForm(): array
    {
        $categories = Category::all();
        $tags = Tag::all();
        $publishers = Publisher::all();
        $seriesList = Series::all();
        $authors = Author::all();

        $data = [
            'categories', 'tags', 'publishers', 'seriesList', 'authors',
        ];

        return compact(...$data);
    }
}
