<?php

namespace App\Http\Controllers\Front\Articles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display the about page.
     *
     * @return \Illuminate\View\View
     */
    public function about()
    {
        return view('front.web.articles.about.about');
    }
}
