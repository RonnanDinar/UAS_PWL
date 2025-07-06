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


$routes->get('/admin/mobil', 'Mobil::admin');

$routes->get('/admin', 'Admin::index');
$routes->get('/user', 'User::index');

$routes->get('mobil/create', 'Mobil::create');
$routes->post('mobil/store', 'Mobil::store');

$routes->get('mobil/edit/(:num)', 'Mobil::edit/$1');
$routes->post('mobil/update/(:num)', 'Mobil::update/$1');

$routes->get('mobil/delete/(:num)', 'Mobil::delete/$1');

$routes->get('mobil/disewa', 'Mobil::disewa');

$routes->get('admin/penyewaan', 'Mobil::dataPenyewaan');
$routes->get('admin/penyewaan/edit/(:num)', 'Mobil::editPenyewaan/$1');

$routes->get('admin/user', 'Admin::manajemenUser');
$routes->get('admin/user/tambah', 'Admin::tambahUser');
$routes->post('admin/user/simpan', 'Admin::simpanUser');
$routes->get('admin/user/edit/(:num)', 'Admin::editUser/$1');
$routes->post('admin/user/update/(:num)', 'Admin::updateUser/$1');
$routes->get('admin/user/delete/(:num)', 'Admin::hapusUser/$1');

$routes->get('admin/penyewaan/nota/(:num)', 'Admin::notaPenyewaan/$1');

$routes->get('api/rental', 'ApiController::index');




