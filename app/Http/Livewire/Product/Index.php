<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.product.index', [
            'products' => Product::paginate(2)
        ]);
    }

    public function destroy($product)
    {
        return redirect()->route('product.index')->with('message', 'Product has been deleted.');
    }
}
