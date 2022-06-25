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

//* User panel - start

Route::get('/', function () {
    return view('user.home');
});

Route::get('/app', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/app', [App\Http\Controllers\HomeController::class, 'like'])->name('home');

Route::get('/app/chat/{id}', [App\Http\Controllers\ChatController::class, 'showChat'])->name('chat');
Route::post('/app/chat/{id}', [App\Http\Controllers\ChatController::class, 'sendMessage'])->name('chat');

Auth::routes();

//* User panel - end

//* Admin panel - start


Route::get('/admin', 'App\Http\Controllers\AdminController@login');
Route::post('/admin', 'App\Http\Controllers\AdminController@login');


Route::get('admin/dashboard', 'App\Http\Controllers\AdminController@dashboard');

Route::get('admin/register', 'App\Http\Controllers\AdminController@register')->name('admin.register');
Route::post('admin/register', 'App\Http\Controllers\AdminController@register');


Route::get('admin/tables', 'App\Http\Controllers\AdminController@tables');
Route::get('admin/tables/deleteuser/{id}', 'App\Http\Controllers\AdminController@deleteUser');
Route::get('admin/tables/edituser/{id}', 'App\Http\Controllers\AdminController@editUser');
Route::post('admin/tables/edituser/{id}', 'App\Http\Controllers\AdminController@editUser');

Route::get('admin/settings', 'App\Http\Controllers\AdminController@settings');

Route::get('change-password', 'App\Http\Controllers\ChangePasswordController@index');
Route::post('change-password', 'App\Http\Controllers\ChangePasswordController@store')->name('change.password');


Route::get('/admin/logout', 'App\Http\Controllers\AdminController@logout');

//* Admin panel - end
