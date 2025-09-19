<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SupporterForm extends Component
{
    public \App\Models\Donation $donation;
    /**
     * Create a new component instance.
     */
    public function __construct(\App\Models\Donation $donation)
    {
        $this->donation = $donation;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.supporter-form');
    }
}
