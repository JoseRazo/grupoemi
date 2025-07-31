<?php

namespace App\Livewire\Front;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ServiceCategory;
use App\Models\ServicePhoto;
use Illuminate\Support\Str;

class ProjectsInfiniteScroll extends Component
{
    use WithPagination;

    public $slug;
    public $categoryId;
    public $perPage = 9;

    protected $queryString = ['page'];

    public function mount($slug)
    {
        $this->slug = $slug;

        $category = ServiceCategory::whereHas('photos')->get()
            ->first(fn($cat) => Str::slug($cat->name) === $this->slug);

        abort_unless($category, 404);

        $this->categoryId = $category->id;
    }

    public function loadMore()
    {
        $this->perPage += 9;
    }

    public function updatingSlug()
    {
        $this->resetPage();
    }

    public function render()
    {
        $projects = ServicePhoto::where('service_category_id', $this->categoryId)
            ->latest('id')
            ->paginate($this->perPage);

        return view('livewire.front.projects-infinite-scroll', [
            'projects' => $projects,
        ]);
    }
}
