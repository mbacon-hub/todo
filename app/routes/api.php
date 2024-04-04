<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;


Route::group(["prefix" => "todo"], function () {
    Route::post("/", [TodoController::class, "create"]);
    Route::get("/", [TodoController::class, "read"]);
    Route::patch("/{id}", [TodoController::class, "update"]);
    Route::delete("/{id}", [TodoController::class, "delete"]);
});

Route::group(["prefix" => "auth"], function () {
    Route::post("/login", [\App\Http\Controllers\AuthController::class, "login"]);
});

