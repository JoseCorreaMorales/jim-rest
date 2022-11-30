<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use Illuminate\Http\Client\Request;

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
$router->options('{all:.*}', ['middleware' => ['cors']], function () {
    return response()->json();
});


function resourse($router, $url, $model)
{
   // $router->options($url, $model . 'Controller@options');
    $router->get($url, $model . 'Controller@index');
   // $router->get($url . '/{id}', $model . 'Controller@show');
    $router->post($url, $model . 'Controller@store');
    $router->put($url . '/{id}', $model . 'Controller@update');
    $router->delete($url . '/{id}', $model . 'Controller@destroy');
}


//resourse($router, '/products', 'Product');

//$router->get('/products', 'ProductController@index');
//$router->post('/products', 'ProductController@store');

$router->group(['middleware' => 'auth'], function () use ($router) {
 
});

$router->group(['middleware' => 'cors'], function () use ($router) {
 resourse($router, '/products', 'Product');
 $router->get('/login', 'AuthController@login');
});

