<?php

$router->group(['prefix' => 'ping'], function ($router)
{
    $router->get('/', 'ExampleController@pong');
    $router->get('/test', 'ExampleController@test');
});
