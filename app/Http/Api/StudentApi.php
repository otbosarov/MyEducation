<?php

namespace App\Http\Api;

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

class StudentApi
{
    public static function api()
    {
        Route::resource('student', StudentController::class);

        Route::controller(StudentController::class)->group(function () {
            Route::get('rating_show', 'ratingShow');
            Route::post('addStudentFactory', 'addStudentFactory');
        });
    }
}
