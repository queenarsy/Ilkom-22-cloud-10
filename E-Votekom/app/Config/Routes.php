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


// Candidate routes
$routes->get('Candidates/create', 'CandidateController::create');
$routes->post('Candidates/store', 'CandidateController::store');
$routes->get('Candidates/index', 'CandidateController::index');
$routes->post('Candidates/vote/(:num)', 'Candidates::vote/$1');
$routes->get('user/candidates_view', 'User ::candidatesView');
$routes->get('admin/candidate_list', 'CandidateController::candidateList');
 
 $routes->get('Auth/logout', 'Auth::logout');
 $routes->get('Login/login', 'Home::index');
// $routes->get('candidates/create', 'Candidates::create');
//$routes->post('candidates/store', 'Candidates::store');
