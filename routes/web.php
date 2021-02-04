<?php
 
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->post('/auth/login', 'AuthController@postLogin');


$router->group(['prefix' => 'user'], function () use ($router) {
	$router->get('', 'UserController@index');
	$router->get('/{id}', 'UserController@show');
	$router->post('', 'UserController@create');
	$router->delete('/{id}', 'UserController@delete');
	$router->put('/{id}', 'UserController@update');
});

$router->group(['prefix' => 'article'], function () use ($router) {
	$router->get('', 'ArticleController@index');
	$router->get('/{id}', 'ArticleController@show');
	$router->post('', 'ArticleController@create');
	$router->delete('/{id}', 'ArticleController@delete');
	$router->put('/{id}', 'ArticleController@update');
});

$router->group(['prefix' => 'review'], function () use ($router) {
	$router->get('', 'ReviewController@index');
	$router->get('/{id}', 'ReviewController@show');
	$router->post('', 'ReviewController@create');
	$router->delete('/{id}', 'ReviewController@delete');
	$router->put('/{id}', 'ReviewController@update');
});

$router->group(['prefix' => 'news'], function () use ($router) {
	$router->get('', 'NewsController@index');
	$router->get('/{id}', 'NewsController@show');
	$router->post('', 'NewsController@create');
	$router->delete('/{id}', 'NewsController@delete');
	$router->put('/{id}', 'NewsController@update');
});
$router->group(['prefix' => 'category'], function () use ($router) {
	$router->get('', 'CategoryController@index');
	$router->get('/{id}', 'CategoryController@show');
	$router->post('', 'CategoryController@create');
	$router->delete('/{id}', 'CategoryController@delete');
	$router->put('/{id}', 'CategoryController@update');
});
$router->group(['prefix' => 'game_category'], function () use ($router) {
	$router->get('', 'GameCategoryController@index');
	$router->get('/{id}', 'GameCategoryController@show');
	$router->post('', 'GameCategoryController@create');
	$router->delete('/{id}', 'GameCategoryController@delete');
	$router->put('/{id}', 'GameCategoryController@update');
});
$router->group(['prefix' => 'game_platform'], function () use ($router) {
	$router->get('', 'GamePlatformController@index');
	$router->get('/{id}', 'GamePlatformController@show');
	$router->post('', 'GamePlatformController@create');
	$router->delete('/{id}', 'GamePlatformController@delete');
	$router->put('/{id}', 'GamePlatformController@update');
});
$router->group(['prefix' => 'platform'], function () use ($router) {
	$router->get('', 'PlatformController@index');
	$router->get('/{id}', 'PlatformController@show');
	$router->post('', 'PlatformController@create');
	$router->delete('/{id}', 'PlatformController@delete');
	$router->put('/{id}', 'PlatformController@update');
});

/*
	$router->get('index', 'IndexController@index');
	$router->get('article', 'ArticleController@show');
	$router->get('review', 'ReviewController@show');
	$router->get('application', 'ApplicationController@show');
	$router->get('news', 'NewsController@show');
	$router->get('category', 'CategoryController@show');
	$router->get('platform', 'PlatformController@show');
	$router->get('controller', 'Controller');
*/
