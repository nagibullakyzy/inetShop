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
    $items = \App\Models\Item::all();
    return view('index', compact('items'));
});

Route::get('/admin', function () {
    return view('admin');
});

Route::get('/item_details/{id}', function ($id) {
    $item= \App\Models\Item::find($id);
    
    return view('item_details', compact('item'));
});
Auth::routes();


Route::resource('producers','ProducerController');
Route::resource('items','ItemController');
Route::resource('categories','CategoryController');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/user-update/{userId}', 'HomeController@update');

Route::post('assign_cat', 'ItemController@assign_cat')->name('assign_cat');