<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function(){
    Route::get('/cobacek', [\App\Http\Controllers\Cobacek::class,'index']);
    Route::get('/dashboard',[App\Http\Controllers\DashboardController::class,'index']);
    Route::get('/assetIT',[App\Http\Controllers\DashboardController::class,'asset']);
    Route::get('/users', [\App\Http\Controllers\UserController::class,'index']);

    // Route::get('/computer', [\App\Http\Controllers\ComputerController::class,'index']);
    Route::get('/computer', [\App\Http\Controllers\ComputerController::class,'index']);
    Route::get('/computer/create', [\App\Http\Controllers\ComputerController::class,'create']);
    Route::post('/computer', [\App\Http\Controllers\ComputerController::class,'store']);
    Route::post('/computer/store-image', [\App\Http\Controllers\ComputerController::class,'storeImage']);
    Route::put('/computer/update-status', [\App\Http\Controllers\ComputerController::class,'updateStatus']);
    Route::get('/computer/qrcode/{id}', [\App\Http\Controllers\ComputerController::class,'qrcode']);
    Route::put('/computer/{id}', [\App\Http\Controllers\ComputerController::class,'update']);
    Route::get('/computer/edit/{id}', [\App\Http\Controllers\ComputerController::class,'edit']);
    Route::get('/computer/qrcode_refresh/{id}', [\App\Http\Controllers\ComputerController::class,'qrcodeRefresh']);
    Route::get('/computer/{id}', [\App\Http\Controllers\ComputerController::class,'show']);
    Route::delete('/computer/{id}', [\App\Http\Controllers\ComputerController::class,'destroy']);

    Route::get('/tool', [\App\Http\Controllers\ToolController::class,'index']);
    Route::get('/tool/create', [\App\Http\Controllers\ToolController::class,'create']);
    Route::post('/tool', [\App\Http\Controllers\ToolController::class,'store']);
    Route::put('/tool/update-status', [\App\Http\Controllers\ToolController::class,'updateStatus']);
    Route::get('/tool/{id}', [\App\Http\Controllers\ToolController::class,'show']);
    
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('search-name',[\App\Http\Controllers\UserController::class,'searchUser']);