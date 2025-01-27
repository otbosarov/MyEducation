<?php

use App\Http\Api\AddGroupToStudentApi;
use App\Http\Api\EvaluationApi;
use App\Http\Api\GroupApi;
use App\Http\Api\LessonApi;
use App\Http\Api\StudentApi;
use App\Http\Api\SubjectApi;
use App\Http\Api\TeacherApi;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\GroupToStudentController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use Illuminate\Http\Request;
use Illuminate\Routing\RouteRegistrar;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

EvaluationApi::api();
LessonApi::api();
AddGroupToStudentApi::api();
GroupApi::api();
SubjectApi::api();
TeacherApi::api();
StudentApi::api();


