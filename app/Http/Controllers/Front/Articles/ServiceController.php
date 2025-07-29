<?php

namespace App\Http\Controllers\Front\Articles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    /**
     * Display the services page.
     *
     * @return \Illuminate\View\View
     */
    public function services()
    {
        $services = Service::with('categories')->get();
        return view('front.web.articles.services.services', compact('services'));
    }
}
