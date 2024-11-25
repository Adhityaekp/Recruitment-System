<?php

namespace App\View\Components;

use Illuminate\View\Component;

class header extends Component
{
    public $name;
    public $class;
    public $profileImage;

    public function __construct($name, $class, $profileImage)
    {
        $this->name = $name;
        $this->class = $class;
        $this->profileImage = $profileImage;
    }

    public function render()
    {
        return view('components.header');
    }
}
