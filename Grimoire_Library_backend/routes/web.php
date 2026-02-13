<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\CartController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/api/ping', function () {
    return response()->json(['message' => 'API is working']);
});

// Auth
Route::post('/api/login', [AuthController::class, 'login']);

// Books
Route::get('/api/books', [BookController::class, 'index']);
Route::get('/api/books/{id}', [BookController::class, 'show']);

// Borrows
Route::get('/api/borrows', [BorrowController::class, 'index']);
Route::get('/api/borrows/{id}', [BorrowController::class, 'show']);

// Cart
Route::get('/api/cart/{userId}', [CartController::class, 'show']);
Route::post('/api/cart/add', [CartController::class, 'add']);
