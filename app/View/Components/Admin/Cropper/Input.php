<?php

namespace App\View\Components\Admin\Cropper;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
    public $label;
    public $name;
    public $width;
    public $height;
    public $containerClass;

    /**
     * Create a new component instance.
     */
    public function __construct($label = '', $name = '', $width = '', $height = '', $containerClass = 'col-md-6')
    {
        $this->name = $name;
        $this->label = $label;
        $this->width = $width;
        $this->height = $height;
        $this->containerClass = $containerClass;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.cropper.input');
    }
}
