<?php

namespace App\View\Components\Pagination;

use Closure;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SimplePaginator extends Component
{
    public $paginator;

    /**
     * @param LengthAwarePaginator|array $paginator
     */
    public function __construct($paginator)
    {
        $this->paginator = $paginator;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    public function render()
    {
        return view('components.pagination.simple-paginator');
    }
}
