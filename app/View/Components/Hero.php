<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Hero extends Component
{
    public $heroImage;
    public $heroSubtitle;
    public $heroTitle;
    public $description;

    public function __construct($heroImage = '', $heroSubtitle = '', $heroTitle = '', $description = '')
    {
        $this->heroImage = $heroImage;
        $this->heroSubtitle = $heroSubtitle;
        $this->heroTitle = $heroTitle;
        $this->description = $description;
    }

    public function render()
    {
        return view('components.hero');
    }
}
