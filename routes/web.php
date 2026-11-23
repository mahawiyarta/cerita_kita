<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'intro')->name('intro');

Route::view('/login', 'login')->name('login');