<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home', 'TotalController@load_4_food_of_all_categories')->name('home');

Route::resource('category', 'CategoryController')->middleware('auth');
Route::resource('food', 'FoodController')->middleware('auth');

Route::get("/food/{id}/gotodelete", 'TotalController@go_to_delete_food_page')
    ->middleware('auth')->name('food.gotodelete');
Route::get('/category/{id}/gotodelete', 'TotalController@go_to_delete_category_page')
    ->middleware('auth')->name('category.gotodelete');