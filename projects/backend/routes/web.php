<?php

use Illuminate\Support\Facades\Route; 
// use App\Http\Controllers\UserController;


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
Route::get('users',         'Api\UserController@index')->name('users.index');
Route::get('users/{id}',    'Api\UserController@show')->name('users.show');
Route::post('users',        'Api\UserController@store')->name('users.store');
Route::put('users/{id}',    'Api\UserController@update')->name('users.update'); 
Route::delete('users/{id}', 'Api\UserController@destroy')->name('users.destroy');
Route::get('/postman/csrf', function (Request $request) {
	return csrf_token();
});