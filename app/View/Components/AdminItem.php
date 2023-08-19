<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AdminItem extends Component
{
    public string $title;

    public string $url;
    /**
     * Create a new component instance.
     */
    public function __construct(string $title, string $url)
    {
        $this->title = $title;
        $this->url = $url;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin-item');
    }
}
