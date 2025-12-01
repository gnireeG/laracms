<?php

use Illuminate\Support\Facades\Route;
use Laracms\Core\Models\Page;

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
    Route::get('/admin', \Laracms\Core\Livewire\Dashboard::class)->name('admin');
    Route::get('/admin/pages', \Laracms\Core\Livewire\Pages::class)->name('admin.pages');
});


Route::get('/{url}', \Laracms\Core\Livewire\ShowPage::class /* function ($url) {
    $page = Page::where('url', '/' . $url)
        ->where('is_published', true)
        ->firstOrFail();
    
    return view('laracms::pages.show', ['page' => $page]);
} */)->where('url', '.*');