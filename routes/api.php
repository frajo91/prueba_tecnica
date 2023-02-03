<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('areas',App\Http\Controllers\Api\AreaController::class)->middleware('api');
Route::apiResource('carrera',App\Http\Controllers\Api\CarreraController::class)->middleware('api');
Route::apiResource('tipoDocumento',App\Http\Controllers\Api\TipoDocumentoController::class)->middleware('api');
Route::apiResource('docente',App\Http\Controllers\Api\DocenteController::class)->middleware('api');
Route::apiResource('estudiante',App\Http\Controllers\Api\EstudianteController::class)->middleware('api');