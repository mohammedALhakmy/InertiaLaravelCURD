<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/',[PostController::class,'index'])->name('customer.index');
Route::get('/customer',[PostController::class,'create']);
Route::post('customer',[PostController::class,'store']);
Route::get('customer/{id}/edit',[PostController::class,'edit']);
Route::get('customer/{id}/destroy',[PostController::class,'destroy']);
Route::put('customer/{id}',[PostController::class,'update']);
