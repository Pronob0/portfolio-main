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
Route::get('admin','Admin\LoginController@showadminLoginform')->name('admin.loginform');
Route::get('user/login','User\LoginController@showuserLoginform')->name('user.loginform');
Route::post('admin','Admin\LoginController@adminLogin')->name('admin.login');


// ADMIN ROUTE GROUP
Route::group(['as'=>'admin.', 'prefix'=>'admin','namespace'=>'Admin',['middleware'=>['admin']]],function(){

    Route::get('dashboard','DashboardController@index')->name('dashboard');
    Route::get('/logout','DashboardController@adminLogout')->name('logout');
    Route::get('/change_password','DashboardController@PassChange')->name('change-pass');
    Route::post('/update_password','DashboardController@PassUpdate')->name('update_pass');
    Route::get('/change_profile','DashboardController@ProfileEdit')->name('change-profile');
    Route::post('/profile-update','DashboardController@profileupdate')->name('profile.update');

    // Gig category Start
    Route::get('/category','CategoryController@index')->name('category');
    Route::post('/category','CategoryController@store')->name('category.store');
    Route::get('/category/{slug}','CategoryController@edit')->name('category.edit');
    Route::post('/category/{id}','CategoryController@update')->name('category.update');
    Route::get('/category/delete/{id}','CategoryController@destroy')->name('category.delete');





});

// End Admin Route Group

    Route::get('dashboard','User\DashboardController@index')->name('user.dashboard');





