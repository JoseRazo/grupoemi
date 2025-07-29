<?php

namespace App\Livewire\Admin\Portfolio;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Service;

class ServicesComponent extends Component
{
    use WithPagination, WithFileUploads;

    public $service_id, $name, $description, $image_url, $isOpen = false, $search = '';
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['deleteService' => 'delete'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $services = Service::where('name', 'like', '%' . $this->search . '%')
            ->orderBy('name')
            ->paginate(10);

        return view('livewire.admin.portfolio.services-component', compact('services'))
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
        $service = Service::findOrFail($id);
        $this->service_id = $service->id;
        $this->name = $service->name;
        $this->description = $service->description;
        $this->image_url = null;
        $this->isOpen = true;
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|string|min:3|unique:services,name,' . $this->service_id,
            'image_url' => 'nullable|image|max:6144',
        ]);

        $imagePath = null;

        if ($this->image_url) {
            // Si se está actualizando un servicio, buscarlo y eliminar su imagen anterior
            if ($this->service_id) {
                $existingService = Service::find($this->service_id);

                if ($existingService && $existingService->image_url && \Storage::disk('public')->exists($existingService->image_url)) {
                    \Storage::disk('public')->delete($existingService->image_url);
                }
            }

            // Guardar la nueva imagen
            $imagePath = $this->image_url->store('service-images', 'public');
        }

        $service = Service::updateOrCreate(
            ['id' => $this->service_id],
            [
                'name' => $this->name,
                'description' => $this->description,
                'image_url' => $imagePath ?? ($this->service_id ? Service::find($this->service_id)->image_url : null),
            ]
        );

        session()->flash('message', $this->service_id ? 'Servicio actualizado.' : 'Servicio creado.');
        $this->closeModal();
    }

    public function delete($id)
    {
        Service::findOrFail($id)->delete();
        session()->flash('message', 'Servicio eliminado.');
    }

    public function confirmDelete($id)
    {
        $this->dispatch('confirmDeleteService', $id);
    }

    public function closeModal()
    {
        $this->isOpen = false;
        $this->resetForm();
    }

    private function resetForm()
    {
        $this->reset(['service_id', 'name', 'description', 'image_url']);
    }
}
