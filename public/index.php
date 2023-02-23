<?php

require_once __DIR__ . "/../vendor/autoload.php";

use App\Core\Application;

session_start();

$app = new Application(dirname(__DIR__));

$app->router->get('/', [App\Controllers\HomeController::class, 'home']);
$app->router->get('/auth/login/show', [App\Controllers\AuthController::class, 'showLogin']);
$app->router->post('/auth/login', [App\Controllers\AuthController::class, 'login']);
$app->router->get('/auth/register/show', [App\Controllers\AuthController::class, 'showRegister']);
$app->router->post('/auth/register', [App\Controllers\AuthController::class, 'register']);
$app->router->get('/auth/exit', [App\Controllers\AuthController::class, 'exit']);


$app->router->get('/users', [App\Controllers\UserController::class, 'index']);
$app->router->get('/users/active', [App\Controllers\UserController::class, 'active']);
$app->router->get('/users/deActive', [App\Controllers\UserController::class, 'deActive']);



$app->router->get('/groups/groupCreate' , [App\Controllers\GroupController::class, 'create']);
$app->router->get('/groups/groupCreate' , [App\Controllers\GroupController::class, 'index']);
$app->router->get('/groups/groupCreate' , [App\Controllers\GroupController::class, 'delete']);
$app->router->get('/groups/groupCreate' , [App\Controllers\GroupController::class, 'update']);
$app->router->get('/groups/groupCreate' , [App\Controllers\GroupController::class, 'store']);





$app->run();


