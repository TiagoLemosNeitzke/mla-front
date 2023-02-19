<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use Livewire\Component;

class Update extends Component
{
    public Category $category;

    protected function rules()
    {
        return [
        'category.name' => 'required|min:4|max:255|string|unique:categories,name,'. $this->category->id
    ];
    }

    protected $messages = [
        'category.name.required' => 'Nome da categoria obrigatório',
        'category.name.min' => 'Digite pelo menos 4 caracteres',
        'category.name.max' => 'Tamanho máximo é 255 caracteres',
        'category.name.string' => 'Tipo inválido',
        'category.name.unique' => 'Categoria já existe',
    ];

    public function render()
    {
        return view('livewire.category.update');
    }

    public function save()
    {
        $this->validate();
        $this->category->save();

        return redirect()->route('category.index')->with('message', 'Category has updated successfully');
    }
}
