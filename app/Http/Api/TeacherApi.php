<?php

namespace App\Http\Api;

use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

class TeacherApi {
    public static function api(){
        Route::resource('teacher',TeacherController::class);
    }
}
