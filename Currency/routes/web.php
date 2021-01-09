<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AccountController;

Route::get('/', [PageController::class, 'index'])->name('index');

/*  Route managment for menu options  */

//Managment of menu first-level
Route::get("/guest/menu-first-level", [PageController::class,  'firstLevel'])->name('firstLevel');
Route::post('/login',                 [LoginController::class, 'login'])->name('login');
Route::get('/logout',                 [LoginController::class, 'logout'])->name('logout');
Route::post('/register',              [PageController::class,  'register'])->name('register');

//Exchange money
Route::get('/exchange-money',         [PageController::class, 'exchangeMoney'])->name('exchangeMoney');

//Managment of menu first-level for auth user
Route::get("/auth",                   [AccountController::class, 'index'])->name('indexOfAuth');
Route::get("/auth/menu-first-level",  [AccountController::class, 'firstLevel'])->name('firstLevelOfAuth');