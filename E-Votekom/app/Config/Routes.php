<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Auth::login');
$routes->get('auth/login', 'Auth::login');
$routes->post('auth/login', 'Auth::login');
$routes->get('logout', 'Auth::logout');

$routes->get('dashboard/admin_dashboard', 'Dashboard::admin_dashboard'); // Rute untuk dashboard admin
$routes->get('dashboard/user_dashboard', 'Dashboard::user_dashboard'); // Rute untuk dashboard user
