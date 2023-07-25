<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthUsers;
 use Illuminate\Auth\Middleware\Authenticate;
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

Route::post('/auth/register',[AuthController::class,'createuser']);
Route::post('/auth/login',[AuthController::class,'loginUser']);
Route::get('/users',[AuthUsers::class,'userauth'])->middleware('auth:sanctum');
