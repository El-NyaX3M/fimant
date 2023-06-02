<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
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
    return view('landing');
});

Route::get('/log', function(){
    return view('login');
});

Route::get('/register', function(){
    return view('register');
});
Route::post('/register', [UserController::class, 'create'])->name('register.create');

Route::group( ['middleware' => 'auth' ], function(){
    Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
    Route::post('/canvas',[ProjectController::class, 'store'])->name('projects.store');
    Route::get('/canvas/{id}', [ProjectController::class, 'load'])->name('projects.load');
    Route::put('/canvas/{id}',[ProjectController::class, 'update'])->name('projects.save');
    Route::delete('/canvas/{id}', [ProjectController::class,'destroy'])->name('projects.delete');
    Route::get('/prueba', function(){
        return view('canvasWork');
    });
});