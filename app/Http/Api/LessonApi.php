<?php

namespace App\Http\Api;

use App\Http\Controllers\LessonController;
use Illuminate\Support\Facades\Route;

class LessonApi
{
    public static function api()
    {
        Route::resource('lesson', LessonController::class);

        Route::controller(LessonController::class)->group(function () {
            Route::put('changeActive_lesson/{id}', 'changeActive');
            Route::get('OneDayLessons','OneDayLessons');
        });
    }
}
