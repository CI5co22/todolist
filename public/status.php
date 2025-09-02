<?php
// Archivo de estado simple para verificar que todo funciona
header('Content-Type: application/json');

$response = [
    'status' => 'success',
    'message' => 'Railway está funcionando correctamente',
    'timestamp' => date('Y-m-d H:i:s'),
    'php_version' => PHP_VERSION,
    'environment' => 'railway',
    'database' => [
        'host' => isset($_ENV['MYSQLHOST']) ? 'configured' : 'not configured',
        'user' => isset($_ENV['MYSQLUSER']) ? 'configured' : 'not configured',
        'database' => isset($_ENV['MYSQL_DATABASE']) ? 'configured' : 'not configured',
        'port' => isset($_ENV['MYSQLPORT']) ? 'configured' : 'not configured'
    ]
];

echo json_encode($response, JSON_PRETTY_PRINT);
?>
