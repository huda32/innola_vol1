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
    Route::get('/assetGA',[App\Http\Controllers\DashboardController::class,'assetGA']);
    Route::get('/assetProduksi',[App\Http\Controllers\DashboardController::class,'assetProduksi']);
    Route::get('/users', [\App\Http\Controllers\UserController::class,'index']);

    // Computer
    Route::get('/computer', [\App\Http\Controllers\ComputerController::class,'index']);
    Route::get('/computer/create', [\App\Http\Controllers\ComputerController::class,'create']);
    Route::post('/computer', [\App\Http\Controllers\ComputerController::class,'store']);
    Route::post('/computer/store-image', [\App\Http\Controllers\ComputerController::class,'storeImage']);
    Route::put('/computer/update-status', [\App\Http\Controllers\ComputerController::class,'updateStatus']);
    Route::get('/computer/qrcode/{id}', [\App\Http\Controllers\ComputerController::class,'qrcode']);
    Route::put('/computer/{id}', [\App\Http\Controllers\ComputerController::class,'update']);
    Route::get('/computer/edit/{id}', [\App\Http\Controllers\ComputerController::class,'edit']);
    Route::get('/computer/imageEdit/{id}', [\App\Http\Controllers\ComputerController::class,'imageEdit']);
    Route::get('/computer/qrcode_refresh/{id}', [\App\Http\Controllers\ComputerController::class,'qrcodeRefresh']);
    Route::get('/computer/{id}', [\App\Http\Controllers\ComputerController::class,'show']);
    Route::delete('/computer/{id}', [\App\Http\Controllers\ComputerController::class,'destroy']);
    Route::get('/computer/imageComputer/{id}/{idImage}', [\App\Http\Controllers\ComputerController::class,'destroyImageComputer']);

    //tool printer dan lain lain
    Route::get('/tool', [\App\Http\Controllers\ToolController::class,'index']);
    Route::get('/tool/create', [\App\Http\Controllers\ToolController::class,'create']);
    Route::post('/tool', [\App\Http\Controllers\ToolController::class,'store']);
    Route::post('/tool/store-image', [\App\Http\Controllers\ToolController::class,'storeImage']);
    Route::put('/tool/update-status', [\App\Http\Controllers\ToolController::class,'updateStatus']);
    Route::put('/tool/update-room', [\App\Http\Controllers\ToolController::class,'updateRoom']);
    Route::get('/tool/{id}', [\App\Http\Controllers\ToolController::class,'show']);
    Route::get('/tool/imageDelete/{id}', [\App\Http\Controllers\ToolController::class,'imageDelete']);
    Route::get('/tool/edit/{id}', [\App\Http\Controllers\ToolController::class,'edit']);
    Route::put('/tool/{id}', [\App\Http\Controllers\ToolController::class,'update']);
    Route::get('/tool/qrcode_refresh/{id}', [\App\Http\Controllers\ToolController::class,'qrcodeRefresh']);
    Route::get('/tool/imageDelete/{id}/{idImage}', [\App\Http\Controllers\ToolController::class,'destroyImageTool']);

    //cctv
    Route::get('/cctv', [\App\Http\Controllers\CctvController::class,'index']);
    
    //plant
    Route::get('/assetPlant/{id}', [\App\Http\Controllers\AssetController::class,'show']);

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('getRoom',[\App\Http\Controllers\ToolController::class,'getRoom'])->name('getRoom');
Route::get('search-name',[\App\Http\Controllers\UserController::class,'searchUser']);