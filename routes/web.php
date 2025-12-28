<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home');
Route::view('/contact', 'contact');

Route::resource('jobs', JobController::class); //'jobs' is the resource name and the URI

// Auth
Route::get('/register', [RegisteredUserController::class, 'create']);









