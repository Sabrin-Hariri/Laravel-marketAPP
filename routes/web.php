<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
//use Illuminate\Contracts\Container\;
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

Route::get('home', function () {
  return 'heeeeelloooooo';
});
///Route::veiw('soso ','index');

//// for all CUDE 
//// first:  the URL ENY NAME YOU WANT "product"
//// 2- the name of controller "ProductController"

//Route::apiResource('products ',[app\Http\Controllers\ProductController::class]);

///Route::apiResource('products ','ProductController' );   false 
Route::apiResource('products ',ProductController::class );

///[App\Http\Controllers\ProfileController::class, 'index']

Route::get('product/soft/delete/{id}', 'ProductController@softDelete')
->name('soft.delete');

Route::get('product/trash', 'ProductController@trashedProducts')
->name('product.trash');


Route::get('product/back/from/trash/{id}', 'ProductController@backFromSoftDelete')
->name('product.back.from.trash');

Route::get('product/delete/from/database/{id}', 'ProductController@deleteForEver')
->name('product.delete.from.database');
