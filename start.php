<?php
// Script de inicio para Railway
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "=== RAILWAY STARTUP SCRIPT ===\n";
echo "PHP Version: " . PHP_VERSION . "\n";
echo "Working Directory: " . getcwd() . "\n";

// Mostrar todas las variables de entorno disponibles
echo "=== VARIABLES DE ENTORNO DISPONIBLES ===\n";
foreach ($_ENV as $key => $value) {
    echo "ENV[{$key}] = {$value}\n";
}

echo "\n=== VARIABLES DE SERVIDOR DISPONIBLES ===\n";
foreach ($_SERVER as $key => $value) {
    if (strpos($key, 'PORT') !== false || strpos($key, 'RAILWAY') !== false) {
        echo "SERVER[{$key}] = {$value}\n";
    }
}

// Obtener el puerto de Railway
$port = null;
if (isset($_ENV['PORT'])) {
    $port = $_ENV['PORT'];
    echo "\nPORT from ENV: {$port}\n";
} elseif (isset($_SERVER['PORT'])) {
    $port = $_SERVER['PORT'];
    echo "\nPORT from SERVER: {$port}\n";
} elseif (isset($_ENV['RAILWAY_PORT'])) {
    $port = $_ENV['RAILWAY_PORT'];
    echo "\nPORT from RAILWAY_PORT: {$port}\n";
} else {
    $port = 8080;
    echo "\nPORT default: {$port} (NO CONFIGURADO EN RAILWAY)\n";
}

echo "Environment: " . ($_ENV['CI_ENVIRONMENT'] ?? 'undefined') . "\n";

$host = '0.0.0.0';

echo "Starting CodeIgniter server on {$host}:{$port}\n";

// Comando para CodeIgniter
$command = "php -S {$host}:{$port} -t public public/index.php 2>&1";
echo "Command: {$command}\n";

passthru($command);
?>
