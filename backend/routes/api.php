<?php

use Illuminate\Http\Request;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', 'API\RegisterController@register');
Route::post('login', 'API\RegisterController@login');
   
Route::middleware('auth:api')->group( function () {
});
//User
Route::get('user', 'Api\UserController@getUser');
Route::put('user/{id}', 'Api\UserController@updatedUser');
Route::post('user-updated-photo/{id}', 'Api\UserController@updatedPhoto');
Route::put('user-updated-cv/{id}', 'Api\UserController@updatedCV');
//Languages
Route::get('languages', 'Api\LanguagesController@getAllLanguage');
Route::get('languages/{id}', 'Api\LanguagesController@getLanguage');
Route::post('languages', 'Api\LanguagesController@storeLenguage');
Route::put('languages/{id}', 'Api\LanguagesController@editLanguage');
Route::delete('languages/{id}', 'Api\LanguagesController@destroyLanguage');
//Technologies
Route::get('technology/{id}', 'Api\TechnolgiesController@getTechnolgy');
Route::get('technologies', 'Api\TechnolgiesController@getAllTechnolgy');
Route::post('technology', 'Api\TechnolgiesController@storeTechnolgy');
Route::post('technology/{id}', 'Api\TechnolgiesController@editTechnolgy');
Route::delete('technology/{id}', 'Api\TechnolgiesController@destroyTechnolgy');
Route::post('technology-updated-image/{id}', 'Api\TechnolgiesController@updatedImage');
//Projects
Route::get('projects', 'Api\ProjectsController@getAllProject');
Route::get('project/{id}', 'Api\ProjectsController@getProject');
Route::post('project', 'Api\ProjectsController@storeProject');
Route::post('project/{id}', 'Api\ProjectsController@editProject');
Route::delete('projects/{id}', 'Api\ProjectsController@destroyProject');
Route::post('projects-updated-images/{id}', 'Api\ProjectsController@updatedImagesProject');
Route::post('project-updated-order-images/{id}', 'Api\ProjectsController@updatedOrderImages');
Route::post('project-updated-poster/{id}', 'Api\ProjectsController@updatedPoster');

