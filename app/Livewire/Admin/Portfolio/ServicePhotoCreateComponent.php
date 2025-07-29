<?php

namespace App\Livewire\Admin\Portfolio;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\ServicePhoto;

class ServicePhotoCreateComponent extends Component
{
    use WithFileUploads;

    public $services = [];
    public $categories = [];

    public $service_id = '';
    public $service_category_id = '';
    public $caption = '';
    public $image;

    public function mount()
    {
        $this->services = Service::all();
    }

    public function save()
    {
        $this->validate([
            'service_id' => 'required|exists:services,id',
            'service_category_id' => 'required|exists:service_categories,id',
            'caption' => 'nullable|string|max:255',
            'image' => 'required|image|max:6144',
        ]);

        $path = $this->image->store('service-photos', 'public');

        ServicePhoto::create([
            'service_category_id' => $this->service_category_id,
            'caption' => $this->caption,
            'path' => $path,
        ]);

        session()->flash('success', 'Foto guardada correctamente.');

        // Reset
        $this->reset(['service_id', 'service_category_id', 'caption', 'image']);
        $this->categories = [];
    }

    public function render()
    {
        return view('livewire.admin.portfolio.service-photo-create-component')
            ->extends('back.layouts.base')
            ->section('content');
    }
}
