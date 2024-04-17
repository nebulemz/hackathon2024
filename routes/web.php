<?php

use App\Http\Controllers\JunkshopController;
use App\Http\Controllers\JunkshopRateController;
use Illuminate\Support\Facades\Route;


Route::get('/auth/login', function(){
    return view('auth.pages.login');
})->name('login');
Route::get('/auth/register', function(){
    return view('auth.pages.register');
})->name('register');
Route::get('/auth/forgot-password', function(){
    return view('auth.pages.forgot');
});

Route::get('/auth/register-junkshop', function(){
    return view('auth.pages.register-junkshop');
});



//Junkshop Routes
Route::prefix('junkshop')->group(function () {
    Route::get('/', [JunkshopController::class, 'index'])->name('junkshop.pages.index');
    Route::get('/rates/create', [JunkshopRateController::class, 'create'])->name('junkshop.pages.rates.create');
    Route::post('/', [JunkshopController::class, 'store'])->name('junkshop.pages.store');
    Route::get('/{junkshop}/edit', [JunkshopController::class, 'edit'])->name('junkshop.pages.edit');
    Route::put('/{junkshop}/update', [JunkshopController::class, 'update'])->name('junkshop.pages.update');
    Route::delete('/{junkshop}/destroy', [JunkshopController::class, 'destroy'])->name('junkshop.pages.destroy');
});



//Users

Route::get('/user/dashboard', function(){
    return view('user.pages.index');
})->name('user.pages.index');
