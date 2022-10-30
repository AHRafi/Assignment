<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ajaxCrudController;
use App\Http\Controllers\DynamicAddRemoveFieldController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\EloquentController;

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

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/ajaxCrud',[ajaxCrudController::class,'ajaxCrud']);
// Route::post('/addStudent',[ajaxCrudController::class,'addStudent']);
// Route::get('/fetchStudent',[ajaxCrudController::class,'fetchStudent']);
// Route::get('/editStudent/{id}',[ajaxCrudController::class,'editStudent']);
// Route::post('/updateStudent',[ajaxCrudController::class,'updateStudent']);
// Route::delete('/deleteStudent/{id}',[ajaxCrudController::class,'deleteStudent']);


Route::get('/dynamicAddRemoveField',[DynamicAddRemoveFieldController::class,'index']);
Route::post('/dynamicSave',[DynamicAddRemoveFieldController::class,'dynamicSave']);
Route::post('/saveData',[DynamicAddRemoveFieldController::class,'saveData']);


// 22/10/22
Route::resource('product', ProductController::class);

// 25/10/22
Route::get('/oneToOne',[EloquentController::class,'oneToOne']);
Route::get('/oneToMany',[EloquentController::class,'oneToMany']);