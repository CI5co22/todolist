<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/test', 'Principal::test');

$routes->get('/admin','admin\Dashboard::index');
$routes->get('admin/productos','admin\Productos::index');
$routes->get('admin/productos/agregar','admin\Productos::agregar');


$routes->get('/', 'Principal::index');
$routes->get('/categoria/(:num)', 'Principal::cat/$1');

