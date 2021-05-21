<?php

use App\Events\DataEvent;
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
Route::get('chart', 'App\Http\Controllers\ChartController@index')->name('chart');
Route::get('add', 'App\Http\Controllers\ChartController@add')->name('add');
Route::post('add', 'App\Http\Controllers\ChartController@store')->name('store');

Route::get('/notification', function () {
    return view('notification');
});

Route::get('/send', function () {
    return view('send');
});
Route::post('/send', function () {
    $text = request()->text;
    event(new DataEvent($text));
});

// Route::get('send', 'App\Http\Controllers\PusherNotificationController@notification');