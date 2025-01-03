<?php

use App\Http\Controllers\Front\IndexController;
use Illuminate\Support\Facades\Route;

Route::get("/", [IndexController::class, "index"])->name("front.index");