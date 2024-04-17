<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\JunkshopController;
use App\Http\Controllers\JunkshopRateController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\RegisterJunkshop;
use Illuminate\Support\Facades\Route;


Route::get('/', RedirectController::class);

Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [AuthController::class, 'loginView'])->name('login');
    Route::post('/login', [AuthController::class, 'loginProcess'])->name('login.process');
    Route::get('/register', [AuthController::class, 'registerView'])->name('register');
    Route::post('/register', [AuthController::class, 'registerProcess'])->name('register.process');
    // Route::get('/forgot-password', function () {
    //     return view('auth.pages.forgot');
    // });
});

Route::group(['middleware' => 'auth'], function () {
    Route::post('logout', function () {
        Auth::logout();
        return redirect()->route('login');
    });
    Route::get('/register-junkshop', [RegisterJunkshop::class, 'registerJunkshopView'])->name('register.junkshop');
    Route::post('/register-junkshop', [RegisterJunkshop::class, 'registerJunkshopProcess'])->name('register.junkshop.process');
});

//Junkshop Routes
Route::prefix('junkshop')->group(function () {
    Route::get('/', [JunkshopController::class, 'index'])->name('junkshop.pages.index');
    Route::get('/rates/create', [JunkshopRateController::class, 'create'])->name('junkshop.pages.rates.create');
});


//Users

Route::get('/user/dashboard', function () {
    return view('user.pages.index');
})->name('user.pages.index');
