<?php

use App\Http\Controllers\AtletaController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/perfil/{id}', [PerfilController::class, 'get']);
Route::get('/perfil', [PerfilController::class, 'list']);
Route::post('/perfil', [PerfilController::class, 'create']);

Route::get('/user/{id}', [UserController::class, 'get']);
Route::get('/me', [UserController::class, 'me']);
Route::get('/user', [UserController::class, 'list']);
Route::delete('/user/{id}', [UserController::class, 'delete']);
Route::put('/user/{id}', [UserController::class, 'edit']);

Route::get('/atleta/{id}', [AtletaController::class, 'get']);
Route::get('/atleta', [AtletaController::class, 'list']);
Route::delete('/atleta/{id}', [AtletaController::class, 'delete']);
Route::put('/atleta/{id}', [AtletaController::class, 'edit']);
Route::post('/atleta', [AtletaController::class, 'create']);

Route::get('/categoria/{id}', [CategoriaController::class, 'get']);
Route::get('/categoria', [CategoriaController::class, 'list']);
Route::delete('/categoria/{id}', [CategoriaController::class, 'delete']);
Route::put('/categoria/{id}', [CategoriaController::class, 'edit']);
Route::post('/categoria', [CategoriaController::class, 'create']);
