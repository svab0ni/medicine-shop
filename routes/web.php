<?php

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


Auth::routes();


Route::get('/', 'IndexController@index')->name('index');
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/search', 'SearchController@index');
Route::get('/cart', 'CartController@index');
Route::get('/cart/add-to-cart/{id}', 'CartController@addToCart');
Route::post('/cart/update/{id}/{increment}', 'CartController@update');
Route::delete('/cart/delete/{id}', 'CartController@destroy');
Route::get('/checkout', 'CartController@checkout');
Route::post('/purchase', 'CartController@purchase')->name('purchase');

Route::get('/delivery/{id}/assign', 'UserController@updateDeliveryStatus');


Route::get('/profile/ongoing-deliveries', 'UserController@ongoingDeliveries');
Route::get('/profile/finished-deliveries', 'UserController@finishedDeliveries');


Route::get('/profile', 'UserController@index');
Route::post('/profile-update', 'UserController@update')->name('updateProfile');
Route::get('/profile/queued-deliveries', 'UserController@queuedDeliveries');
Route::get('/profile/medicine', 'UserController@medicine');
Route::get('/profile/purchase', 'UserController@purchaseHistory');
Route::get('/profile/purchase/{id}', 'UserController@purchasePreview');




Route::get('/medicine/create', 'MedicineController@create');
Route::post('/medicine/store', 'MedicineController@store');
Route::get('/medicine/{id}/edit', 'MedicineController@edit')->name('medicineUpdate');
Route::post('/medicine/{id}/update', 'MedicineController@update');
Route::get('/medicine/{id}/delete', 'MedicineController@destroy');

Route::get('/profile', 'UserController@index');
Route::get('/profile', 'UserController@index');


Route::get('/{category_slug}', 'CategoryController@index');
Route::get('/{category_slug}/{medicine_slug}/{medicine_id}', 'MedicineController@show');


