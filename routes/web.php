<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'intro')->name('intro');

Route::view('/login', 'login')->name('login');

Route::view('/home', 'home')->name('home');

Route::view('/breathing-space', 'breathing-space')->name('breathing-space');

Route::view('/music', 'music')->name('music');