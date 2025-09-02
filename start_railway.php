<?php
// Inicio simple para Railway
echo "=== RAILWAY STARTUP ===\n";

// Cargar configuración de entorno
require_once 'railway_env.php';

$port = $_ENV['PORT'] ?? $_SERVER['PORT'] ?? 8080;
$host = '0.0.0.0';

echo "Starting CodeIgniter server on {$host}:{$port}\n";

// Iniciar servidor PHP directamente
$command = "php -S {$host}:{$port} -t public public/index.php";
echo "Executing: {$command}\n";

passthru($command);
?>
