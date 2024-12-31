<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ManagerController;
use App\Http\Controllers\Front\IndexController;
use Illuminate\Support\Facades\Route;

Route::get("/front/index", [IndexController::class, "index"])->name('front.index');

// 後台管理系統- 登入 HomeController
Route::group(["prefix" => "admin"], function(){
    Route::get('home', [HomeController::class, 'home'])->name('admin.home'); // 後台首頁
    Route::get('login', [HomeController::class, 'login'])->name('admin.login'); // 登入頁
    Route::post('postLogin', [HomeController::class, 'postLogin'])->name('admin.postLogin'); // 處理登入
    Route::get('forget', [HomeController::class, 'forget'])->name('admin.forget'); // 忘記密碼頁
    Route::post('postForget', [HomeController::class, 'postForget'])->name('admin.postForget'); // 處理忘記密碼
    Route::post('logout', [HomeController::class, 'logout'])->name('admin.logout'); // 登出
});

// 後台管理系統-管理者 ManagerController
Route::group(["prefix" => "admin/manager"], function(){
    Route::get("list", [ManagerController::class,"list"]);
    Route::get("add", [ManagerController::class,"add"]);
    Route::post("insert", [ManagerController::class,"insert"]);
    Route::get("edit/{Id}", [ManagerController::class,"edit"]);
    Route::post("update", [ManagerController::class,"update"]);
    Route::post("delete", [ManagerController::class,"delete"]);
});
