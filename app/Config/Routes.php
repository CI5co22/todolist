<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Principal::index');
$routes->post('/', 'Principal::index');

// Rutas de prueba
$routes->get('/test', 'Test::index');
$routes->get('/simple', 'Test::simple');
$routes->get('/dbtest', 'DbTest::index');


