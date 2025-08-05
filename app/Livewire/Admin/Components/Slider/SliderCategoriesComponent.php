<?php

namespace App\Livewire\Admin\Components\Slider;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\SliderCategory;

class SliderCategoriesComponent extends Component
{
    use WithPagination;

    public $slider_category_id, $name, $description, $isOpen = false, $search = '';
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['deleteCategory' => 'delete'];

    public function updatingSearch() { $this->resetPage(); }

    public function render()
    {
        $categories = SliderCategory::where('name', 'like', "%{$this->search}%")
            ->orderBy('name')
            ->paginate(10);

        return view('livewire.admin.components.slider.slider-categories-component', compact('categories'))
            ->extends('back.layouts.base')
            ->section('content');
    }

    public function create()
    {
        $this->resetForm();
        $this->isOpen = true;
    }

    public function edit($id)
    {
        $category = SliderCategory::findOrFail($id);
        $this->slider_category_id = $category->id;
        $this->name = $category->name;
        $this->description = $category->description;
        $this->isOpen = true;
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|string|min:3|unique:slider_categories,name,' . $this->slider_category_id,
        ]);

        SliderCategory::updateOrCreate(
            ['id' => $this->slider_category_id],
            ['name' => $this->name, 'description' => $this->description]
        );

        session()->flash('message', $this->slider_category_id ? 'Categoría actualizada.' : 'Categoría creada.');
        $this->closeModal();
    }

    public function delete($id)
    {
        SliderCategory::findOrFail($id)->delete();
        session()->flash('message', 'Categoría eliminada.');
    }

    public function confirmDelete($id)
    {
        $this->dispatch('confirmDeleteCategory', $id);
    }

    public function closeModal()
    {
        $this->isOpen = false;
        $this->resetForm();
    }

    private function resetForm()
    {
        $this->reset(['slider_category_id', 'name', 'description']);
    }
}

