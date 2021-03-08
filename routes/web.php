<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('products', ProductController::class)->middleware('auth');
//Route::get('products', [ProductController::class, 'index']);

//This

/*Route::middleware('can:crud_table')->group(function(){
    Route::get('/products/create', [ProductController::class, 'create'])->middleware('can:crud_table');

    Route::post('/products/{product}/create', [ProductController::class, 'store']);
    Route::delete('/products/{product}/destroy', [ProductController::class, 'destroy']);

    Route::get(
        '/products/{product}/edit',
        'ProfilesController@edit'
    )->middleware('can:crud_table');

    Route::patch(
        '/products/{product}',
        'ProfilesController@update'
    )->middleware('can:crud_table');

});
Route::get('products', [ProductController::class, 'index']); */
