<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('home');

Route::get('/pdf/generate/{member_code}', 'TagsController@generatePdf');

/* Users */
Route::group(['prefix' => 'users'], function () {
    Route::get('/', 'UsersController@index')->name('users.index');
    Route::get('/create', 'UsersController@showCreateForm')->name('users.form.create');
    Route::get('/edit/{member_code}', 'UsersController@showEditForm')->name('users.form.edit');
    Route::get('/show/{member_code}', 'UsersController@showMember')->name('users.show');
    Route::get('/delete/{id}', 'UsersController@showDeleteForm')->name('users.delete.form');

    Route::post('/store', 'UsersController@store')->name('users.store');
    Route::post('/update/{member_code}', 'UsersController@update')->name('users.update');
    Route::get('/destroy/{id}', 'UsersController@destroy')->name('users.destroy');
});

/* Clubs */
Route::group(['prefix' => 'clubs'], function () {
    Route::get('/', 'ClubsController@index')->name('clubs.index');
    Route::get('/show/{id}', 'ClubsController@show')->name('clubs.show');
    Route::get('/edit/{id}', 'ClubsController@showEditForm')->name('clubs.form.edit');

    Route::get('/create', function() {
        return view('pages.clubs.create');
    })->name('clubs.form.create');

    Route::post('/store', 'ClubsController@store')->name('clubs.store');
    Route::post('/update/{id}', 'ClubsController@update')->name('clubs.update');
    Route::get('/delete/{id}', 'ClubsController@delete')->name('clubs.delete');
});

// Auth
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

/*Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
Route::get('password/confirm', 'Auth\ConfirmPasswordController@showConfirmForm')->name('password.confirm');
Route::post('password/confirm', 'Auth\ConfirmPasswordController@confirm');
Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::post('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');*/
