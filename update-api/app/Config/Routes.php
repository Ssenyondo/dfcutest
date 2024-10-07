<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Api::index');

$routes->resource('edit', ['controller' => 'Api', 'only' => [ 'updateData']]);
