<?php

/*
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes(['register' => true]);

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function() {
    Route::resource('dashboard','Admin\DashboardController');
    Route::get('users','Admin\UserController@userIndex')->name('user.index');
    Route::post('users/create','Admin\UserController@userStore')->name('user.store');
    Route::get('users/edit/{id}','Admin\UserController@userEdit')->name('user.edit');
    Route::get('users/show/{id}','Admin\UserController@userShow')->name('user.show');
    Route::post('users/update/{id}','Admin\UserController@userUpdate')->name('user.update');
    Route::post('users/suspend/{id}','Admin\UserController@userSuspend')->name('user.suspend');
    Route::post('users/delete/{id}','Admin\UserController@userDestroy')->name('user.destroy');
    Route::get('users/profile', 'Admin\UserController@userProfile')->name('user.profile');
    Route::post('users/profile/avatar', 'Admin\UserController@updateAvatar')->name('user.avatar');
    Route::post('users/profile/password', 'Admin\UserController@updatePassword')->name('user.password');
    Route::get('users/roles','Admin\UserController@roleIndex')->name('role.index');
    Route::get('users/roles/create','Admin\UserController@roleCreate')->name('role.create');
    Route::post('users/roles/store','Admin\UserController@roleStore')->name('role.store');
    Route::get('users/roles/edit/{id}','Admin\UserController@roleEdit')->name('role.edit');
    Route::get('users/roles/show/{id}','Admin\UserController@roleShow')->name('role.show');
    Route::post('users/roles/update/{id}','Admin\UserController@roleUpdate')->name('role.update');
    Route::post('users/roles/delete/{id}','Admin\UserController@roleDestroy')->name('role.destroy');
    Route::get('activity-log','Admin\UserController@logIndex')->name('activity.index');

    Route::get('mitra-monitoring/mitra-sales','Admin\SalesController@mitraIndex')->name('mitra.index');
    Route::post('mitra-monitoring/mitra-sales/upload','Admin\SalesController@mitraImport')->name('mitra.import');
    Route::get('mitra-monitoring/new-register','Admin\SalesController@newMitraIndex')->name('newMitra.index');
    Route::post('mitra-monitoring/new-register/upload','Admin\SalesController@newMitraImport')->name('newMitra.import');

    Route::get('report/mitra-sales','Admin\ReportController@mitraReports')->name('mitraReports.index');
    Route::post('report/mitra-sales/search','Admin\ReportController@executeReports')->name('executeReports.store');
});
