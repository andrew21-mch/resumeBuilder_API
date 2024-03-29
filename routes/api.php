<?php

use App\Http\Controllers\API\CertificationController;
use App\Http\Controllers\API\ProfileController;
use App\Http\Controllers\API\TemplateController;
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

    Route::group(['prefix' => 'experiences'], function () {
        Route::get('/', [ExperienceController::class, 'getUserExperiences']);
        Route::get('/{id}', [ExperienceController::class, 'show']);
        Route::get('resume/{id}', [ExperienceController::class, 'getResumeExperiences']);
        Route::post('/', [ExperienceController::class, 'store']);
        Route::put('/{id}', [ExperienceController::class, 'update']);
        Route::delete('/{id}', [ExperienceController::class, 'destroy']);
    });

    Route::group(['prefix' => 'projects'], function () {
        Route::get('/', [ProjectController::class, 'getUserProjects']);
        Route::get('resume/{id}', [ProjectController::class, 'getResumeProjects']);
        Route::post('/', [ProjectController::class, 'store']);
        Route::get('/{id}', [ProjectController::class, 'show']);
        Route::put('/{id}', [ProjectController::class, 'update']);
        Route::delete('/{id}', [ProjectController::class, 'destroy']);
    });

    Route::group(['prefix' => 'profile'], function () {
        Route::get('/', [ProfileController::class, 'getProfile']);
        Route::post('/', [ProfileController::class, 'storeProfile']);
        Route::put('/{id}', [ProfileController::class, 'updateProfile']);
        Route::delete('/{id}', [ProfileController::class, 'destroy']);
    });



    Route::group(['prefix' => 'skills'], function () {
        Route::get('/', [SkillController::class, 'getUserSkills']);
        Route::get('/resume/{id}', [SkillController::class, 'getResumeSkills']);
        Route::post('/', [SkillController::class, 'store']);
        Route::put('/{id}', [SkillController::class, 'update']);
        Route::get('/{id}', [SkillController::class, 'show']);
        Route::delete('/{id}', [SkillController::class, 'destroy']);
    });

    Route::group(['prefix' => 'resumes'], function () {
        Route::get('/', [ResumeController::class, 'getUserResume']);
        Route::get('/{id}', [ResumeController::class, 'show']);
        Route::post('/', [ResumeController::class, 'store']);
        Route::put('/{id}', [ResumeController::class, 'update']);
        Route::delete('/{id}', [ResumeController::class, 'destroy']);
    });

    Route::group(['prefix' => 'users'], function () {
        Route::get('/', [UserController::class, 'index']);
        Route::post('/', [UserController::class, 'store']);
        Route::put('/{id}', [UserController::class, 'update']);
        Route::delete('/{id}', [UserController::class, 'destroy']);
        Route::put('/{id}/password', [UserController::class, 'setPassword']);
        Route::put('/{id}/language', [UserController::class, 'setUserLanguage']);
    });

    Route::group(['prefix' => 'educations'], function () {
        Route::get('/', [EducationController::class, 'getUserEductions']);
        Route::get('/resume/{resumeId}', [EducationController::class, 'getResumeEducations']);
        Route::post('/', [EducationController::class, 'store']);
        Route::get('/{id}', [EducationController::class, 'show']);
        Route::put('/{id}', [EducationController::class, 'update']);
        Route::delete('/{id}', [EducationController::class, 'destroy']);
    });

    Route::group(['prefix' => 'certifications'], function () {
        Route::get('/', [CertificationController::class, 'getUserCertifications']);
        Route::get('/resume/{resumeId}', [CertificationController::class, 'getResumeCertifications']);
        Route::post('/', [CertificationController::class, 'store']);
        Route::put('/{id}', [CertificationController::class, 'update']);
        Route::get('/{id}', [CertificationController::class, 'show']);
        Route::delete('/{id}', [CertificationController::class, 'destroy']);
    });

    Route::group(['prefix' => 'templates'], function () {
        Route::get('/', [TemplateController::class, 'getTemplates']);
        Route::get('/{id}', [TemplateController::class, 'getTemplate']);
        Route::post('/', [TemplateController::class, 'store']);
        Route::put('/{id}', [TemplateController::class, 'update']);
        Route::delete('/{id}', [TemplateController::class, 'destroy']);
    });
});
