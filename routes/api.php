<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/ping', function(){
    return [
        'pong' => true
    ];
});

/*Route::get('/unauthenticated', function(){
    return ['error' => 'usuário não logado'];
})->name('login');

Route::middleware('auth:sanctum')->get('/auth/logout', [AuthController::class, 'logout']);
Route::post('/auth', [AuthController::class, 'login']);
*/

Route::post('/user', [AuthController::class, 'create']);
Route::post('/auth/login', [AuthController::class, 'login']);
Route::middleware('auth:api')->post('/auth/logout', [AuthController::class, 'logout']);

//Route::middleware('auth:sanctum')->post('/todo', [ApiController::class, 'createtodo']);

Route::get('/unauthenticated', function(){
    return ['error' => 'usuário não logado'];
})->name('login');

Route::middleware('auth:api')->post('/todo', [ApiController::class, 'createtodo']);
Route::get('/todos', [ApiController::class, 'readalltodos']);
Route::get('todo/{id}', [ApiController::class, 'readtodo']);
Route::middleware('auth:sanctum')->put('todo/{id}', [ApiController::class, 'updatetodo']);
Route::middleware('auth:sanctum')->delete('/todo/{ìd}', [ApiController::class, 'deletetodo']);

