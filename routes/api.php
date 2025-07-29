<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ServiceCategoryController;

Route::get('/api/services/{service}/categories', [ServiceCategoryController::class, 'byService']);
