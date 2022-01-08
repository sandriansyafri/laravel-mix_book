<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;



Route::get('books', [BookController::class, 'index']);
Route::get('books/{book:id}', [BookController::class, 'edit']);
Route::post('books/upload/{id}', [BookController::class, 'upload']);
Route::post('books/create', [BookController::class, 'store']);
Route::put('books/{id}', [BookController::class, 'update']);
Route::delete('books/{book:id}', [BookController::class, 'destroy']);
