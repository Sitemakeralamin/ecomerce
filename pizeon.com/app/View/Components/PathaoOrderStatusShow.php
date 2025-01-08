<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PathaoOrderStatusShow extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $orderid;

    public function __construct($orderid)
    {
        $this->orderid = $orderid;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.pathao-order-status-show');
    }
}
