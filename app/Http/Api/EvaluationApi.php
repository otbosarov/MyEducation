<?php
namespace App\Http\Api;
use App\Http\Controllers\EvaluationController;
use Illuminate\Support\Facades\Route;

class EvaluationApi
{
    public static function api(){
        Route::resource('evaluation',EvaluationController::class);
    }
}
