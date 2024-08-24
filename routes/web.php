<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\FriendRequestController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/register',[AuthenticationController::class, 'registerView']);
Route::post('/register-success', [AuthenticationController::class, 'register'])->name('registered');

Route::get('/login', [AuthenticationController::class, 'loginView'])->name('login');
Route::post('/login-success', [AuthenticationController::class, 'login'])->name('logined');
Route::post('/logout', [AuthenticationController::class, 'logout']);

Route::get('/pay', [AuthenticationController::class, 'pay'])->name('pay');
Route::get('/overpayment', [AuthenticationController::class, 'handleOverpayment'])->name('handle.overpayment');
Route::post('/overpayment', [AuthenticationController::class, 'processOverpayment'])->name('process.overpayment');
Route::post('/updatePaid', [AuthenticationController::class, 'update_paid'])->name('updatePaid');


Route::middleware(['auth', 'paid', 'lang'])->group(function () {
    Route::get('/', [AuthenticationController::class, 'home']);

    Route::resource('user', UserController::class);
    Route::resource('friend-request', FriendRequestController::class);
    Route::resource('friend', FriendController::class);
    Route::resource('message', MessageController::class);
    Route::delete('/notifications/{id}', [NotificationController::class, 'destroy'])->name('notifications.destroy');
});

Route::get('/language/{lang}', [AuthenticationController::class, 'language'])->name('language');
