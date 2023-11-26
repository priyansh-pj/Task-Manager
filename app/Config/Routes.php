<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

 // Authentication

$routes->get('/', 'Authentication::index');
$routes->get('login/', 'Authentication::index');
$routes->get('register/', 'Authentication::register');
$routes->get('logout/', 'Authentication::logout');

$routes->post('login_check/', 'Authentication::login_validate');
$routes->post('register/', 'Authentication::register_user');

// Dashboard
$routes->get('dashboard/','Dashboard::index');
// admin
$routes->get('ManageUsers/','Admin::manage_user');
$routes->get('UserTask/','Admin::user_task');
$routes->post('UpdateTaskStatus/(:any)','Dashboard::update_task_status/$1');

$routes->post('UpdateUserStatus/(:any)','Admin::update_user_status/$1');
$routes->post('UpdateAdminStatus/(:any)','Admin::update_admin_status/$1');

//user
$routes->get('Task/(:any)','Dashboard::task/$1');
$routes->post('Task/','Dashboard::create_task');
$routes->post('Task/Delete/(:any)','Dashboard::deleteTask/$1');




