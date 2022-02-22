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

Route::get('/', 'App\Http\Controllers\PagesController@home');
Route::get('/upload_page', 'App\Http\Controllers\PagesController@upload_page');
Route::get('/about_us', 'App\Http\Controllers\PagesController@about_us');
Route::get('/contact_page', 'App\Http\Controllers\PagesController@contact_page');
Route::get('/upload_list', 'App\Http\Controllers\PagesController@upload_list');
Route::get('/results_page', 'App\Http\Controllers\PagesController@results_page');

Route::get('/upload_list', 'App\Http\Controllers\ImageUploadController@fileIndex');
Route::post('image/upload/store','App\Http\Controllers\ImageUploadController@fileStore');
Route::post('image/delete','App\Http\Controllers\ImageUploadController@fileDestroy');
Route::post('contact-us', 'App\Http\Controllers\ContactController@saveContact');
Route::get('/results_page', 'App\Http\Controllers\ImageUploadController@fileGet');