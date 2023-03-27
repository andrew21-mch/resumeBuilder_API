<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\SkillController;
use App\Http\Controllers\API\ResumeController;
use App\Http\Controllers\API\ProjectController;
use App\Http\Controllers\API\EducationController;
use App\Http\Controllers\API\ExperienceController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();

});

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
    Route::group(['middleware' => 'auth:sanctum'], function () {
        Route::get('logout', [AuthController::class, 'logout']);
        Route::get('user', [AuthController::class, 'user']);
    });
});

Route::group(['prefix' => 'v1', 'middleware' => 'auth:sanctum'], function () {

    Route::group(['prefix' => 'projects'], function () {
        Route::get('/', [ProjectController::class, 'index']);
        Route::post('/', [ProjectController::class, 'store']);
        Route::put('/{id}', [ProjectController::class, 'update']);
        Route::delete('/{id}', [ProjectController::class, 'destroy']);
    });

    Route::group(['prefix' => 'experiences'], function () {
        Route::get('/', [ExperienceController::class, 'index']);
        Route::post('/', [ExperienceController::class, 'store']);
        Route::put('/{id}', [ExperienceController::class, 'update']);
        Route::delete('/{id}', [ExperienceController::class, 'destroy']);
    });

    Route::group(['prefix' => 'skills'], function () {
        Route::get('/', [SkillController::class, 'index']);
        Route::post('/', [SkillController::class, 'store']);
        Route::put('/{id}', [SkillController::class, 'update']);
        Route::delete('/{id}', [SkillController::class, 'destroy']);
    });

    Route::group(['prefix' => 'resumes'], function () {
        Route::get('/', [ResumeController::class, 'index']);
        Route::post('/', [ResumeController::class, 'store']);
        Route::put('/{id}', [ResumeController::class, 'update']);
        Route::delete('/{id}', [ResumeController::class, 'destroy']);
    });

    Route::group(['prefix' => 'users'], function () {
        Route::get('/', [UserController::class, 'index']);
        Route::post('/', [UserController::class, 'store']);
        Route::put('/{id}', [UserController::class, 'update']);
        Route::delete('/{id}', [UserController::class, 'destroy']);
    });

    Route::group(['prefix' => 'educations'], function () {
        Route::get('/', [EducationController::class, 'index']);
        Route::post('/', [EducationController::class, 'store']);
        Route::put('/{id}', [EducationController::class, 'update']);
        Route::delete('/{id}', [EducationController::class, 'destroy']);
    });
});
