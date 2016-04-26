<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'mobile'], function () {
    Route::post('/signin', 'Auth\AuthController@signin');
    Route::post('/signup', 'Auth\AuthController@signup');
    Route::post('/signout', 'Auth\Authcontroller@signout');

    Route::group(['prefix' => 'courses'], function () {
        // return list of courses'titles
        Route::match(['get', 'post'], '/', 'CoursesController@getCourses');
        // upload specific course
        Route::get('/{id}', 'CoursesController@getCourses')->where('id', '[0-9]+');
    });

    Route::group(['prefix' => 'category'], function () {
        // return list of categories'names
        Route::get('/', 'CategoryController@getCategory');
        // return specfic category
        Route::get('/{id}', 'CategoryController@getCategory')->where('id', '[0-9]+');

        // QCM group
        Route::group(['prefix' => '/{id_category}/qcm'], function () {
            // generate qcm that matches a categry
            Route::get('/', 'QCMController@generateQCM');
            // post user result
            Route::post('/submit', 'QCMContrller@submitResult');

        });
    });
});

// user group
Route::group(['preix' => 'user'], function () {
    
});
