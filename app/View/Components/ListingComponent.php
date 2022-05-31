<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ListingComponent extends Component
{
    public $listing;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($listing)
    {
        $this->listing = $listing;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.listing-component');
    }
}
