<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});


Route::get('/projects', function () {
    $projects = ['Budgeting app', 'Photo gallery', 'Blog'];
    return view('projects', ['projects' => $projects]);
});









