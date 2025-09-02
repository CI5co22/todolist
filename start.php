<?php
// Script de inicio para Railway
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "=== RAILWAY STARTUP SCRIPT ===\n";
echo "PHP Version: " . PHP_VERSION . "\n";
echo "Working Directory: " . getcwd() . "\n";

// Obtener el puerto de Railway
$port = null;
if (isset($_ENV['PORT'])) {
    $port = $_ENV['PORT'];
    echo "PORT from ENV: {$port}\n";
} elseif (isset($_SERVER['PORT'])) {
    $port = $_SERVER['PORT'];
    echo "PORT from SERVER: {$port}\n";
} else {
    $port = 8080;
    echo "PORT default: {$port}\n";
}

echo "Environment: " . ($_ENV['CI_ENVIRONMENT'] ?? 'undefined') . "\n";

$host = '0.0.0.0';

echo "Starting CodeIgniter server on {$host}:{$port}\n";

// Comando para CodeIgniter
$command = "php -S {$host}:{$port} -t public public/index.php 2>&1";
echo "Command: {$command}\n";

passthru($command);
?>
