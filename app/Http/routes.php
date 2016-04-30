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
    return view('home');
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

	Route::get('/', 'HomeController@index');
	
	Route::get('home', 'HomeController@index');

	Route::resource('status','StatusController');
	


/*
	Route::get('/', 'HomeController@index');
	
	Route::get('home', 'HomeController@index');
	
	
	Route::controllers([
			'auth' => 'Auth\AuthController',
			'password' => 'Auth\PasswordController',
	]);
	
	//Route::get('articles','ArticlesController@index');
	//Route::get('articles/create','ArticlesController@create');
	//Route::get('articles/{id}','ArticlesController@show');
	//Route::post('articles','ArticlesController@store');
	
	Route::resource('articles','ArticlesController');
	Route::resource('subjects','SubjectsController');
	Route::resource('units','UnitsController');
	Route::resource('objectives','ObjectivesController');
	Route::resource('questions','QuestionsController');
	Route::resource('dependencies','DependenciesController');
	Route::get('subjects/{id}/units','SubjectsController@units');
	Route::get('units/{id}/objectives','UnitsController@objectives');
	Route::get('objectives/{id}/questions','ObjectivesController@questions');
	Route::get('objectives/{id}/dependencies','ObjectivesController@dependencies');
	//Route::get('objectives/remove_dependant','ObjectivesController@remove_dependant');
	Route::get('import','ImportController@index');
	Route::get('import/questions','ImportController@import_questions');
	Route::get('import/objectives','ImportController@import_objectives');
	Route::post('import/upload_questions', 'ImportController@process_questions_import');
	Route::post('import/upload_objectives', 'ImportController@process_objectives_import');
	*/