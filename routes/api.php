<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\StaffAuthController;
use App\Http\Controllers\StaffController;
use Illuminate\Support\Facades\Route;

// 1. Staff Only: Staff management + Creating, updating, and deleting Categories & Books
Route::middleware("auth:staff")->group(function () {
    Route::delete("/staff/{id}", [StaffController::class, "destroy"]);
    Route::get("/staff",         [StaffController::class, "index"]);
    Route::get("/staff/{id}",    [StaffController::class, "show"]);
    Route::put("/staff/{id}",    [StaffController::class, "update"]);
    Route::post("/staff",        [StaffController::class, "store"]);
    Route::get("/staff-me",      [StaffAuthController::class, "me"]);
    Route::post("/staff-logout", [StaffAuthController::class, "logout"]);

    Route::post("/category",              [CategoryController::class, "store"]);
    Route::put("/category/{category}",    [CategoryController::class, "update"]);
    Route::delete("/category/{category}", [CategoryController::class, "destroy"]);

    Route::post("/book",                  [BookController::class, "store"]);
    Route::put("/book/{book}",            [BookController::class, "update"]);
    Route::delete("/book/{book}",         [BookController::class, "destroy"]);
});

// 2. Customers Only: Customer profile and customer CRUD
Route::middleware("auth:customers")->group(function () {
    Route::get("/customer-me",      [CustomerAuthController::class, "me"]);
    Route::post("/customer-logout", [CustomerAuthController::class, "logout"]);
    Route::apiResource("customer", CustomerController::class)
        ->parameter("customer", "customer");
});

// 3. Any Authenticated User (Staff OR Customer): Reading Categories & Books
Route::middleware("auth:sanctum")->group(function () {
    Route::get("/category",            [CategoryController::class, "index"]);
    Route::get("/category/{category}", [CategoryController::class, "show"]);
    Route::get("/book",                [BookController::class, "index"]);
    Route::get("/book/{book}",         [BookController::class, "show"]);
});

// 4. Public Logins
Route::post("/staff/login",    [StaffAuthController::class, "login"]);
Route::post("/customer/login", [CustomerAuthController::class, "login"]);
