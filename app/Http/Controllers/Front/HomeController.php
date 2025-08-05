<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\ServicePhoto;
use App\Models\SliderCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(Request $request)
    {
        $services = Service::with('categories')->get();
        $selectedCategoryId = $request->get('category_id');

        // Obtener solo categorías con al menos una imagen
        $categories = ServiceCategory::whereHas('photos')
            ->with(['photos' => function ($query) {
                $query->orderBy('id'); // o por fecha si prefieres: ->orderBy('created_at')
            }])
            ->get();


        // Obtener imágenes con su categoría (para el grid de fotos)
        $projects = ServicePhoto::with('category')
            ->when($selectedCategoryId, function ($query) use ($selectedCategoryId) {
                $query->where('service_category_id', $selectedCategoryId);
            })
            ->get();

        $sliderCategory = SliderCategory::where('name', 'Slider Principal')->first();

        $sliders = $sliderCategory
            ? $sliderCategory->sliders()->where('is_active', true)->orderBy('order')->get()
            : collect();

        return view('front.web.index', compact('services', 'categories', 'selectedCategoryId', 'sliders'));
    }
}
