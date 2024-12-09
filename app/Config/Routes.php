<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Sepeda::index');
$routes->get('/register', 'User::index');
$routes->post('/register', 'User::store');
$routes->get('/login', 'User::indexlogin');
$routes->post('/login', 'User::login');
$routes->get('/logout', 'User::logout');
$routes->get('/sepeda/(:num)', 'Sepeda::get/$1');
