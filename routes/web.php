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
//Route::get('/foo','App\http\Controllers\TestController@foo')
Route::get('/','App\http\Controllers\ClientsController@accueil')->name('accueil');
Route::get('/contact','App\http\Controllers\ClientsController@contact')->name('contact');
Route::get('a-propos','App\http\Controllers\ClientsController@apropos')->name('a-propos');
Route::get('/clients','App\http\Controllers\ClientsController@list')->name('clients');
Route::get('/client','App\http\Controllers\ClientsController@create')->name('client.create');
Route::post('/client','App\http\Controllers\ClientsController@store')->name('client.store');
Route::get('/client/{id}','App\http\Controllers\ClientsController@show')->name('client.show');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
