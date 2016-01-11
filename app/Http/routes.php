<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('home', ['scope' => 'Home']);
})->name('home');

Route::get('contact', function () {
    return view('contact', ['scope' => 'Contact']);
})->name('contact');

Route::get('committees', function () {
    $committees = [];
    $committees['IACCHAIR'] = \App\Committee::with('people')->find(1);
    $committees['IAC'] = \App\Committee::with('people')->find(2);
    $committees['LOCCHAIR'] = \App\Committee::with('people')->find(3);
    $committees['LOC'] = \App\Committee::with('people')->find(4);

    return view('committees', ['scope' => 'Committees', 'committees' => $committees]);
})->name('committees');

Route::post('update', function () {
    exec('git pull origin master', $output);

    return $output;
});

Route::group(['prefix' => 'announcements'], function () {
    Route::get('january_2016', 'AnnouncementController@january_2016');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
