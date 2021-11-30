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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Route::resources([
//     'drives'=>'DriveController'
// ]);

//drives route
// .............................display all data
Route::get('drives','DriveController@index')->name('dives.index');
// to show greate page
Route::get('drives/create','DriveController@create')->name('drives.create');
// to store
Route::post('drives/create','DriveController@store')->name('drives.store');
//to show one item
Route::get('drives/show/{id}','DriveController@show')->name('drives.show');
//to edit page
Route::get('drives/edit/{id}','DriveController@edit')->name('drives.edit');
//to update data in database
Route::post('drives/edit/{id}','DriveController@update')->name('drives.update');
//to destroy data in database
Route::get('drives/destroy/{id}','DriveController@destroy')->name('drives.destroy');

//to download file from database
Route::get('drives/download/{id}','DriveController@download')->name('drives.download');
//...............................end drives route