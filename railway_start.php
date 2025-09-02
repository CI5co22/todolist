<?php
// Configuración específica para Railway
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Configurar variables de entorno para Railway
if (isset($_ENV['RAILWAY_ENVIRONMENT'])) {
    putenv("CI_ENVIRONMENT=production");
    putenv("RAILWAY_ENVIRONMENT=production");
}

// Configurar la URL base para Railway
if (isset($_ENV['RAILWAY_STATIC_URL'])) {
    putenv("APP_BASE_URL=" . $_ENV['RAILWAY_STATIC_URL']);
}

echo "=== RAILWAY STARTUP ===\n";
echo "PHP Version: " . PHP_VERSION . "\n";
echo "Working Directory: " . getcwd() . "\n";

// Obtener el puerto de múltiples fuentes posibles
$port = null;
if (isset($_ENV['PORT'])) {
    $port = $_ENV['PORT'];
    echo "PORT from ENV: {$port}\n";
} elseif (isset($_SERVER['PORT'])) {
    $port = $_SERVER['PORT'];
    echo "PORT from SERVER: {$port}\n";
} elseif (isset($_ENV['RAILWAY_PORT'])) {
    $port = $_ENV['RAILWAY_PORT'];
    echo "PORT from RAILWAY_PORT: {$port}\n";
} else {
    $port = 8080;
    echo "PORT default: {$port}\n";
}

echo "Environment: " . ($_ENV['CI_ENVIRONMENT'] ?? 'undefined') . "\n";

$host = '0.0.0.0';

echo "Starting CodeIgniter server on {$host}:{$port}\n";

// Comando para CodeIgniter con configuración específica para Railway
$command = "php -S {$host}:{$port} -t public public/index.php 2>&1";
echo "Command: {$command}\n";

passthru($command);
?>
