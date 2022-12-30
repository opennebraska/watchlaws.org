<?php

namespace App\View\Components\Navbar;

use Illuminate\View\Component;

class Link extends Component
{
    public bool $active = false;

    public function __construct(public $href)
    {
    }

    public function render()
    {
        return view('components.navbar.link');
    }
}
