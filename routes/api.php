<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

// CRUD operations for Category
Route::post('/categories/store', [CategoryController::class, 'store']);
Route::post('/categories/index', [CategoryController::class, 'index']);
Route::post('/categories/show', [CategoryController::class, 'show']);
Route::post('/categories/update', [CategoryController::class, 'update']);
Route::post('/categories/destroy', [CategoryController::class, 'destroy']);