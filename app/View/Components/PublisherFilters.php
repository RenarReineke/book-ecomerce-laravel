<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use App\Services\PublisherService;
use Illuminate\Contracts\View\View;

class PublisherFilters extends Component
{
    public int $minCountProducts;
    public int $maxCountProducts;
    public int $avgCountProducts;
    /**
     * Create a new component instance.
     */
    public function __construct(PublisherService $publisherService)
    {   
        foreach($publisherService->getDataForFrontendFilters() as $key => $value)
        {
            $this->{$key} = $value;
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.publisher-filters');
    }
}
