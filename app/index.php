<?php
require_once('autoloader.php');

$router =  new Router();
$router->get('/', 'UserController@form');
$router->post('/list', 'UserController@list');

$router->resolve($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);