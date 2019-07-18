<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/brand', 'BrandApiController@index')->name('brand');
Route::post('/brand/store', 'BrandApiController@store')->name('brand.api.store');
Route::delete('/brand/delete/{id}', 'BrandApiController@delete')->name('brand.delete');
Route::patch('brand/update/{id}', 'BrandApiController@update')->name('brand.update');

Route::get('/list', 'ListApiController@index')->name('list');
Route::post('/list/store', 'ListApiController@store')->name('list.store');
Route::delete('/list/delete/{id}', 'ListApiController@delete')->name('list.delete');
Route::patch('list/update/{id}', 'ListApiController@update')->name('list.update');
