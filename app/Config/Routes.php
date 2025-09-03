<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Ruta temporal sin base de datos para testing
$routes->get('/', 'Principal::index');
$routes->post('/', 'Principal::index');

// Ruta original (comentada temporalmente)
// $routes->get('/', 'Principal::index');
// $routes->post('/', 'Principal::index');




