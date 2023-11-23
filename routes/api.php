<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CompanyAchievementController;
use App\Http\Controllers\CompanyGoalController;
use App\Http\Controllers\CompanyInfoController;
use App\Http\Controllers\CompanyServiceController;
use App\Http\Controllers\CompanyTeamController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\QAController;
use App\Http\Controllers\TestimonailController;
use App\Models\CompanyAchievement;
use App\Models\Testimonail;
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

Route::apiResource('/companyInfo', CompanyInfoController::class)->except('update');
Route::post('/companyInfo/{id}', [CompanyInfoController::class, 'update']);

Route::apiResource('/companyService', CompanyServiceController::class)->except('update');
Route::post('/companyService/{id}', [CompanyServiceController::class, 'update']);

Route::apiResource('/companyTeam', CompanyTeamController::class)->except('update');
Route::post('/companyTeam/{id}', [CompanyTeamController::class, 'update']);

Route::apiResource('/contact', ContactController::class)->except('update');
Route::post('/contact/{id}', [ContactController::class, 'update']);


Route::apiResource('/Qa', QAController::class)->except('update');
Route::post('/Qa/{id}', [QAController::class, 'update']);

Route::apiResource('/testimonail', TestimonailController::class)->except('update');
Route::post('/testimonail/{id}', [TestimonailController::class, 'update']);
