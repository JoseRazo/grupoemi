<?php

namespace App\Livewire\Front;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ServicePhoto;
use App\Models\ServiceCategory;

class ProjectsInfiniteScroll extends Component
{
    use WithPagination;

    public $selectedCategoryId = null;
    public $perPage = 12;

    protected $queryString = ['selectedCategoryId' => ['except' => '']];

    public function loadMore()
    {
        $this->perPage += 12;
    }

    public function updatedSelectedCategoryId()
    {
        $this->resetPage();
        $this->perPage = 9;
    }

    public function render()
    {
        $categories = ServiceCategory::whereHas('photos')->get();

        $projects = ServicePhoto::with('category')
            ->when($this->selectedCategoryId, function ($query) {
                $query->where('service_category_id', $this->selectedCategoryId);
            })
            ->paginate($this->perPage);

        return view('livewire.front.projects-infinite-scroll', compact('projects', 'categories'));
    }
}
