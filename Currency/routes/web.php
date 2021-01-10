<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AccountController;

Route::get('/', [PageController::class, 'index'])->name('index');
Route::get('/updateCurrent', [PageController::class, 'updateCurrencies']);

/*  Route managment for menu options  */

//Managment of menu first-level
Route::get("/guest/menu", [PageController::class, 'firstLevel'])->name('firstLevel');
Route::post('/login',     [LoginController::class, 'login'])->name('login');
Route::get('/logout',     [LoginController::class, 'logout'])->name('logout');
Route::post('/register',  [PageController::class,  'register'])->name('register');

//Redirects
Route::get('/redirect-exchange',      [PageController::class, 'redirectExchange'])->name('redirectExchange');

//Managment of menu first-level for auth user
Route::get("/auth",       [AccountController::class, 'index'])->name('indexOfAuth');
Route::get("/auth/menu",  [AccountController::class, 'firstLevel'])->name('firstLevelOfAuth');