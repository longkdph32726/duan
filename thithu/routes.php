<?php
use Bramus\Router\Router;
use Khuat\Thithu\Controllers\Admin\DashBoardController;
use Khuat\Thithu\Controllers\Client\HomeController;

$router = new Router;

$router->get('/', HomeController::class. '@index');
$router->mount('/admin', function() use($router){
    $router->get('/',                       DashBoardController::class. '@index');
    $router->match('GET|POST','/{id}/update', DashBoardController::class. '@update');
    $router->match('GET|POST','/create',      DashBoardController::class. '@create');
    $router->get('{id}/delete',               DashBoardController::class. '@delete');
    // $router->mount('/users', function () use ($router) {
    //     $router->get('/',                           UserController::class . '@index');
    //     $router->get('/{id}/show',                  UserController::class . '@show');
    //     $router->get('/{id}/delete',                UserController::class . '@delete');
    //     $router->match('GET|POST', '/{id}/update',  UserController::class . '@update');
    //     $router->match('GET|POST', '/create',       UserController::class . '@create');
    // });
    

});

$router->run();