<?php

use App\Models\Testimonail;
use Illuminate\Http\Request;
use App\Models\CompanyAchievement;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QAController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CompanyGoalController;
use App\Http\Controllers\CompanyInfoController;
use App\Http\Controllers\CompanyTeamController;
use App\Http\Controllers\TestimonailController;
use App\Http\Controllers\CompanyServiceController;
use App\Http\Controllers\CompanyAchievementController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectOwnerController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\VisionController;

Route::apiResource('/client', ClientController::class)->except('update');
Route::post('/client/{id}', [ClientController::class, 'update']);

Route::apiResource('/category', CategoryController::class)->except('update');
Route::post('/category/{id}', [CategoryController::class, 'update']);

Route::apiResource('/achievement', CompanyAchievementController::class)->except('update');
Route::post('/achievement/{id}', [CompanyAchievementController::class, 'update']);

Route::apiResource('/goal', CompanyGoalController::class)->except('update');
Route::post('/goal/{id}', [CompanyGoalController::class, 'update']);

Route::apiResource('/vision', VisionController::class)->except('update');
Route::post('/vision/{id}', [VisionController::class, 'update']);

Route::apiResource('/companyInfo', CompanyInfoController::class)->except('update');
Route::post('/companyInfo/{id}', [CompanyInfoController::class, 'update']);

Route::apiResource('/companyService', CompanyServiceController::class)->except('update');
Route::post('/companyService/{id}', [CompanyServiceController::class, 'update']);

Route::apiResource('/service', ServiceController::class)->except('update');
Route::post('/service/{id}', [ServiceController::class, 'update']);

Route::apiResource('/companyTeam', CompanyTeamController::class)->except('update');
Route::post('/companyTeam/{id}', [CompanyTeamController::class, 'update']);

Route::apiResource('/contact', ContactController::class)->except('update');
Route::post('/contact/{id}', [ContactController::class, 'update']);


Route::apiResource('/Qa', QAController::class)->except('update');
Route::post('/Qa/{id}', [QAController::class, 'update']);

Route::apiResource('/testimonail', TestimonailController::class)->except('update');
Route::post('/testimonail/{id}', [TestimonailController::class, 'update']);


Route::apiResource('/projects', ProjectController::class)->except('update');
Route::post('/projects/{id}', [ProjectController::class, 'update']);

Route::apiResource('/projectOwner', ProjectOwnerController::class)->except('update');
Route::post('/projectOwner/{id}', [ProjectOwnerController::class, 'update']);
Route::get('/project_owners/{projectId}', [ProjectOwnerController::class, 'projectOwners']);

Route::apiResource('/blog', BlogController::class)->except('update');
Route::post('/blog/{id}', [BlogController::class, 'update']);

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/profile', [AuthController::class, 'userProfile']);
});

Route::get('/home', [HomeController::class, 'home']);
Route::get('/aboutUs', [HomeController::class, 'aboutUs']);
