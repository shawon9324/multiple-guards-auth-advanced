<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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


Auth::routes();


Route::prefix('admin')->namespace('Backend\Admin')->group(function () {
    Route::match(['get', 'post'], '/', 'AdminController@login')->name('admin.login');
    Route::match(['get','post'],'/my-account-recover/auth={auth}','AdminController@recoverAccount')->name('admin.account.recover');
    Route::post('/forgot-password', 'AdminController@forgotPassword')->name('admin.account.forgotPassword');
    
    Route::group(['middleware' => ['admin']], function () {
        Route::get('dashboard', 'AdminController@dashboard')->name('admin.dashboard');
        Route::get('logout', 'AdminController@logout')->name('admin.logout');
        Route::prefix('users')->group(function () {
            Route::get('/view', 'AdminController@viewUser')->name('users.view');
            Route::get('/add', 'AdminController@addUser')->name('users.add');
            Route::post('/store', 'AdminController@storeUser')->name('users.store');
            Route::get('/edit/{id}', 'AdminController@editUser')->name('users.edit');
            Route::post('/update/{id}', 'AdminController@updateUser')->name('users.update');
            Route::post('/delete', 'AdminController@deleteUser')->name('users.delete');
            Route::match(['get','post'],'/check-user-email','AdminController@userEmailCheck');
        });
        Route::prefix('profile')->group(function () {
            Route::get('/view', 'ProfileController@viewProfile')->name('profile.view');
            Route::any('/check-user-password', 'ProfileController@passwordCheck')->name('profile.password.check');
            Route::post('/update-user-profile', 'ProfileController@updateProfile')->name('profile.update');
            Route::post('/update-user-profile-picture', 'ProfileController@updateProfilePicture')->name('profile.picture.update');
            Route::post('/update-user-password', 'ProfileController@updatePassword')->name('profile.password.update');
        });
    });
});