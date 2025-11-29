<?php

use Illuminate\Support\Facades\Route;

// TEST: Wird diese Route geladen?
Route::get('/package-test', function () {
    return 'Package routes ARE loaded!';
});


// Auth Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', function () {
        return view('laracms::auth.login');
    })->name('login');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', function () {
        \Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/login');
    })->name('logout');
    
    // Admin placeholder
    Route::get('/admin', \LaraCms\Core\Livewire\Dashboard::class)->name('admin');
});