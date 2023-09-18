<?php

namespace App\View\Components;

use App\Services\AuthorService;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AuthorFilters extends Component
{
    public int $minCountProducts;
    public int $maxCountProducts;
    public int $avgCountProducts;
    
    public function __construct(AuthorService $authorService)
    {
        foreach($authorService->getDataForFrontendFilters() as $key => $value)
        {
            $this->{$key} = $value;
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.author-filters');
    }
}
