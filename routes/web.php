<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Frontend manage Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/*
|--------------------------------------------------------------------------
| Backend Admin panel manage Routes
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

Route::group([ 'prefix' => 'admin' ],function(){
	Route::get('/dashboard', 'App\Http\Controllers\Backend\DashboardController@dashboard')->name('admin.dashboard');

	// This Routes are working for Branch management

	Route::group([ 'prefix' => '/branch' ],function(){
		Route::get('/manage', 'App\Http\Controllers\Backend\BranchController@index')->name('branch.manage');
		Route::get('/create', 'App\Http\Controllers\Backend\BranchController@create')->name('branch.create');
		Route::post('/store', 'App\Http\Controllers\Backend\BranchController@store')->name('branch.store');
		Route::get('/edit/{id}', 'App\Http\Controllers\Backend\BranchController@edit')->name('branch.edit');
		Route::post('/update/{id}', 'App\Http\Controllers\Backend\BranchController@update')->name('branch.update');
		Route::post('/destroy/{id}', 'App\Http\Controllers\Backend\BranchController@destroy')->name('branch.destroy');

	});
});
