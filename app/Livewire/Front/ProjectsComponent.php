<?php

namespace App\Livewire\Front;

use Livewire\Component;
use App\Models\ServiceCategory;

class ProjectsComponent extends Component
{
    public function render()
    {
        $categories = ServiceCategory::whereHas('photos')
            ->with(['photos' => function ($query) {
                $query->orderBy('id');
            }])
            ->get();

        return view('livewire.front.projects-component', [
            'categories' => $categories,
        ]);
    }
}
