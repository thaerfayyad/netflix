<?php

use Illuminate\Support\Facades\Route;

    Route::prefix('admin')->name('admin.')
        ->middleware('auth','role:super_admin|admin')
        ->group(function (){
        //WElcome Routes
       Route::resource('/welcome',\App\Http\Controllers\Admin\WelcomeController::class )->except(['show']);
       // Categories Routes
       Route::resource('categories',\App\Http\Controllers\Admin\CategoryController::class)->except(['show']);
       //Role Routes
       Route::resource('roles',\App\Http\Controllers\Admin\RoleController::class);

    });
