<?php

use App\Http\Controllers\v1\ApplicationController;
use App\Http\Controllers\v1\ClientController;
use App\Http\Controllers\v1\CourseAssignmentController;
use App\Http\Controllers\v1\CourseController;
use App\Http\Controllers\v1\DealsController;
use App\Http\Controllers\v1\HrDocumentController;
use App\Http\Controllers\v1\FunnelLogController;
use App\Http\Controllers\v1\InterActionController;
use App\Http\Controllers\v1\ProjectController;
use App\Http\Controllers\v1\RecruitmentFunnelStageController;
use App\Http\Controllers\v1\UserController;
use App\Http\Controllers\v1\VacancyController;
use Illuminate\Support\Facades\Route;

Route::pattern('id', '\d+');
Route::pattern('hash', '[a-z0-9]+');
Route::pattern('hex', '[a-f0-9]+');
Route::pattern('uuid', '[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}');
Route::pattern('base', '[a-zA-Z0-9]+');
Route::pattern('slug', '[a-z0-9-]+');
Route::pattern('username', '[a-z0-9_-]{3,16}');


Route::get('/', function () {
    return "API v1";
});

Route::prefix('clients')->group(function () {
    Route::get('/', [ClientController::class, 'index']);
    Route::get('/{id}', [ClientController::class, 'show']);
    Route::post('/create', [ClientController::class, 'create']);
    Route::put('/update/{id}', [ClientController::class, 'update']);
    Route::delete('/delete/{id}', [ClientController::class, 'delete']);
});

Route::prefix('users')->group(function () {
    Route::get('/', [UserController::class, 'index']);
    Route::get('/{id}', [UserController::class, 'show']);
    Route::post('/create', [UserController::class, 'create']);
    Route::put('/update/{id}', [UserController::class, 'update']);
    Route::delete('/delete/{id}', [UserController::class, 'delete']);
});

Route::prefix('deals')->group(function () {
    Route::get('/', [DealsController::class, 'index']);
    Route::get('/{id}', [DealsController::class, 'show']);
    Route::post('/create', [DealsController::class, 'create']);
    Route::put('/update/{id}', [DealsController::class, 'update']);
    Route::delete('/delete/{id}', [DealsController::class, 'delete']);
});

Route::prefix('interactions')->group(function () {
    Route::get('/', [InterActionController::class, 'index']);
    Route::get('/{id}', [InterActionController::class, 'show']);
    Route::post('/create', [InterActionController::class, 'create']);
    Route::put('/update/{id}', [InterActionController::class, 'update']);
    Route::delete('/delete/{id}', [InterActionController::class, 'delete']);
});

Route::prefix('projects')->group(function () {
    Route::get('/', [ProjectController::class, 'index']);
    Route::get('/{id}', [ProjectController::class, 'show']);
    Route::post('/create', [ProjectController::class, 'create']);
    Route::put('/update/{id}', [ProjectController::class, 'update']);
    Route::delete('/delete/{id}', [ProjectController::class, 'delete']);
});

Route::prefix('vacancies')->group(function () {
    Route::get('/', [VacancyController::class, 'index']);
    Route::get('/{id}', [VacancyController::class, 'show']);
    Route::post('/create', [VacancyController::class, 'create']);
    Route::put('/update/{id}', [VacancyController::class, 'update']);
    Route::delete('/delete/{id}', [VacancyController::class, 'delete']);
});

Route::prefix('courses')->group(function () {
    Route::get('/', [CourseController::class, 'index']);
    Route::get('/{id}', [CourseController::class, 'show']);
    Route::post('/create', [CourseController::class, 'create']);
    Route::put('/update/{id}', [CourseController::class, 'update']);
    Route::delete('/delete/{id}', [CourseController::class, 'delete']);
});

Route::prefix('hr-documents')->group(function () {
    Route::get('/', [HrDocumentController::class, 'index']);
    Route::get('/{id}', [HrDocumentController::class, 'show']);
    Route::post('/create', [HrDocumentController::class, 'create']);
    Route::put('/update/{id}', [HrDocumentController::class, 'update']);
    Route::delete('/delete/{id}', [HrDocumentController::class, 'delete']);
    Route::get('download/{id}', [HrDocumentController::class, 'download']);
});

Route::prefix('course-assignments')->group(function () {
    Route::get('/', [CourseAssignmentController::class, 'index']);
    Route::get('/{id}', [CourseAssignmentController::class, 'show']);
    Route::post('/create', [CourseAssignmentController::class, 'create']);
    Route::put('/update/{id}', [CourseAssignmentController::class, 'update']);
    Route::delete('/delete/{id}', [CourseAssignmentController::class, 'delete']);
});

Route::prefix('recruitment-funnel-stages')->group(function () {
    Route::get('/', [RecruitmentFunnelStageController::class, 'index']);
    Route::get('/{id}', [RecruitmentFunnelStageController::class, 'show']);
    Route::post('/create', [RecruitmentFunnelStageController::class, 'create']);
    Route::put('/update/{id}', [RecruitmentFunnelStageController::class, 'update']);
    Route::delete('/delete/{id}', [RecruitmentFunnelStageController::class, 'delete']);
});

Route::prefix('funnel-logs')->group(function () {
    Route::get('/', [FunnelLogController::class, 'index']);
    Route::get('/{id}', [FunnelLogController::class, 'show']);
    Route::post('/create', [FunnelLogController::class, 'create']);
    Route::put('/update/{id}', [FunnelLogController::class, 'update']);
    Route::delete('/delete/{id}', [FunnelLogController::class, 'delete']);
});

Route::prefix('applications')->group(function () {
    Route::get('/', [ApplicationController::class, 'index']);
    Route::get('/{id}', [ApplicationController::class, 'show']);
    Route::post('/create', [ApplicationController::class, 'create']);
    Route::put('/update/{id}', [ApplicationController::class, 'update']);
    Route::delete('/delete/{id}', [ApplicationController::class, 'delete']);
});
