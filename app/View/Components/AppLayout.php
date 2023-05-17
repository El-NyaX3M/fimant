<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AppLayout extends Component
{

    public $breadcrum;

    public function __construct($breadcrum = array("main_title" => ""))
    {
        $this -> breadcrum = $breadcrum;
    }
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('layouts.app');
    }
}