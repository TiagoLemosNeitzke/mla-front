<?php

namespace App\Http\Livewire\Buttons;

use Livewire\Component;

class Primary extends Component
{
    public string $label;
    
    public function render()
    {
        return view('livewire.buttons.primary');
    }
}
