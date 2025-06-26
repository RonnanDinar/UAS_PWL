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
$routes->get('mobil/sewa/(:num)', 'Mobil::sewa/$1');
$routes->post('mobil/sewa/submit', 'Mobil::submitSewa');
$routes->post('/mobil/sewa/submit', 'Mobil::submitSewa');

$routes->get('/admin/mobil', 'Mobil::admin');

$routes->get('/admin', 'Admin::index');
$routes->get('/user', 'User::index');
