<?php

namespace App\Http\Api;

use App\Http\Controllers\GroupController;
use Illuminate\Support\Facades\Route;

class GroupApi
{
    public static function api()
    {
        Route::resource('group', GroupController::class);

        Route::controller(GroupController::class)->group(function () {
            Route::put('group_active_update/{id}', 'changeActive');
        });
    }
}
