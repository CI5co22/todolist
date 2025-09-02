<?php
// Script de inicio minimalista
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "=== MINIMAL STARTUP ===\n";
echo "PHP Version: " . PHP_VERSION . "\n";
echo "Working Directory: " . getcwd() . "\n";
echo "PORT: " . ($_ENV['PORT'] ?? 'undefined') . "\n";

$port = $_ENV['PORT'] ?? 8080;
$host = '0.0.0.0';

echo "Starting server on {$host}:{$port}\n";

// Comando simple sin router
$command = "php -S {$host}:{$port} -t public 2>&1";
echo "Command: {$command}\n";

passthru($command);
?>
