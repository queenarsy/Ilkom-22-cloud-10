<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Auth::login');
$routes->get('auth/login', 'Auth::login');
$routes->post('auth/login', 'Auth::login');
$routes->get('logout', 'Auth::logout');

$routes->get('dashboard/admin_dashboard', 'Dashboard::admin_dashboard'); // Route untuk admin dashboard
$routes->get('dashboard/user_dashboard', 'Dashboard::user_dashboard'); // Route untuk user dashboard
