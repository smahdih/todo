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



$app->router->get('/groups' , [App\Controllers\GroupController::class, 'index']);
$app->router->get('/groups/show' , [App\Controllers\GroupController::class, 'show']);
$app->router->post('/groups/addUser' , [App\Controllers\GroupController::class, 'addUser']);
$app->router->get('/groups/create' , [App\Controllers\GroupController::class, 'create']);
$app->router->post('/groups/store' , [App\Controllers\GroupController::class, 'store']);
$app->router->get('/groups/edit' , [App\Controllers\GroupController::class, 'edit']);
$app->router->post('/groups/update' , [App\Controllers\GroupController::class, 'update']);
$app->router->get('/groups/delete' , [App\Controllers\GroupController::class, 'delete']);

$app->router->post('/tasks/store' , [App\Controllers\TaskController::class, 'store']);




$app->run();


