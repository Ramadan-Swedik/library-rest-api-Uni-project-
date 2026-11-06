<?php

use App\Http\Controllers\StaffController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Public route: anyone can attempt to log in
Route::post("/login", [StaffController::class, "login"]);

// Protected routes: only accessible with a valid Sanctum token
Route::middleware("auth:sanctum")->group(function ()
{
    Route::post("/logout",       [StaffController::class, "logout"]);
    Route::get("/staff",         [StaffController::class, "index"]);
    Route::get("/staff/{id}",    [StaffController::class, "show"]);
    Route::post("/staff",        [StaffController::class, "store"]);
    Route::put("/staff/{id}",    [StaffController::class, "update"]);
    Route::delete("/staff/{id}", [StaffController::class, "destroy"]);
});

Route::apiResource("customer", "App\Http\Controllers\CustomerController") ->parameter("customer", "customer");
