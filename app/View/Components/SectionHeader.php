<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SectionHeader extends Component
{
    public $subtitle;
    public $title;

    public function __construct($subtitle = '', $title = '')
    {
        $this->subtitle = $subtitle;
        $this->title = $title;
    }

    public function render()
    {
        return view('components.section-header');
    }
}
