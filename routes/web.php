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
Route::get('/admin', function () {
    return view('admin.dashboard');
});
// Posts routes
Route::resource('posts', 'App\Http\Controllers\PostController');

// Comments routes
Route::resource('posts.comments', 'App\Http\Controllers\CommentController')->shallow();
Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
