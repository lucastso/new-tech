<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;

class Nav extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $log;
    public $user;
    public function __construct()
    {
        $this->log = false;
        if (Auth::check()) {
            $this->log = true;
            $this->user = Auth::user();
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.nav');
    }
}
