<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use App\Services\SeriesService;
use Illuminate\Contracts\View\View;

class SeriesFilters extends Component
{
    public int $minCountProducts;
    public int $maxCountProducts;
    public int $avgCountProducts;
    /**
     * Create a new component instance.
     */
    public function __construct(SeriesService $seriesService)
    {   
        foreach($seriesService->getDataForFrontendFilters() as $key => $value)
        {
            $this->{$key} = $value;
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.filters.series-filters');
    }
}
