<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use App\Services\ProductService;
use Illuminate\Contracts\View\View;

class ProductFormItems extends Component
{
    public $categories;
    public $tags;
    public $publishers;
    public $seriesList;
    public $authors;

    public function __construct(ProductService $productService)
    {
        foreach($productService->getDataForModalForm() as $key => $value)
        {
            $this->{$key} = $value;
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.product-form-items');
    }
}
