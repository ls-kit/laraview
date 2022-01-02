<?php

use App\Http\Controllers\backend\AuthCheckController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\GenerateReviewController;
use App\Http\Controllers\Backend\ReviewController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\TokenController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

/*
|--------------------------------------------------------------------------
| Backend routes
|--------------------------------------------------------------------------
| Here goes all backend routes
*/

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/{any}', [DashboardController::class, 'index'])->where('any', '.*');

// Route::get('/{dashboard}', [DashboardController::class, 'index'])->where('dashboard', 'dashboard');
// Route::get('/{review}', [DashboardController::class, 'index'])->where('review', 'review');
// Route::get('/{generate-review}', [DashboardController::class, 'index'])->where('generate-review', 'generate-review');
// Route::get('/{setting}', [DashboardController::class, 'index'])->where('setting', 'setting');


// Route::group(['middleware' => ['auth'], 'as' => 'backend.'], function(){
//     Route::resource('/token', TokenController::class);
//     Route::resource('/review', ReviewController::class);
//     Route::resource('/generate-review', GenerateReviewController::class);
//     Route::resource('/setting', SettingController::class);
// });

