<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ContactController;
use App\Models\Plan;

Route::get('/', function () {
    $plans = Plan::all();

    return view('welcome', compact('plans'));
})->name('welcome');

Route::get('/policies', function () {
    return view('policies');
})->name('policies');

Route::post('/contact', [ContactController::class, 'store'])
    ->name('contact.store');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::post('/pay', [PaymentController::class, 'initiatePayment'])->name('payment.initiate');
Route::get('/payment/callback', [PaymentController::class, 'callback'])
    ->name('payment.callback');
 Route::get('/payment/success', function () {
    return view('success-payment', [
        'payment' => session('payment')
    ]);
})->name('payment.success');

Route::get('/payment/failed', function () {
    return view('failed-payment', [
        'payment' => session('payment')
    ]);
})->name('payment.failed');
    Route::post('/webhook/paymob', [PaymentController::class, 'handleWebhook'])->name('webhook.paymob');
});


Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/users', [App\Http\Controllers\AdminController::class, 'index'])->name('users.index');
    Route::get('/users/export', [App\Http\Controllers\AdminController::class, 'exportExcel'])->name('users.export');
});
