<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WeightLogController;
use App\Http\Controllers\WeightTargetController;



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

Route::get('/', function () {return view('welcome');});

Route::middleware('auth')->group(function () {
    Route::get('/', [AuthController::class, 'index']);
    });
// Route::get('/login', [AuthController::class, 'index']);

Route::post('/login', [AuthController::class, 'login']);

Route::get('/login', function () {
    return view('auth.login'); // login.blade.phpを返す
});

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

Route::get('/weight_logs', [WeightLogController::class, 'index'])->name('weight_logs.index');

Route::get('/register', function () {
    return view('auth.register'); // Bladeファイル
});

Route::post('/register', [AuthController::class, 'register']);


Route::middleware('auth')->group(function () {
    Route::get('/weight_logs/goal_setting', [WeightLogController::class, 'index'])->name('weight_logs.index');
    Route::get('/weight_logs/goal_setting', [WeightLogController::class, 'goalSetting'])->name('weight_target.create');
    Route::post('/weight_logs/goal_setting', [WeightTargetController::class, 'store'])->name('weight_target.store');

});


Route::post('/weight_logs/goal_setting', [WeightTargetController::class, 'store'])->name('weight_target.store');

Route::post('/weight-target/store', [WeightTargetController::class, 'store'])->name('weight_target.store');



