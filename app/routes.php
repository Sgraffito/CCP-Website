<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@showWelcome');
Route::get('about', 'HomeController@showAbout');
Route::get('contact', 'HomeController@showContact');
Route::get('location', 'HomeController@showLocation');
Route::get('login', 'HomeController@showLogin');
Route::post('login', 'HomeController@doLogin');
Route::post('sign-up', 'HomeController@doSignUp');
Route::post('loginAfterSignUp', 'HomeController@doLoginAfterSignup');

Route::get('profile', 'AccountController@showSuccessfulLogin');
Route::get('successful-signin', 'AccountController@showSuccessfulSignUp');
Route::get('accountSignOut', 'AccountController@showSignOut');
Route::get('myAccountSettings', 'AccountController@showMyAccountSettings');
Route::post('changeOldPassword', 'AccountController@doChangePassword');
Route::post('changeEmail', 'AccountController@doChangeEmail');
Route::post('deleteAccount', 'AccountController@doDeleteAccount');

Route::get('Programming', 'ProgrammingController@showProgrammingHome');