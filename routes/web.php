<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;

Route::view('/', 'landing_page');

Route::middleware('auth', 'verified')->group(function () {
    Route::view('index', 'company.index')
        ->name('dashboard');

    Route::view('add', 'company.add')
        ->name('add');

    Route:: get('edit/{id}',[CompanyController::class,'edit'])
        ->name('edit');
});

require __DIR__.'/auth.php';
