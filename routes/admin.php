<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Back\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Back\Auth\PasswordResetLinkController;
use App\Http\Controllers\Back\Auth\NewPasswordController;
use App\Http\Controllers\Back\DashboardController;
use App\Livewire\Admin\Portfolio\CustomersComponent;
use App\Livewire\Admin\Portfolio\ServiceCategoryComponent;
use App\Livewire\Admin\Portfolio\ServicePhotoComponent;
use App\Livewire\Admin\Portfolio\ServicePhotoCreateComponent;
use App\Livewire\Admin\Portfolio\ServicePhotoUpdateComponent;
use App\Livewire\Admin\Portfolio\ServicesComponent;

Route::prefix('admin')->name('admin.')->group(function () {

    Route::middleware('guest:admin')->group(function () {
        Route::get('login', [AuthenticatedSessionController::class, 'create'])
            ->name('login');

        Route::post('login', [AuthenticatedSessionController::class, 'store'])
            ->name('login.store');

        Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
            ->name('password.request');

        Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
            ->name('password.email');

        Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
            ->name('password.reset');

        Route::post('reset-password', [NewPasswordController::class, 'store'])
            ->name('password.store');
    });

    Route::middleware('auth:admin')->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
            ->name('logout');

        // Portfolio Routes
        Route::prefix('portafolio')->middleware(['role:super-admin|admin'])->name('portfolio.')->group(function () {

            // Servicios
            Route::get('servicios', ServicesComponent::class)
                ->name('services.index')
                ->middleware(['permission:read-services']);

            // Servicios Categories
            Route::get('servicios-categorias', ServiceCategoryComponent::class)
                ->name('service-categories.index')
                ->middleware(['permission:read-service-categories']);

            // Servicios Fotos
            Route::prefix('fotos')->name('service-photos.')->group(function () {
                Route::get('/', ServicePhotoComponent::class)
                    ->name('index')
                    ->middleware(['permission:read-service-photos']);

                Route::get('subir-foto', ServicePhotoCreateComponent::class)
                    ->name('create')
                    ->middleware(['permission:create-service-photos']);

                Route::get('foto/{id}/actualizar', ServicePhotoUpdateComponent::class)
                    ->name('edit')
                    ->middleware(['permission:update-service-photos']);
            });

            // Clientes
            Route::get('clientes', CustomersComponent::class)
                ->name('customers.index')
                ->middleware(['permission:read-customers']);
        });
    });
});
