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

//Route::get('/', function () {
//    return view('welcome');
//});




Route::namespace('App\Http\Controllers\Frontend')->group(function () {
    Route::get('/anasayfa','DefaultController@index')->name('home.Index');

    //BLOG
    Route::get('/blog','BlogController@index')->name('blog.Index');
    Route::get('/blog/{slug}','BlogController@detail')->name('blog.Detail');

    //PAGE
    Route::get('/page/{slug}','PageController@detail')->name('page.Detail');

    //CONTACT
    Route::get('/contact','DefaultController@contact')->name('contact.Detail');
    Route::post('/contact','DefaultController@sendMail');

    //search
    Route::get('/search','SearchController@index')->name('search.Index');
});





Route::namespace('App\Http\Controllers\Backend')->group(function (){
    Route::get('/','DefaultController@login')->name('admin.Login')->middleware('CheckLogin');;
    Route::prefix('admin')->group(function (){
        Route::get('/','DefaultController@index')->name('admin.Index')->middleware('admin');
        Route::get('/logout','DefaultController@logout')->name('admin.Logout');
        Route::post('/login','DefaultController@authenticate')->name('admin.Authenticate');
    });
});





Route::namespace('App\Http\Controllers\Backend')->group(function (){
    Route::middleware(['admin'])->group(function (){
        Route::prefix('admin/settings')->group(function (){
            Route::get('/','SettingsController@index')->name('settings.Index');
            Route::post('','SettingsController@sortable')->name('settings.Sortable');
            Route::get('/delete/{id}','SettingsController@destroy');
            Route::get('/edit/{id}','SettingsController@edit')->name('settings.Edit');
            Route::post('/update/{id}','SettingsController@update')->name('settings.Update');
        });
    });
});





Route::namespace('App\Http\Controllers\Backend')->group(function (){
    Route::middleware(['admin'])->group(function (){
        Route::prefix('admin')->group(function (){
            //blog
            Route::post('/blog/sortable','BlogController@sortable')->name('blog.Sortable');
            Route::resource('blog','BlogController');

            //pages
            Route::post('/page/sortable', 'PageController@sortable')->name('page.Sortable');
            Route::resource('page', 'PageController');

            //slider
            Route::post('/slider/sortable','SliderController@sortable')->name('slider.Sortable');
            Route::resource('slider','SliderController');

            //user
            Route::post('/user/sortable','UserController@sortable')->name('user.Sortable');
            Route::get('/user/import','UserController@import')->name('user.import');
            Route::post('/user/import','UserController@importStore')->name('user.import.store');
            Route::resource('user','UserController');


        });
    });
});





Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
