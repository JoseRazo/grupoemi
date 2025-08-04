<?php

namespace App\Livewire\Admin\System\Settings;

use Livewire\Component;
use App\Models\Setting;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class SettingsComponent extends Component
{
    use WithFileUploads;

    public $company_name, $about_us, $mission, $vision;
    public $phone, $whatsapp, $email, $address, $google_maps_link;
    public $facebook, $instagram, $twitter, $linkedin, $youtube, $tiktok;
    public $logo_url;
    public $logo_file;

    public $setting_id;

    public function mount()
    {
        $setting = Setting::first();
        if ($setting) {
            $this->setting_id = $setting->id;
            $this->fill($setting->toArray());
        }
    }

    public function render()
    {
        return view('livewire.admin.system.settings.settings-component')
            ->extends('back.layouts.base')
            ->section('content');
    }

    public function store()
    {
        $this->validate([
            'company_name' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:255',
            'whatsapp' => 'nullable|string|max:255',
            'address' => 'nullable|string',
            'google_maps_link' => 'nullable|url',
            'logo_file' => 'nullable|image|max:2048',
        ]);

        // Si se cargó un nuevo logo
        if ($this->logo_file) {
            // Eliminar el logo anterior si existe
            if ($this->logo_url && \Storage::disk('public')->exists($this->logo_url)) {
                \Storage::disk('public')->delete($this->logo_url);
            }

            // Subir el nuevo logo y guardar la ruta
            $this->logo_url = $this->logo_file->store('logos', 'public');
        }

        Setting::updateOrCreate(
            ['id' => $this->setting_id],
            $this->only([
                'company_name',
                'about_us',
                'mission',
                'vision',
                'phone',
                'whatsapp',
                'email',
                'address',
                'google_maps_link',
                'facebook',
                'instagram',
                'twitter',
                'linkedin',
                'youtube',
                'tiktok',
                'logo_url'
            ])
        );

        session()->flash('message', 'Configuración actualizada correctamente.');

        // Disparar scroll al mensaje
        $this->dispatch('scroll-to-message');
    }
}
