<?php

namespace App\Livewire\Admin\Portfolio;

use App\Models\ServicePhoto;
use Livewire\Component;
use Livewire\WithPagination;

class ServicePhotoComponent extends Component
{
    use WithPagination;

    public $search = '';
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['deletePhoto' => 'delete'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $photos = ServicePhoto::with('category')
            ->where('caption', 'like', '%' . $this->search . '%')
            ->orWhereHas('category', fn($q) => $q->where('name', 'like', '%' . $this->search . '%'))
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.admin.portfolio.service-photo-component', compact('photos'))
            ->extends('back.layouts.base')
            ->section('content');
    }

    public function delete($id)
    {
        ServicePhoto::findOrFail($id)->delete();
        session()->flash('message', 'Foto eliminada correctamente.');
    }

    public function confirmDelete($id)
    {
        $this->dispatch('confirmDeletePhoto', $id);
    }
}
