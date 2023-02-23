<?php

namespace App\Http\Livewire\Product;

use App\Models\Sku;
use App\Models\Photo;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Create extends Component
{
    use WithFileUploads;
    
    public Product $product;
    public $categories;
    public string $search;
    public $photo;
    public string $sku;
    public int $quantity;

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
        $this->product = $product ? $product->load(['photos', 'skus']) : new Product();
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

    public function save()
    {
        $this->validate();
        $this->product->save();
        session()->flash('message', 'Product has crated successfully.');
    }
    
    public function updatedPhoto()
    {
        $photo = $this->photo->storePublicly($this->product->id, 'local');
        $this->product->photos()->save((new Photo(['path' => $photo, 'featured' => 0])));
        session()->flash('message', 'New photo uploaded.');
        $this->product->load('photos');
    }

    public function setFeatured(Photo $photo)
    {
        Photo::query()->where('product_id', $photo->product_id)->update(['featured' => 0]);
        $photo->featured = 1;
        $photo->save();
        session()->flash('message', 'Photo set as features.');
        $this->product->load('photos');
    }

    public function deletePhoto(Photo $photo)
    {
        Storage::disk('local')->delete($photo->path);
        $photo = Photo::where('id', $photo->id)->first();
        $photo->delete();
        session()->flash('message', 'Photo deleted.');
        $this->product->load('photos');
    }

    public function saveSku($sku = null)
    {
        if ($sku) {
            /* $this->validate([
                'product.skus.*.sku' => 'required|unique:skus,sku,'. $sku['id'],
            ]); */

            $update = Sku::find($sku['id']);
            $update->sku = $sku['sku'];
            $update->quantity = $sku['quantity'];
            $update->save();
        } else {
            $this->validate([
                'sku' => 'required|unique:skus,sku',
            ]);

            $this->product->skus()->save(new Sku(['sku' => $this->sku, 'quantity' => $this->quantity]));
        }

        session()->flash('message', 'Sku created.');

        $this->product->load('skus');
        $this->sku = '';
        $this->quantity = 0;
    }

    public function removeSku(Sku $sku)
    {
        $sku->delete();
        session()->flash('message', 'Sku has been deleted.');
        $this->product->load('skus');
    }
}
