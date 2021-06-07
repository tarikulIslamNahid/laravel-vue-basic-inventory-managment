<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    //for authentication
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

    //for authentication end

});
Route::apiResource('/employee','EmployeesController');
Route::apiResource('/suppliers','SuppliersController');
Route::apiResource('/categories','CategoriesController');
Route::apiResource('/product','ProductsController');
Route::apiResource('/expens','ExpensesController');
Route::apiResource('/customer','CustomersController');


Route::post('/salary/paid/{id}','SalariesController@paid');
Route::get('/salary','SalariesController@salary');
Route::get('/salaryview/{id}','SalariesController@salaryview');
Route::get('/getproductcategoy/{id}','posController@catProduct');
Route::post('/stock/update/{id}','ProductsController@stockupdate');  // product stock update
Route::get('/addCart/{id}','CartController@addcart');  // product POS
Route::get('/carts/get','CartController@getCart');  // product POS
Route::get('cart/remove/{id}','CartController@cartRemove');  // product POS
Route::get('/cart/cartInc/{id}','CartController@cartInc');  // product POS
Route::get('/cart/cartDec/{id}','CartController@cartDec');  // product POS


Route::get('/vats','ExtraController@vats');
Route::post('/orderdone','posController@orderdone');

//order
Route::get('/orders','orderController@getorders');
Route::get('/orders/details/{id}','orderController@details');
Route::get('/orders/orderdetails/{id}','orderController@orderdetails');

//admin

Route::get('/today/sell','posController@todaySell');
Route::get('/today/income','posController@todayincome');
Route::get('/today/due','posController@todaydue');
Route::get('/today/exp','posController@todayexp');
Route::get('/today/stock','posController@todaystock');



