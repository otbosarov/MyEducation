<?php

namespace App\Http\Api;

use App\Http\Controllers\SubjectController;
use Illuminate\Support\Facades\Route;

class SubjectApi {
    public static function api(){
        Route::resource('subject',SubjectController::class);
        Route::get('SelectTeachaerSubjects',[SubjectController::class,'SelectTeachaerSubjects']);
    }
}
