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
            'products' => Product::paginate(10)
        ]);
    }

    public function destroy(Product $product)
    {
        $product->skus()->delete();
        $product->photos()->delete();
        $product->delete();
        session()->flash('message', 'Product has been deleted.');
    }
}
