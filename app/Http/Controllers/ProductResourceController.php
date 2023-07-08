<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\StoreProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $products = Product::get();
            return $products;
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
            $validated = $request->validated();

            DB::transaction(function () use ($validated, $request) {
                $product = Product::create($validated);
                $category = Category::findOrFail($request->category_id);
                $category->products()->save($product);
                return $product;
            });

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
            return $product;
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
