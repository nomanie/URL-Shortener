<?php

use Illuminate\Support\Facades\Auth;
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
    return view('home/pages/home');
})->name('home');
Route::get('/about', function () {
    return view('home/pages/about');
})->name('about');
Route::post('/url',"App\Http\Controllers\UrlController@generate")->name("url.generate");
Route::get('/url/{url}',"App\Http\Controllers\UrlController@showUrl")->name("url");
Route::delete('/url/{url}',"App\Http\Controllers\UrlController@delete")->name("url.delete");
Route::get('/links', "App\Http\Controllers\UserController@showLinks")->name('show.links');

Auth::routes();
Route::get('/logout',function(){
   Auth::logout();
   return view('/auth/login');
})->name('logout`');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('homee');
Route::middleware('admin')->group(function(){
    Route::get("/all/links",'App\Http\Controllers\AdminController@showAllLinks')->name("show.all.links");
    Route::get("/all/users",'App\Http\Controllers\AdminController@showUsers')->name("show.all.users");
    Route::delete('/user/delete/{id}','App\Http\Controllers\AdminController@deleteUser')->name("user.delete");
    Route::post('/user/add','App\Http\Controllers\AdminController@addUser')->name("user.add");
    Route::post('/user/edit/{id}','App\Http\Controllers\AdminController@editUser')->name("user.edit");
});
