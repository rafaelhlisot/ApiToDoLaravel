<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

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

Route::post('/todo', [ApiController::class, 'createtodo']);
Route::get('/todos', [ApiController::class, 'readalltodos']);
Route::get('todo/{id}', [ApiController::class, 'readtodo']);
Route::put('todo/{id}', [ApiController::class, 'updatetodo']);
Route::delete('/todo/{ìd}', [ApiController::class, 'deletetodo']);

