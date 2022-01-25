<?php

use App\Http\Controllers\Backend\Api\CheckAuthController;
use App\Http\Controllers\Backend\Api\GenerateReviewController;
use App\Http\Controllers\Backend\Api\ReviewController;
use App\Http\Controllers\Backend\Api\SettingController;
use App\Http\Controllers\Backend\Api\TokenController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// ** NOTE **
// all api routes are useing web gurd under the hood
Route::group(['middleware' => 'auth'], function() {

    Route::apiResource('token', TokenController::class);
    Route::apiResource('generate-review', GenerateReviewController::class);
    Route::apiResource('setting', SettingController::class);
    Route::get('review-list', [ReviewController::class, 'reviewList']);
    Route::post('review-search', [ReviewController::class, 'reviewSearch']);
    Route::apiResource('review', ReviewController::class);
});

Route::get('check-auth', [CheckAuthController::class, 'index']);
