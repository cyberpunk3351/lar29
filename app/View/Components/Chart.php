<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Chart extends Component
{
    public $name;
    public $weight;
    public $canvas;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $weight, $canvas)
    {
        $this->name = $name;
        $this->weight = $weight;
        $this->canvas = $canvas;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.chart');
    }
}
