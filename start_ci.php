<?php
// Script de inicio para CodeIgniter en Railway
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', '/tmp/ci_errors.log');

echo "=== CODEIGNITER RAILWAY STARTUP ===\n";
echo "PHP Version: " . PHP_VERSION . "\n";
echo "Working Directory: " . getcwd() . "\n";
echo "PORT: " . ($_ENV['PORT'] ?? 'undefined') . "\n";
echo "Time: " . date('Y-m-d H:i:s') . "\n";

// Verificar archivos críticos de CodeIgniter
$ci_files = [
    'public/index.php',
    'public/.htaccess',
    'app/Config/Paths.php',
    'app/Config/Routes.php',
    'system/Boot.php'
];

echo "\n=== CODEIGNITER FILE CHECK ===\n";
foreach ($ci_files as $file) {
    if (file_exists($file)) {
        echo "✅ {$file}\n";
    } else {
        echo "❌ {$file} - MISSING\n";
    }
}

// Verificar configuración de base de datos
echo "\n=== DATABASE CONFIG CHECK ===\n";
$db_config = 'app/Config/Database.php';
if (file_exists($db_config)) {
    echo "✅ Database config exists\n";
    // Verificar variables de entorno de DB
    $db_vars = ['MYSQLHOST', 'MYSQLUSER', 'MYSQLPASSWORD', 'MYSQL_DATABASE', 'MYSQLPORT'];
    foreach ($db_vars as $var) {
        if (isset($_ENV[$var])) {
            echo "✅ {$var}: " . (strlen($_ENV[$var]) > 0 ? 'SET' : 'EMPTY') . "\n";
        } else {
            echo "⚠️  {$var}: NOT SET\n";
        }
    }
} else {
    echo "❌ Database config missing\n";
}

$port = $_ENV['PORT'] ?? 8080;
$host = '0.0.0.0';

echo "\n=== STARTING CODEIGNITER SERVER ===\n";
echo "Host: {$host}\n";
echo "Port: {$port}\n";
echo "Document Root: " . __DIR__ . "/public\n";
echo "Router: " . __DIR__ . "/public/index.php\n";

// Comando del servidor para CodeIgniter
$command = "php -S {$host}:{$port} -t public public/index.php 2>&1";
echo "Command: {$command}\n";
echo "================================\n";

// Ejecutar el servidor
passthru($command);
?>
