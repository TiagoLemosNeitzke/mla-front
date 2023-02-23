<?php

namespace App\Http\Livewire\Ecommerce\Components;

use Livewire\Component;

class Cart extends Component
{
    public $visible;
    
    public function render()
    {
        return view('livewire.ecommerce.components.cart');
    }
}
