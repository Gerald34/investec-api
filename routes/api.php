<?php

/** @var Router $router */

use Laravel\Lumen\Routing\Router;

$router->group(['prefix' => 'api'], function() use ($router){
    $router->post('signin', 'UserController@login');

    $router->group(['middleware' => ['auth']],function() use ($router) {
        $router->group(['prefix' => 'profiles'], function() use($router) {
            $router->get('all', 'UserController@getAll');
            $router->get('{uid}', 'UserController@getbyUid');
        });
    });
});
