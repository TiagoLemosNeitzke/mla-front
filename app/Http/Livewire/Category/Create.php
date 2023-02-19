<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use Livewire\Component;

class Create extends Component
{
    public Category $category;

    protected $rules = [
        'category.name' => 'required|min:4|max:255|string|unique:categories,name'
    ];

    protected $messages = [
        'category.name.required' => 'Nome da categoria obrigatório',
        'category.name.min' => 'Digite pelo menos 4 caracteres',
        'category.name.max' => 'Tamanho máximo é 255 caracteres',
        'category.name.string' => 'Tipo inválido',
        'category.name.unique' => 'Categoria já existe',
    ];

    public function mount()
    {
        $this->category = new Category();
    }

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function render()
    {
        return view('livewire.category.create');
    }

    public function save()
    {
        $this->validate();
        $this->category->save();

        return redirect()->route('category.index')->with('message','Category has created successfully');
    }
}
