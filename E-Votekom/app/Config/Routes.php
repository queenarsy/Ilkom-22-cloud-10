<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
 $routes->get('/', 'Home::index');
 $routes->get('/login', 'Auth::login');
 $routes->post('/auth/loginProcess', 'Auth::loginProcess');
 $routes->get('/auth/logout', 'Auth::logout');
 $routes->get('/register', 'Auth::register');
 $routes->post('/auth/registerProcess', 'Auth::registerProcess');
 $routes->get('/admin/index', 'Admin::index');
 $routes->get('/user/index', 'User::index');
 $routes->get('polls/view', 'PollController::viewPolls');
 
 $routes->get('/admin/auth/logout', 'Admin\Auth::logout');