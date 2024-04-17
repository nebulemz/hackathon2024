<?php

use App\Http\Controllers\JunkshopController;
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
    Route::get('/', [JunkshopController::class, 'index'])->name('admin.pages.junkshop.index');
    Route::get('/create', [JunkshopController::class, 'create'])->name('admin.pages.junkshop.create');
    Route::post('/', [JunkshopController::class, 'store'])->name('admin.pages.junkshop.store');
    Route::get('/{junkshop}/edit', [JunkshopController::class, 'edit'])->name('admin.pages.junkshop.edit');
    Route::put('/{junkshop}/update', [JunkshopController::class, 'update'])->name('admin.pages.junkshop.update');
    Route::delete('/{junkshop}/destroy', [JunkshopController::class, 'destroy'])->name('admin.pages.junkshop.destroy');
});



//Users

Route::get('/user/dashboard', function(){
    return view('user.pages.index');
})->name('user.pages.index');
