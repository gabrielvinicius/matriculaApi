<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\AlunoController;
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



// Rotas CRUD Curso
//Route::apiResource('cursos', CursoController::class);

Route::get('curso', [CursoController::class, 'index']);
Route::get('curso/{id}', [CursoController::class, 'show']);
Route::post('curso', [CursoController::class, 'store']);
Route::put('curso/{id}', [CursoController::class, 'update']);
Route::delete('curso/{id}', [CursoController::class,'destroy']);

// Rotas CRUD Aluno
//Route::apiResource('alunos', AlunoController::class);

Route::get('aluno', [AlunoController::class, 'index']);
Route::get('aluno/{id}', [AlunoController::class, 'show']);
Route::post('aluno', [AlunoController::class, 'store']);
Route::put('aluno/{id}', [AlunoController::class, 'update']);
Route::delete('aluno/{id}', [AlunoController::class,'destroy']);

