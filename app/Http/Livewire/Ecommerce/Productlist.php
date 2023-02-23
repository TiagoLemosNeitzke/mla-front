<?php

namespace App\Http\Livewire\Ecommerce;

use Livewire\Component;

class Productlist extends Component
{
    public function render()
    {
        return view('livewire.ecommerce.productlist')
            ->layout('layouts.ecommerce.base');
    }
}
