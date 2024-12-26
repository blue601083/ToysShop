<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Front\IndexController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get("/front/index", [IndexController::class, "index"])->name('front.index');

Route::get("/admin/home", [AdminController::class, "home"])->name('admin.home');
Route::get("/admin/login", [AdminController::class, "login"])->name('admin.login');
Route::post("admin/login", [AdminController::class, 'postLogin'])->name('admin.postLogin');
Route::get("/admin/forget", [AdminController::class, "forget"])->name('admin.forget');
Route::post("admin/forget", [AdminController::class, "postForget"])->name('admin.postForget');
Route::post('/logout', function () {Auth::logout(); return redirect('/admin/login');})->name('logout');
