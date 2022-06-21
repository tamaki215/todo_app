<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\HelloController;

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


#Route::get('/', [ TaskController::class, 'index' ])->name('task.index2');
Route::get('hello', [ HelloController::class, 'display_hello' ])->name('hello.display_hello');



Route::get('/',[TodoController::class,'index'])->name('todo.init');
Route::post('/add',[TodoController::class,'add'])->name('todo.add');
Route::post('/check',[TodoController::class,'check'])->name('todo.check');
Route::post('/delete',[TodoController::class,'delete'])->name('todo.delete');
