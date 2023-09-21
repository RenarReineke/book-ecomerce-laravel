<?php

namespace App\View\Components;

use Closure;
use App\Models\Author;
use App\Models\Series;
use App\Models\Product;
use App\Models\Category;
use App\Models\Publisher;
use App\Services\ProductService;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class ProductFilters extends Component
{   

    public $categories;
    public $authors;
    public $publishers;
    public $seriesList;
    public int $minPriceProducts;
    public int $maxPriceProducts;
    public int $avgPriceProducts;
    /**
     * Create a new component instance.
     */
    public function __construct(ProductService $productService)
    {   
        foreach($productService->getDataForFrontendFilters() as $key => $value)
        {
            $this->{$key} = $value;
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.filters.product-filters');
    }
}
