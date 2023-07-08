<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Http\Resources\ProductResource;
use App\Http\Requests\Product\StoreProductRequest;

class ProductResourceController extends Controller
{
    public function __construct(private ProductService $product_service) {}

    public function index()
    {
        try {
            $products = Product::get();
            return ProductResource::collection($products);
        } catch(\Throwable $e) {
            return $e->getMessage();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        try {
            $dto = $request->getDto();
            $category = Category::findOrFail($request->category_id);

            $product = $this->product_service->store($dto, $category);
            return $product;

        } catch(\Throwable $e) {
            return $e->getMessage();
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $product = Product::findOrFail($id);
            return new ProductResource($product);
        } catch(\Throwable $e) {
            return $e->getMessage();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        try {
            $product = Product::findOrFail($id);
            $product->update(['title' => $request->title]);
            return $product;
        } catch(\Throwable $e) {
            return $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Product::destroy($id);
            $message = 'Ok';
            return $message;
        } catch(\Throwable $e) {
            return $e->getMessage();
        }
    }
}
