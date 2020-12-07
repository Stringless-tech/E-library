<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GradesController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\SearchController;

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

Route::get('/',[HomepageController::class,'index']);

/*Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');*/

Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::get('/dashboard',function () {
    return view('dashboard');
})->name('dashboard');

    //List grades,categories or books
	Route::get('/grades/list',[GradesController::class,'index']);
	Route::get('/categories/list',[CategoriesController::class,'index']);
	Route::get('/books/list',[BooksController::class,'index']);

	//Add grades,categories or books
	Route::get('/categories/add',[CategoriesController::class,'addView']);
	Route::post('/categories/add',[CategoriesController::class,'addCategory']);
	Route::post('/grades/addoredit',[GradesController::class,'addOrEditGrade']);
	Route::get('/books/add',[BooksController::class,'addView']);
	Route::post('/books/add',[BooksController::class,'addBook']);

	//Edit categories or books
	Route::get('/categories/edit/{id}',[CategoriesController::class,'editView']);
	Route::post('/categories/edit/{id}',[CategoriesController::class,'editCategory']);
	Route::get('/books/edit/{id}',[BooksController::class,'editView']);
	Route::post('/books/edit/{id}',[BooksController::class,'editBook']);

});

//Single grade, category or book
Route::get('/books/single/{id}',[BooksController::class,'single']);
Route::get('/categories/single/{id}',[CategoriesController::class,'single']);

//Search result page
Route::get('/search-result',[SearchController::class,'searchResults']);


