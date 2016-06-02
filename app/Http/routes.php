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
    Route::post('/signin', 'Auth\AuthModileController@signin');
    Route::post('/signup', 'Auth\AuthModileController@signup');
    Route::post('/signout', 'Auth\AuthModilecontroller@signout');
    route::get('/validate/{id_user}/{validation_code}', 'Auth\AuthModileController@validateEmail');

    Route::group(['prefix' => 'courses'], function () {
        // return list of courses'titles
        Route::match(['get', 'post'], '/', 'CoursesController@getCourses');
        // upload specific course
        Route::get('/{id}', 'CoursesController@getCourses')->where('id', '[0-9]+');
    });

    Route::group(['prefix' => 'categories'], function () {
        // return list of categories'names
        Route::get('/', 'CategoryController@getCategories');
        // return specfic category
        Route::get('/{id}', 'CategoryController@getCategories')->where('id', '[0-9]+');

        // QCM group
        Route::group(['prefix' => '/{id_category}/training'], function () {
            // generate qcm that matches a categry
            Route::get('/', 'TrainingController@getTraining');
            // post user result
            //Route::post('/submit', 'TrainingController@submitResult');

        });
    });

    Route::group(['prefix' => 'exams'], function () {
        // return list of courses'titles
        Route::match(['get', 'post'], '/', 'ExamsController@getExams');
        // upload specific course
        Route::get('/{id}', 'ExamsController@getExams')->where('id', '[0-9]+');
    });
});

// user group
Route::group(['prefix' => 'user'], function () {
});
