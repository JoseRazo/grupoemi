<?php

namespace App\Livewire\Admin\Portfolio;

use App\Models\Service;
use App\Models\ServiceCategory;
use Livewire\Component;
use Livewire\WithPagination;

class ServiceCategoryComponent extends Component
{
    use WithPagination;

    public $category_id, $name, $service_id, $description, $isOpen = false, $search = '';
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['deleteCategory' => 'delete'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $categories = ServiceCategory::with('service')
            ->where('name', 'like', '%' . $this->search . '%')
            ->orWhereHas('service', fn($q) => $q->where('name', 'like', '%' . $this->search . '%'))
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $services = Service::orderBy('name')->get();

        return view('livewire.admin.portfolio.service-category-component', compact('categories', 'services'))
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
        $category = ServiceCategory::findOrFail($id);
        $this->category_id = $category->id;
        $this->name = $category->name;
        $this->service_id = $category->service_id;
        $this->description = $category->description;
        $this->isOpen = true;
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|string|min:3|unique:service_categories,name,' . $this->category_id,
            'service_id' => 'required|exists:services,id',
            'description' => 'nullable|string|max:1000',
        ]);

        ServiceCategory::updateOrCreate(
            ['id' => $this->category_id],
            [
                'name' => $this->name,
                'service_id' => $this->service_id,
                'description' => $this->description,
            ]
        );

        session()->flash('message', $this->category_id ? 'Categoría actualizada.' : 'Categoría creada.');
        $this->closeModal();
    }

    public function delete($id)
    {
        ServiceCategory::findOrFail($id)->delete();
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
        $this->reset(['category_id', 'name', 'service_id', 'description']);
    }
}
