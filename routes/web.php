<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CraigslistController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

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

//----------------------------------------------------------------------------




//----------------------------------------------------------------------------







Route::get('/', function () {
    return view('welcome');
});
# DataTable Routes
Route::get('/datatable', [TableController::class, 'ShowDataTable']);
Route::get('/datatable1', [TableController::class, 'getTableData']);

#Collaction Routes
Route::get('/collaction', [TestController::class, 'index']);
Route::get('/collaction_process', [TestController::class, 'ArrCollaction']);





// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/home',[App\Http\Controllers\HomeController::class,'index'])->name('home');


Route::group(['middleware' => ['admin']], function () {

//--------------User--------------------------------------------------------------------------
Route::get('/users',[App\Http\Controllers\UserController::class,'index'])->name('users.index');
Route::get('/create', [UserController::class, 'create'])->name('create');;
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [UserController::class,'update'])->name('users.update');
Route::get('delete/{user}', [UserController::class, 'destroy'])->name('delete.destroy');
//-----------------user end-------------------------------------------------------------------

//--------------Post--------------------------------------------------------------------------
Route::get('/posts',[App\Http\Controllers\PostController::class,'index'])->name('posts.index');
Route::get('/posts/create', [App\Http\Controllers\PostController::class, 'create'])->name('posts.create');;
Route::post('/posts', [App\Http\Controllers\PostController::class, 'store'])->name('posts.store');
Route::get('/posts/{post}/edit', [App\Http\Controllers\PostController::class, 'edit'])->name('posts.edit');
Route::put('/posts/{post}', [App\Http\Controllers\PostController::class,'update'])->name('posts.update');
Route::get('post/{post}', [App\Http\Controllers\PostController::class, 'delete'])->name('delete.post');
//-----------------Post end-------------------------------------------------------------------

//-----------------categori -------------------------------------------------------------------
Route::get('/categories',[App\Http\Controllers\CategorieController::class,'index'])->name('categoriess.index'); 
Route::get('/categories/create', [App\Http\Controllers\CategorieController::class, 'create'])->name('categories.create');;
Route::post('/categories', [App\Http\Controllers\CategorieController::class, 'store'])->name('categories.store');
Route::get('/categories/{categorie}/edit', [App\Http\Controllers\CategorieController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{categorie}', [App\Http\Controllers\CategorieController::class,'update'])->name('categories.update');
Route::get('categories/{categorie}', [App\Http\Controllers\CategorieController::class, 'delete'])->name('delete.categorie');

//-----------------categori end-------------------------------------------------------------------

//-----------------comment -------------------------------------------------------------------
Route::get('/comments',[App\Http\Controllers\CommentController::class,'index'])->name('comments.index');
Route::get('/comments/create',[App\Http\Controllers\CommentController::class,'create'])->name('comments.create');
Route::post('/comments',[App\Http\Controllers\CommentController::class,'store'])->name('comments.store');
Route::get('/comments/{comment}/edit',[App\Http\Controllers\CommentController::class,'edit'])->name('comments.edit');    
Route::put('/comments/{comment}',[App\Http\Controllers\CommentController::class,'update'])->name('comments.update');    
Route::get('/comments/{comment}',[App\Http\Controllers\CommentController::class,'destroy'])->name('comments.delete');    

//-----------------comment end-------------------------------------------------------------------
});




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('api/{city}/{category}/{page}', [CraigslistController::class, 'getSearchResults'])->name('craigslist.results');

require __DIR__.'/auth.php';
