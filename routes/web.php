<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\viewController;



Route::get('/',[viewController::class , 'home'])->name('home');