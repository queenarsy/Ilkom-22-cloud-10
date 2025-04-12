<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Auth::login');
$routes->post('auth/login', 'Auth::login');
$routes->get('logout', 'Auth::logout');
