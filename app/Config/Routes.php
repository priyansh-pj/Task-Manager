<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

 // Authentication

$routes->get('/', 'Authentication::index');
$routes->get('login/', 'Authentication::index');
$routes->get('logout/', 'Authentication::logout');

$routes->post('login_check/', 'Authentication::login_validate');
$routes->post('register/', 'Authentication::register_user');

// Dashboard

$routes->get('dashboard/','Dashboard::index');