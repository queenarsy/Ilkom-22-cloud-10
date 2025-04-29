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
 $routes->get('polls/create', 'PollController::create');
$routes->post('polls/store', 'PollController::store');
$routes->post('candidates/store', 'CandidateController::store');
$routes->get('candidates/create', 'CandidateController::create');
$routes->get('candidates/index', 'CandidateController::index');
$routes->post('candidates/vote/(:num)', 'CandidateController::vote/$1');
$routes->get('user/candidates_view', 'User::candidatesView');

 
 $routes->get('Auth/logout', 'Auth::logout');
 $routes->get('Login/login', 'Home::index');
 $routes->get('candidates/create', 'Candidates::create');
$routes->post('candidates/store', 'Candidates::store');
