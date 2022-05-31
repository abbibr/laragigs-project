<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TagsComponent extends Component
{
    public $tagsCsv;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($tagsCsv)
    {
        $this->tagsCsv = $tagsCsv;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.tags-component');
    }
}
