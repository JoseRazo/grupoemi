<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\System\Auth\Users\UsersComponent;
use App\Livewire\Admin\System\Auth\Roles\RolesComponent;
use App\Livewire\Admin\System\Auth\Permissions\PermissionsComponent;
use App\Livewire\Admin\System\Catalogs\Countries\CountriesComponent;
use App\Livewire\Admin\System\Catalogs\States\StatesComponent;
use App\Livewire\Admin\System\Catalogs\Cities\CitiesComponent;
use App\Livewire\Admin\System\Catalogs\Colonies\ColoniesComponent;
use App\Livewire\Admin\System\Catalogs\Services\ServicesComponent;
use App\Livewire\Admin\System\Catalogs\Devices\DevicesComponent;
use App\Livewire\Admin\System\Catalogs\AccessPoints\AccessPointsComponent;

Route::prefix('admin')->name('admin.')->group(function () {

    Route::middleware('auth:admin')->group(function () {

        // System Routes
        Route::prefix('sistema')->middleware(['role:super-admin|admin'])->name('system.')->group(function () {

            // Auth
            Route::prefix('autenticacion')->name('auth.')->group(function () {

                // Usuarios
                Route::get('usuarios', UsersComponent::class)
                    ->name('users.index')
                    ->middleware(['permission:read-users']);

                //Roles
                Route::get('roles', RolesComponent::class)
                    ->name('roles.index')
                    ->middleware(['permission:read-roles']);

                //Permisos
                Route::get('permisos', PermissionsComponent::class)
                    ->name('permissions.index')
                    ->middleware(['permission:read-permissions']);

            });
        });
    });
});