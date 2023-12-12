<?php

use App\Http\Controllers\AdvertenciaController;
use App\Http\Controllers\AdvertenciaTipoController;
use App\Http\Controllers\AtletaController;
use App\Http\Controllers\AtletaResponsavelController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ChamadaController;
use App\Http\Controllers\ChamadaTipoController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\PresencasController;
use App\Http\Controllers\ResponsavelController;
use App\Http\Controllers\UserController;
use App\Models\Chamada;
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
Route::put('/perfil/{id}', [PerfilController::class, 'edit']);
Route::delete('/perfil/{id}', [PerfilController::class, 'delete']);

Route::get('/user/{id}', [UserController::class, 'get']);
Route::get('/me', [UserController::class, 'me']);
Route::get('/user', [UserController::class, 'list']);
Route::delete('/user/{id}', [UserController::class, 'delete']);
Route::put('/user/{id}', [UserController::class, 'edit']);
Route::post('/user', [UserController::class, 'create']);

Route::get('/atleta/{id}', [AtletaController::class, 'get']);
Route::get('/atleta', [AtletaController::class, 'list']);
Route::get('/atletaSub/{id}', [AtletaController::class, 'sub']);
Route::get('/chamadaSub/{id}', [AtletaController::class, 'chamadaSub']);
Route::delete('/atleta/{id}', [AtletaController::class, 'delete']);
Route::put('/atleta/{id}', [AtletaController::class, 'edit']);
Route::post('/atleta', [AtletaController::class, 'create']);
Route::get('/atletaResponsaveis/{id}', [AtletaController::class, 'responsaveis']);

Route::get('/categoria/{id}', [CategoriaController::class, 'get']);
Route::get('/categoria', [CategoriaController::class, 'list']);
Route::delete('/categoria/{id}', [CategoriaController::class, 'delete']);
Route::put('/categoria/{id}', [CategoriaController::class, 'edit']);
Route::post('/categoria', [CategoriaController::class, 'create']);

Route::get('/chamadaTipo/{id}', [ChamadaTipoController::class, 'get']);
Route::get('/chamadaTipo', [ChamadaTipoController::class, 'list']);
Route::delete('/chamadaTipo/{id}', [ChamadaTipoController::class, 'delete']);
Route::put('/chamadaTipo/{id}', [ChamadaTipoController::class, 'edit']);
Route::post('/chamadaTipo', [ChamadaTipoController::class, 'create']);

Route::get('/advertenciaTipo/{id}', [AdvertenciaTipoController::class, 'get']);
Route::get('/advertenciaTipo', [AdvertenciaTipoController::class, 'list']);
Route::delete('/advertenciaTipo/{id}', [AdvertenciaTipoController::class, 'delete']);
Route::put('/advertenciaTipo/{id}', [AdvertenciaTipoController::class, 'edit']);
Route::post('/advertenciaTipo', [AdvertenciaTipoController::class, 'create']);

Route::get('/responsavel/{id}', [ResponsavelController::class, 'get']);
Route::get('/responsavel', [ResponsavelController::class, 'list']);
Route::delete('/responsavel/{id}', [ResponsavelController::class, 'delete']);
Route::put('/responsavel/{id}', [ResponsavelController::class, 'edit']);
Route::post('/responsavel', [ResponsavelController::class, 'create']);
Route::get('/responsavelAtletas/{id}', [ResponsavelController::class, 'atletas']);

Route::get('/atletaResponsavel/{id}', [AtletaResponsavelController::class, 'get']);
Route::get('/atletaResponsavel_responsavelList/{id}', [AtletaResponsavelController::class, 'listResponsavel']);
Route::delete('/atletaResponsavel/{id}', [AtletaResponsavelController::class, 'delete']);
Route::post('/atletaResponsavel', [AtletaResponsavelController::class, 'associarResponsavel']);

Route::get('/chamada/{id}', [ChamadaController::class, 'get']);
Route::get('/presenca/{id}', [ChamadaController::class, 'presenca']);
Route::get('/chamada', [ChamadaController::class, 'list']);
Route::delete('/chamada/{id}', [ChamadaController::class, 'delete']);
Route::put('/chamada/{id}', [ChamadaController::class, 'edit']);
Route::post('/chamada', [ChamadaController::class, 'create']);

Route::post('/presencasAtletas', [PresencasController::class, 'registrarPresencas']);
Route::get('/presencasAtletasView/{id}', [PresencasController::class, 'visualizarPresencas']);
Route::get('/presencasIndividual/{id}', [PresencasController::class, 'presencaAtleta']);

Route::get('/advertencia/{id}', [AdvertenciaController::class, 'get']);
Route::get('/advertencia', [AdvertenciaController::class, 'list']);
Route::delete('/advertencia/{id}', [AdvertenciaController::class, 'delete']);
Route::put('/advertencia/{id}', [AdvertenciaController::class, 'edit']);
Route::post('/advertencia', [AdvertenciaController::class, 'create']);
