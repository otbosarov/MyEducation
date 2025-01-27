<?php

namespace App\Http\Api;

use App\Http\Controllers\GroupToStudentController;
use Illuminate\Support\Facades\Route;

class AddGroupToStudentApi
{
    public static function api()
    {
      Route::controller(GroupToStudentController::class)->group(function(){
             Route::get('addGroupToStudent_show/{id}','index');
             Route::post('addGroupToStudent_create','store');
             Route::put('addGroupToStudent_update/{id}','update');
      });
    }
}
