<?php

/**
 * Index Page
 * 
 * Created By Bruiz(@~codeHart~) 2022
 * 
 * PHP Version 7.4.8
 */


/**
 * Autoload
 */
require 'Vendor/autoload.php';

/**
 * Error
 */
error_reporting(E_ALL);
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');

/**
 * Session
 */ 
session_start();


$router = new Core\Router;

/**
 * Add routes
*/
// $router->add('', ['controller' => 'install', 'action' => 'index', 'namespace' => 'install']);
// $router->add('{controller}/{action}', ['namespace' => 'install']);
$router->add('', ['controller' => 'home', 'action' => 'index']);
$router->add('login', ['controller' => 'auth', 'action' => 'login']);
$router->add('register', ['controller' => 'auth', 'action' => 'register']);
$router->add('form', ['controller' => 'home', 'action' => 'test'])->post();
$router->add('{controller}/{action}')->get();
// $router->add

// Execute
$url = ltrim(rtrim($_SERVER['QUERY_STRING']));
$router->dispatch($url);