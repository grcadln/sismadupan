<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::processLogin');
$routes->get('logout', 'AuthController::logout');

$routes->group('departemen', static function ($routes) {
    $routes->get('', 'Departemen::index');
    $routes->post('create', 'Departemen::store');
    $routes->get('delete/(:num)', 'Departemen::delete/$1');
    $routes->get('edit/(:num)', 'Departemen::edit/$1');
    $routes->post('update/(:num)', 'Departemen::update/$1');
});

$routes->group('disposisi', static function ($routes) {
    $routes->get('', 'Disposisi::index');
    $routes->get('tambah', 'Disposisi::store');
    $routes->post('create', 'Disposisi::store');
    $routes->get('delete/(:num)', 'Disposisi::delete/$1');
    $routes->get('edit/(:num)', 'Disposisi::edit/$1');
    $routes->post('update/(:num)', 'Disposisi::update/$1');
});

$routes->group('jsurat', static function ($routes) {
    $routes->get('', 'Jsurat::index');
    $routes->post('create', 'Jsurat::store');
    $routes->get('delete/(:num)', 'Jsurat::delete/$1');
    $routes->get('edit/(:num)', 'Jsurat::edit/$1');
    $routes->post('update/(:num)', 'Jsurat::update/$1');
});

$routes->group('lampiran', static function ($routes) {
    $routes->get('', 'Lampiran::index');
    $routes->post('create', 'Lampiran::store');
    $routes->get('delete/(:num)', 'Lampiran::delete/$1');
    $routes->get('edit/(:num)', 'Lampiran::edit/$1');
    $routes->post('update/(:num)', 'Lampiran::update/$1');
});

$routes->group('pengguna', static function ($routes) {
    $routes->get('', 'Pengguna::index');
    $routes->post('create', 'Pengguna::store');
    $routes->get('delete/(:num)', 'Pengguna::delete/$1');
    $routes->get('edit/(:num)', 'Pengguna::edit/$1');
    $routes->post('update/(:num)', 'Pengguna::update/$1');
});

$routes->group('skeluar', static function ($routes) {
    $routes->get('', 'Skeluar::index');
    $routes->post('create', 'Skeluar::store');
    $routes->get('delete/(:num)', 'Skeluar::delete/$1');
    $routes->get('edit/(:num)', 'Skeluar::edit/$1');
    $routes->post('update/(:num)', 'Skeluar::update/$1');
});

$routes->group('smasuk', static function ($routes) {
    $routes->get('', 'Smasuk::index');
    $routes->post('create', 'Smasuk::store');
    $routes->get('delete/(:num)', 'Smasuk::delete/$1');
    $routes->get('edit/(:num)', 'Smasuk::edit/$1');
    $routes->post('update/(:num)', 'Smasuk::update/$1');
});
