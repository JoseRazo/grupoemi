<?php

namespace App\Http\Controllers\Front\Articles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServicePhoto;
use App\Models\ServiceCategory;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display the projects page.
     *
     * @return \Illuminate\View\View
     */
    public function projects(Request $request)
    {
        return view('front.web.articles.projects.projects');
    }

    /**
     * Display projects by category.
     *
     * @param string $slug
     * @return \Illuminate\View\View
     */
    public function projectsByCategory($slug)
    {
        $category = ServiceCategory::whereHas('photos')->get()
            ->first(fn($cat) => Str::slug($cat->name) === $slug);

        abort_unless($category, 404);

        return view('front.web.articles.projects.projects-by-category', compact('category', 'slug'));
    }
}
