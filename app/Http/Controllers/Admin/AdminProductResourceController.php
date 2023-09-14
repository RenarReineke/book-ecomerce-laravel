<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreProductRequest;
use App\Models\Author;
use App\Models\Category;
use App\Models\Product;
use App\Models\Publisher;
use App\Models\Series;
use App\Models\Tag;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminProductResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $products = Product::filter(request([
            'search', 'rating', 'cover', 'fromPrice', 
            'toPrice', 'category', 'series', 'publisher',
            ]))->paginate(6);
        
        $categories = Category::all();
        $publishers = Publisher::all();
        $seriesList = Series::all();

        $minPriceProducts = Product::min('price');
        $maxPriceProducts = Product::max('price');
        $avgPriceProducts = Product::avg('price');

        $data = [
            'products', 'categories', 'publishers', 'seriesList', 
            'minPriceProducts', 'maxPriceProducts', 'avgPriceProducts'
        ];

        return view('admin.main.products.productList', compact(...$data));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        $publishers = Publisher::all();
        $seriesList = Series::all();
        $authors = Author::all();
        return view('admin.main.products.productCreateForm', compact('categories', 'tags', 'publishers', 'seriesList', 'authors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request, ProductService $productService)
    {   
        $product = $productService->store($request->validated());
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cart = Product::find($id);
        $cart->delete();
        return back();
    }
}
