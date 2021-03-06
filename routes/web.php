<?php

use App\Http\Controllers\Backend\DashboardController;
use Illuminate\Support\Facades\Route;


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
    return redirect(url('/login'));
});

Auth::routes(['register' => false]);
/*
|--------------------------------------------------------------------------
| Backend routes
|--------------------------------------------------------------------------
| Here goes all backend routes
*/

Route::get('/{any}', [DashboardController::class, 'index'])->where('any', '.*');


