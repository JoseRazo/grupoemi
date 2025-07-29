<?php

namespace App\Http\Controllers\Front\Articles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServicePhoto;
use App\Models\ServiceCategory;

class ProjectController extends Controller
{
    /**
     * Display the projects page.
     *
     * @return \Illuminate\View\View
     */
    public function projects(Request $request)
    {
        $selectedCategoryId = $request->get('category_id');

        // Obtener solo categorías con al menos una imagen
        $categories = ServiceCategory::whereHas('photos')->get();

        // Obtener imágenes con su categoría (para el grid de fotos)
        $projects = ServicePhoto::with('category')
            ->when($selectedCategoryId, function ($query) use ($selectedCategoryId) {
                $query->where('service_category_id', $selectedCategoryId);
            })
            ->get();

        return view('front.web.articles.projects.projects', compact('projects', 'categories', 'selectedCategoryId'));
    }
}
