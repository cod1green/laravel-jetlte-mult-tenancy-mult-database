<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::domain('saas.test')->group(function() {
    Route::get('/', function () {
        return view('welcome');
    });
});

Route::middleware(['tenant'])->group(function() {
    Route::get('/', function () {
        return view('welcome');
    });
});
