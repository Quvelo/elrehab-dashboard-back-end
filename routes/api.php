<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CompanyAchievementController;
use App\Http\Controllers\CompanyGoalController;
use App\Models\CompanyAchievement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::apiResource('/client', ClientController::class)->except('update');
Route::post('/client/{id}', [ClientController::class, 'update']);

Route::apiResource('/category', CategoryController::class)->except('update');
Route::post('/category/{id}', [CategoryController::class, 'update']);

Route::apiResource('/achievement', CompanyAchievementController::class)->except('update');
Route::post('/achievement/{id}', [CompanyAchievementController::class, 'update']);

Route::apiResource('/goal', CompanyGoalController::class)->except('update');
Route::post('/goal/{id}', [CompanyGoalController::class, 'update']);
