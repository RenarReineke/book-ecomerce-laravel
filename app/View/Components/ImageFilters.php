<?php

namespace App\View\Components;

use Closure;
use App\Services\TagService;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class ImageFilters extends Component
{
    public int $minCountProducts;
    public int $maxCountProducts;
    public int $avgCountProducts;
    
    public function __construct(TagService $tagService)
    {
        foreach($tagService->getDataForFrontendFilters() as $key => $value)
        {
            $this->{$key} = $value;
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.filters.tag-filters');
    }
}
