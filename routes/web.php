<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Client\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('chi-tiet/{slug}', [HomeController::class, 'detail'])->name('detail');

Route::get('danh-muc/{slug}', [HomeController::class, 'category'])->name('category');

Route::post('search', [HomeController::class, 'search'])->name('search');


// AUTH
Route::prefix('auth/')
    ->as('auth.')
    ->controller(AuthController::class)
    ->group(function () {
        Route::get('register',      'showRegister')->name('register.show');
        Route::post('register',     'register')->name('register.store');
        Route::get('login',      'showLogin')->name('login.show');
        Route::post('login',        'login')->name('login');
        Route::post('logout',       'logout')->name('logout');
        Route::get('forgot',      'showForgot')->name('forgot.show');
        Route::post('forgot',      'forgot')->name('forgot');
        Route::get('password-reset/{token}',      'passwordReset')->name('passwordReset.show');
        Route::post('update-password',      'updatePassword')->name('password.update');
    });
