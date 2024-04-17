<?php

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




//Junshop Route
Route::get('/junkshop/dashboard', function(){
    return view('junkshop.pages.index');
})->name('junkshop.pages.index');
