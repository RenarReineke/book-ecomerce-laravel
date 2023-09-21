<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use App\Services\RewiewService;
use Illuminate\Contracts\View\View;

class RewiewFormItems extends Component
{
    public $ratingList;

    public function __construct(RewiewService $rewiewService)
    {
        foreach($rewiewService->getDataForModalForm() as $key => $value)
        {
            $this->{$key} = $value;
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.rewiew-form-items');
    }
}
