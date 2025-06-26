<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Auth::login');
$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::loginPost');
$routes->get('auth/register', 'Auth::register');
$routes->post('auth/registerSave', 'Auth::registerSave');
$routes->get('/logout', 'Auth::logout');

$routes->get('/mobil', 'Mobil::index');

$routes->get('/admin', 'Admin::index');
$routes->get('/user', 'User::index');
