<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CompanyGoalController;
use App\Models\CompanyAchievement;
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

Route::apiResource('/client', ClientController::class)->except('update');
Route::post('/client/{id}', [ClientController::class, 'update']);

Route::apiResource('/category', CategoryController::class)->except('update');
Route::post('/category/{id}', [CategoryController::class, 'update']);

Route::apiResource('/achievement', CompanyAchievement::class)->except('update');
Route::post('/achievement/{id}', [CompanyAchievement::class, 'update']);

Route::apiResource('/goal', CompanyGoalController::class)->except('update');
Route::post('/goal/{id}', [CompanyGoalController::class, 'update']);
