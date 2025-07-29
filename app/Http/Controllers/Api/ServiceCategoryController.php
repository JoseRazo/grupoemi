<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceCategoryController extends Controller
{
    public function byService(Service $service)
    {
        return response()->json($service->categories()->select('id', 'name')->get());
    }
}
