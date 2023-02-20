<?php

namespace App\Http\Livewire\Product;

use App\Models\Photo;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    
    public Product $product;
    public $categories;
    public string $search;
    public $photo;

    protected function rules()
    {
        $rules = [
            'product.category_id' => 'required',
            'product.short_description' => 'required|min:3|max:255',
            'product.long_description' => 'required|min:3|max:255'
        ];

        if ($this->product->id) {
            $rules['product.name'] = 'required|min:3|max:255|unique:products,name,'. $this->product->id;
            $rules['product.skus.*.sku'] = 'nullable|unique:skus,sku';
            $rules['product.skus.*.quantity'] = 'nullable';
            $rules['product.photos'] = 'image';
        } else {
            $rules['product.name'] = 'required|min:3|max:255|unique:products,name';
        }

        return $rules;
    }

    public function mount($product = null)
    {
        $this->product = $product ? $product->load(['photos', 'sku']) : new Product();
        $this->search = $product ? $product->category->name : "";
        $this->categories = Category::where('name', 'like', "%{$this->search}%")->get();
    }

    public function render()
    {
        return view('livewire.product.create');
    }

    public function updatedSearch()
    {
        $this->categories = Category::where('name', 'like', "%{$this->search}%")->get();
    }

    public function updatedPhoto()
    {
        $photo = $this->photo->storePublicly($this->product->id, 's3');
        $this->product->photos()->save((new Photo(['path' => $photo, 'featured' => 0])));

       session()->flash('message', 'New photo uploaded.');

       $this->product->load('photos');
    }

    public function save()
    {
        $this->validate();
        $this->product->save();

        //return redirect()->route('product.index')->with('message', 'Product has crated successfully.');
    }
}
