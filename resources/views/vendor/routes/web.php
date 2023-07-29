<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CSVController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\TestController;


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
//Route::get('login', [App\Http\Controllers\Auth\LoginController::class])->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login');

Route::get('produtc', [ProductController::class, 'index']);
Route::post('product', [ProductController::class, 'store']);
Route::get('showproduct', [ProductController::class, 'show']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




Route::get('tooltestfilefilter',[CSVController::class,'FilterText']);


Route::resource('products','App\Http\Controllers\ProductsController');
Route::get('/categories/fetch', function() {
    return response()->json(['categories' => Category::all()]);
})->name('categories.fetch');



Route::get('add',[TestController::class,'index']);