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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// 22/10/22
Route::resource('product', ProductController::class);

