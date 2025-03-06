<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\residentController;
//Normal view controllers
Route::get('/', function () {
    if (Auth::check()) {
        return redirect('/dashboard');
    }
    return view('login');
});

Route::get('/residents', function (){
    if (!Auth::check()) {
        return redirect('/');
    }
    return view('residents');
});
Route::get('/addresidents', function (){
    if (!Auth::check()) {
        return redirect('/');
    }
    return view('addresidents');
});

Route::get('/dashboard', function (){
    return view('dashboard');
});


//userControllers
Route::post('/register', [userController::class, 'register']);
Route::post('/login', [userController::class, 'login']);
Route::post('logout', [userController::class, 'logout']);

//residentControllers
Route::get('/residents', [residentController::class, 'index']);
Route::post('/addresidentsfunc', [residentController::class, 'addResidents']);