<?php

namespace App\View\Components;

use Closure;
use Dotenv\Util\Str;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class StatisticItem extends Component
{
    public string $title;
    public string $info;
    public string $color;
    public string $colorBottom;

    public function __construct(string $title, string  $info, string $color, string $colorBottom)
    {
        $this->title = $title;
        $this->info = $info;
        $this->color = $color;
        $this->colorBottom = $colorBottom;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.statistic-item');
    }
}
