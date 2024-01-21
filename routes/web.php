<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeController;


/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->get('/version', function () use ($router) {
    return $router->app->version();
});

$router->group([

    'prefix' => 'api'

], function ($router) {
    $router->post('login', 'AuthController@login');

});

$router->group(['middleware' => 'jwt','prefix' => 'api'
], function () use ($router) {
    $router->get('/getemployees', 'EmployeeController@index');
    $router->get('/getemployeesId/{id}', 'EmployeeController@findById');
    $router->post('/addemployees', 'EmployeeController@store');
    $router->put('/updateemployees/{id}', 'EmployeeController@update');
    $router->delete('/deleteemployees/{id}', 'EmployeeController@destroy');
});
