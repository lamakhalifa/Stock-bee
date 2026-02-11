<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/policies', function () {
    return view('policies');
})->name('policies');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::get('/users', [App\Http\Controllers\AdminController::class, 'index'])->name('users.index');
    Route::get('/users/export', [App\Http\Controllers\AdminController::class, 'exportExcel'])->name('users.export');
});
