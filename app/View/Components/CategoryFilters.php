<?php

namespace App\View\Components;

use App\Services\CategoryService;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CategoryFilters extends Component
{   
    public int $minCountProducts;
    public int $maxCountProducts;
    public int $avgCountProducts;
    /**
     * Create a new component instance.
     */
    public function __construct(CategoryService $categoryService)
    {   
        foreach($categoryService->getDataForFrontendFilters() as $key => $value)
        {
            $this->{$key} = $value;
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.category-filters');
    }
}
