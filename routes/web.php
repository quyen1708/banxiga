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

Route::get('/', 'BanXiGaController@gioithieu');

//Route::get('/home', 'BanXiGaController@home');

Route::get('/home', 'BanXiGaController@home');

//Route::get('/banxiga/home', 'BanXiGaController@product');

Route::get('/search', 'BanXiGaController@search');


Route::get('/category/{id}/{name}', 'BanXiGaController@categoryClass');

Route::get('/detail/{id}/{name}', 'BanXiGaController@productDetail');

Route::get('/Add-Cart/{id}', 'BanXiGaController@addCart');

Route::get('/Delete-Item-Cart/{id}', 'BanXiGaController@DeleteItemCart');

Route::get('/List-Cart', 'BanXiGaController@ListCart');

Route::get('/Delete-Item-List-Cart/{id}', 'BanXiGaController@DeleteItemListCart');

//Route::get('/Save-List-Item-Cart/{id}/{quanty}', 'BanXiGaController@SaveListItemCart');

Route::post('/Save-All', 'BanXiGaController@SaveAllListItemCart');


Route::post('/Check-out', 'BanXiGaController@CheckOut');
/*->middleware('CheckCart');*/

Route::get('/Order', 'BanXiGaController@Order')->middleware('CheckCart');

Route::post('/Send-Order', 'BanXiGaController@SendOrder');

Route::get('/', 'BanXiGaController@ListGioiThieu');



