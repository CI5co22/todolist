<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Ruta temporal sin base de datos para testing
$routes->get('/', 'PrincipalSimple::index');
$routes->post('/', 'PrincipalSimple::index');

// Ruta original (comentada temporalmente)
// $routes->get('/', 'Principal::index');
// $routes->post('/', 'Principal::index');

// Rutas de prueba
$routes->get('/test', 'Test::index');
$routes->get('/simple', 'Test::simple');


