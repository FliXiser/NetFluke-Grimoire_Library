<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\CartController;

Route::get('/ping', function () {
    return response()->json(['message' => 'API is working']);
});

// Auth
Route::post('/login', [AuthController::class, 'login']);

// Books
Route::get('/books', [BookController::class, 'index']);
Route::get('/books/{id}', [BookController::class, 'show']);

// Borrows
Route::get('/borrows', [BorrowController::class, 'index']);
Route::get('/borrows/{id}', [BorrowController::class, 'show']);

// Cart
Route::get('/cart/{userId}', [CartController::class, 'show']);
Route::post('/cart/add', [CartController::class, 'add']);
