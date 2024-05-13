<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use App\Http\Controllers\InboundStuffController;
use App\Models\InboundStuff;

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

$router->post('/login', 'AuthController@login');
$router->get('/logout', 'AuthController@logout');
$router->get('/profile', 'AuthController@me');


$router->post('/lending/store', 'LendingController@store');
$router->get('/lending/{id}', 'LendingController@show');
$router->delete('/lending/delete/{id}', 'LendingController@destroy');


$router->post('/restorations/{lending_id}', 'RestorationController@store');


$router->group(['prefix' => 'stuff'], function() use ($router)
{
    $router->get('/', 'stuffController@index');
    $router->post('/store', 'stuffController@store');
    $router->get('/trash', 'stuffController@trash');

    $router->get('/{id}', 'stuffController@show');
    $router->patch('/update/{id}', 'stuffController@update');
    $router->delete('/delete/{id}', 'stuffController@destroy');
    $router->get('/trash/restore/{id}', 'stuffController@restore');
    $router->get('trash/delete-permanent/{id}', 'stuffController@permanentDelete');
});

$router->group(['prefix' => 'user'], function() use ($router)
{
   $router->get('/', 'userController@index');
   $router->post('/postakun', 'userController@postakun');
   $router->get('/trash', 'userController@trash');

   $router->get('/{id}', 'userController@show');
   $router->patch('/update/{id}', 'userController@update');
   $router->delete('/delete/{id}', 'userController@destroy');
   $router->get('/trash/restore/{id}', 'userController@restore');
   $router->get('trash/delete-permanent/{id}', 'userController@permanentDelete');
});

$router->group(['prefix' => 'inbound-stuffs'], function() use ($router)
{
   $router->post('/store', 'inboundStuffController@store');
   $router->get('/trash', 'InboundStuffController@trash');

   $router->delete('/delete/{id}', 'InboundStuffController@destroy');
   $router->get('/trash/restore/{id}', 'InboundStuffController@restore');
   $router->get('/trash/permanent-delete/{id}', 'InboundStuffController@deletePermanent');
});