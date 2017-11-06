<?php

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
    return view('home');
})->name('home');

Route::group(['prefix' => 'teacher'], function () {
    Route::get('/login', 'TeacherAuth\LoginController@showLoginForm')->name('login');
    Route::get('/logout', 'TeacherAuth\LoginController@logout')->name('logout');
    Route::post('/logout', 'TeacherAuth\LoginController@logout')->name('logout');
    Route::post('/login', 'TeacherAuth\LoginController@login');
    

    Route::get('/register', 'TeacherAuth\RegisterController@showRegistrationForm')->name('register');
    Route::post('/register', 'TeacherAuth\RegisterController@register');

    Route::post('/password/email', 'TeacherAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
    Route::post('/password/reset', 'TeacherAuth\ResetPasswordController@reset')->name('password.email');
    Route::get('/password/reset', 'TeacherAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
    Route::get('/password/reset/{token}', 'TeacherAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'student'], function () {
    Route::get('/login', 'StudentAuth\LoginController@showLoginForm')->name('login');
    Route::get('/logout', 'StudentAuth\LoginController@logout')->name('logout');
    Route::post('/logout', 'StudentAuth\LoginController@logout')->name('logout');
    Route::post('/login', 'StudentAuth\LoginController@login');
    
    Route::get('/register', 'StudentAuth\RegisterController@showRegistrationForm')->name('register');
    Route::post('/register', 'StudentAuth\RegisterController@register');

    Route::post('/password/email', 'StudentAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
    Route::post('/password/reset', 'StudentAuth\ResetPasswordController@reset')->name('password.email');
    Route::get('/password/reset', 'StudentAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
    Route::get('/password/reset/{token}', 'StudentAuth\ResetPasswordController@showResetForm');
});

Route::get('/teacher/subject/edit/{$id}', 'SubjectController@edit');
