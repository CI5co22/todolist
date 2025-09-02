<?php
// Script de inicio alternativo con más logging
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', '/tmp/startup_errors.log');

echo "=== RAILWAY STARTUP DEBUG ===\n";
echo "PHP Version: " . PHP_VERSION . "\n";
echo "Working Directory: " . getcwd() . "\n";
echo "PORT: " . ($_ENV['PORT'] ?? 'undefined') . "\n";
echo "Time: " . date('Y-m-d H:i:s') . "\n";

// Verificar archivos críticos
$critical_files = [
    'public/basic.php',
    'public/index.php',
    'app/Config/Paths.php',
    'system/Boot.php'
];

echo "\n=== FILE CHECK ===\n";
foreach ($critical_files as $file) {
    if (file_exists($file)) {
        echo "✅ {$file}\n";
    } else {
        echo "❌ {$file} - MISSING\n";
    }
}

// Verificar permisos
echo "\n=== PERMISSIONS CHECK ===\n";
$dirs_to_check = ['public', 'app', 'system', 'writable'];
foreach ($dirs_to_check as $dir) {
    if (is_dir($dir)) {
        $perms = substr(sprintf('%o', fileperms($dir)), -4);
        echo "📁 {$dir}: {$perms}\n";
    } else {
        echo "❌ {$dir}: NOT A DIRECTORY\n";
    }
}

// Intentar diferentes configuraciones de servidor
$port = $_ENV['PORT'] ?? 8080;
$host = '0.0.0.0';

echo "\n=== STARTING SERVER ===\n";
echo "Host: {$host}\n";
echo "Port: {$port}\n";
echo "Document Root: " . __DIR__ . "/public\n";
echo "Router: " . __DIR__ . "/public/basic.php\n";

// Comando del servidor
$command = "php -S {$host}:{$port} -t public public/basic.php 2>&1";
echo "Command: {$command}\n";
echo "================================\n";

// Ejecutar el servidor
passthru($command);
?>
