<?php

namespace App\Http\Livewire\Product;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class Create extends Component
{
    public Product $product;
    public $categories;
    public string $search;

    protected function rules()
    {
        return [
            'product.name' => 'required|min:3|max:255|unique:products,name',
            'product.category_id' => 'required',
            'product.short_description' => 'required|min:3|max:255',
            'product.long_description' => 'required|min:3|max:255'
        ];
    }

    public function mount()
    {
        $this->product = new Product();
        $this->search = "";
        $this->categories = Category::where('name', 'like', "%{$this->search}%")->get();
    }

    public function render()
    {
        return view('livewire.product.create');
    }

    public function updateSearch()
    {
        $this->categories = Category::where('name', 'like', "%{$this->search}%")->get();
    }

    public function save(){
        $this->validate();
        $this->product->save();

        //return redirect()->route('product.index')->with('message', 'Product has crated successfully.');
    }
}
