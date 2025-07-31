<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\Articles\AboutController;
use App\Http\Controllers\Front\Articles\ContactController;
use App\Http\Controllers\Front\Articles\ServiceController;
use App\Http\Controllers\Front\Articles\ProjectController;

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/quienes-somos', [AboutController::class, 'about'])->name('about');
Route::get('/servicios', [ServiceController::class, 'services'])->name('services');
Route::get('/proyectos', [ProjectController::class, 'projects'])->name('projects');
Route::get('/proyectos/{slug}', [ProjectController::class, 'projectsByCategory'])->name('projects.by.category');
Route::get('/contacto', [ContactController::class, 'contact'])->name('contact');
Route::post('/contacto', [ContactController::class, 'submit'])->name('contact.submit');

require __DIR__.'/admin.php';
require __DIR__.'/system.php';
require __DIR__.'/api.php';
