<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::registrationapi');
$routes->get('dummy', 'FakerController::createFakeData');

$routes->resource('staff', ['controller' => 'Employee', 'only' => ['index', 'show', 'create', 'update']]);

