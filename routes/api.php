<?php

use App\Http\Controllers\Api\ApiProductosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ApiUsuariosController;



Route::prefix('/usuario')->group(function () {
    Route::get('/', [ApiUsuariosController::class, 'index']);
    Route::post('/', [ApiUsuariosController::class, 'store']);
    Route::get('/show', [ApiUsuariosController::class, 'show']);
    Route::patch('/{id}', [ApiUsuariosController::class, 'partialUpdate']);
    Route::delete('/{id}', [ApiUsuariosController::class, 'destroy']);
});


Route::prefix('/producto')->group(function () {
    Route::get('/', [ApiProductosController::class, 'index']);
    Route::post('/', [ApiProductosController::class, 'store']);
    Route::get('/show', [ApiProductosController::class, 'show']);
    Route::patch('/{id}', [ApiProductosController::class, 'partialUpdate']);
    Route::delete('/{id}', [ApiProductosController::class, 'destroy']);
});




////Route::prefix('/usuario')->middleware('auth:sanctum')->group(function () {
//Route::prefix('/usuario')->group(function () {
////    /*Paso 4*/Route::get('/usuario', [ApiUsuariosController::class, 'index']);
//    /*Paso 4*/Route::get('/show', [ApiUsuariosController::class, 'show']);
//    /*Paso 5*/Route::post('/', [ApiUsuariosController::class, 'store']);
//    /*Paso 6*/Route::put('/{user}', [ApiUsuariosController::class, 'update']);
//    /*Paso 6*/Route::patch('/{user}', [ApiUsuariosController::class, 'updatePartial']);
//    /*Paso 7*/Route::delete('/{user}', [ApiUsuariosController::class, 'destroy']);
//});
