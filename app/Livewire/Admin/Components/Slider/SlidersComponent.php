<?php

namespace App\Livewire\Admin\Components\Slider;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Slider;
use App\Models\SliderCategory;

class SlidersComponent extends Component
{
    use WithPagination, WithFileUploads;

    public $slider_id, $slider_category_id, $title, $subtitle, $image,  $image_url, $button1_text, $button1_href,
        $button2_text, $button2_href, $order = 0, $is_active = true, $isOpen = false, $search = '';
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['deleteSlider' => 'delete'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $sliders = Slider::with('category')
            ->where('title', 'like', "%{$this->search}%")
            ->orderBy('order')
            ->paginate(10);

        $categories = SliderCategory::orderBy('name')->get();

        return view('livewire.admin.components.slider.sliders-component', compact('sliders', 'categories'))
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
        $slider = Slider::findOrFail($id);
        $this->image_url = $slider->image;
        $this->fill($slider->toArray());
        $this->image = null;
        $this->isOpen = true;
    }

    public function store()
    {
        $this->validate([
            'slider_category_id' => 'required|exists:slider_categories,id',
            'title' => 'required|string|min:3',
            'image' => 'nullable|image|max:6144',
        ]);

        $imagePath = null;

        if ($this->image) {
            if ($this->slider_id) {
                $existing = Slider::find($this->slider_id);
                if ($existing && $existing->image && \Storage::disk('public')->exists($existing->image)) {
                    \Storage::disk('public')->delete($existing->image);
                }
            }

            $imagePath = $this->image->store('slider-images', 'public');
        }

        Slider::updateOrCreate(
            ['id' => $this->slider_id],
            [
                'slider_category_id' => $this->slider_category_id,
                'title' => $this->title,
                'subtitle' => $this->subtitle,
                'image' => $imagePath ?? ($this->slider_id ? Slider::find($this->slider_id)->image : null),
                'button1_text' => $this->button1_text,
                'button1_href' => $this->button1_href,
                'button2_text' => $this->button2_text,
                'button2_href' => $this->button2_href,
                'order' => $this->order,
                'is_active' => $this->is_active,
            ]
        );

        session()->flash('message', $this->slider_id ? 'Slider actualizado.' : 'Slider creado.');
        $this->closeModal();
    }

    public function delete($id)
    {
        Slider::findOrFail($id)->delete();
        session()->flash('message', 'Slider eliminado.');
    }

    public function confirmDelete($id)
    {
        $this->dispatch('confirmDeleteSlider', $id);
    }

    public function closeModal()
    {
        $this->isOpen = false;
        $this->resetForm();
    }

    private function resetForm()
    {
        $this->reset([
            'slider_id',
            'slider_category_id',
            'title',
            'subtitle',
            'image',
            'image_url',
            'button1_text',
            'button1_href',
            'button2_text',
            'button2_href',
            'order',
            'is_active'
        ]);
    }
}
