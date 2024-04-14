<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\DataController;
use Illuminate\Support\Facades\Route;

Route::get("/register", [UserController::class,"registerPage"])->name("register.page")->middleware('web');
Route::post("/register", [UserController::class,"register"])->name("register");
Route::get("/login", [UserController::class,"loginPage"])->name("login");
Route::post("/login", [UserController::class,"login"])->name("login.post");
Route::get("/logout", [UserController::class,"logout"])->name("logout");

// protected routes
Route::group(["middleware" => ["auth"]], function () {
    Route::get("/data", [DataController::class, 'index'])->name('data.page');
});

Route::get('/', function () {
    return view('home');
});
