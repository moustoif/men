<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Session;
use App\Models\Service;
use App\Models\Direction;

class extraPage extends Component
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
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $direction = Direction::select('code_direction', 'abrev_direction')->get();
        $service = Service::select('code_service', 'abrev_service')->get();
        return view('components.extra-page', ['direction' => $direction, 'service' => $service]);
    }
}
