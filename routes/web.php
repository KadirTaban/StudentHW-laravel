<?php

use App\Http\Controllers\Back\ArticleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Back Routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->middleware('isLogin')->group(function (){
    Route::get('giris','App\Http\Controllers\Back\AuthController@login')->name('login');
    Route::post('giris','App\Http\Controllers\Back\AuthController@loginPost')->name('login.post');
});

Route::prefix('admin')->name('admin.')->middleware('isAdmin')->group(function(){
    Route::get('panel','App\Http\Controllers\Back\Dashboard@index')->name('dashboard');
    Route::resource('odevler',ArticleController::class);
    Route::get('switch', 'App\Http\Controllers\Back\ArticleController@switch')->name('switch');
    Route::get('/destroy/{id}', 'App\Http\Controllers\Back\ArticleController@destroy')->name('destroy');
    Route::get('/kategoriler','App\Http\Controllers\Back\CategoryController@index')->name('category.index');
    Route::get('/message','App\Http\Controllers\Back\MessagesController@index')->name('message.index');
    Route::get('/message/post','App\Http\Controllers\Back\MessagesController@switch')->name('message.switch');
    Route::get('logout','App\Http\Controllers\Back\AuthController@logout')->name('logout');
});

/*
|--------------------------------------------------------------------------
| Front Routes
|--------------------------------------------------------------------------
*/

Route::get('/','App\Http\Controllers\Front\Homepage@index')->name('homepage');
Route::get('sayfa','App\Http\Controllers\Front\Homepage@index');
Route::get('/iletisim','App\Http\Controllers\Front\Homepage@contact')->name('contact');
Route::post('/iletisim','App\Http\Controllers\Front\Homepage@contactpost')->name('contact.post');
Route::post('/storemessage','App\Http\Controllers\Front\Homepage@storemessage')->name('storemessage');
Route::get('/kategori/{category}','App\Http\Controllers\Front\Homepage@category')->name('category');
Route::get('/{category}/{slug}','App\Http\Controllers\Front\Homepage@single')->name('single');
Route::get('/{sayfa}/','App\Http\Controllers\Front\Homepage@page')->name('page');

