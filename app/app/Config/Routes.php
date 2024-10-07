<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('edit', 'Home::edituser');

$routes->get('login', 'Home::login_page');
$routes->post('addstaff', 'Home::sendJsonData');

$routes->post('editstaff', 'Home::editJsonData');
