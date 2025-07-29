<?php

namespace App\Livewire\Admin\Portfolio;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\ServicePhoto;
use Illuminate\Support\Facades\Storage;

class ServicePhotoUpdateComponent extends Component
{
    use WithFileUploads;

    public $photoId;
    public $services = [];
    public $categories = [];

    public $service_id = '';
    public $service_category_id = '';
    public $caption = '';
    public $image;
    public $currentImage;

    public function mount($id)
    {
        $photo = ServicePhoto::findOrFail($id);
        $this->photoId = $photo->id;
        $this->service_category_id = $photo->service_category_id;
        $this->caption = $photo->caption;
        $this->currentImage = $photo->path;

        $category = ServiceCategory::find($photo->service_category_id);
        $this->service_id = $category->service_id ?? null;

        $this->services = Service::all();
        $this->categories = ServiceCategory::where('service_id', $this->service_id)->get();
    }

    public function updatedServiceId($value)
    {
        $this->service_category_id = '';
        $this->categories = ServiceCategory::where('service_id', $value)->get();
    }

    public function update()
    {
        $this->validate([
            'service_id' => 'required|exists:services,id',
            'service_category_id' => 'required|exists:service_categories,id',
            'caption' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:6144',
        ]);

        $photo = ServicePhoto::findOrFail($this->photoId);

        if ($this->image) {
            // Borrar imagen anterior
            if ($photo->path && Storage::disk('public')->exists($photo->path)) {
                Storage::disk('public')->delete($photo->path);
            }
            $photo->path = $this->image->store('service-photos', 'public');
        }

        $photo->service_category_id = $this->service_category_id;
        $photo->caption = $this->caption;
        $photo->save();

        session()->flash('success', 'Foto actualizada correctamente.');

        return redirect()->route('admin.portfolio.service-photos.index');
    }

    public function render()
    {
        return view('livewire.admin.portfolio.service-photo-update-component')
            ->extends('back.layouts.base')
            ->section('content');
    }
}
