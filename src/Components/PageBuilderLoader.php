<?php

namespace Mariojgt\Onix\Components;

use Illuminate\View\Component;

class PageBuilderLoader extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        dd('here');
        return view('unity_admin::components.app.footer');
    }
}
