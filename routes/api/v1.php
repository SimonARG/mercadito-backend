<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\PostController;

Route::group(['middleware' => ['auth:sanctum']], function() {

    Route::apiResource('post', PostController::class);

});