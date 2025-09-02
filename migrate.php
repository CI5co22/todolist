<?php
// Script para ejecutar migraciones en Railway
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "=== RAILWAY MIGRATION SCRIPT ===\n";
echo "PHP Version: " . PHP_VERSION . "\n";
echo "Working Directory: " . getcwd() . "\n";
echo "Time: " . date('Y-m-d H:i:s') . "\n";

// Verificar variables de entorno de base de datos
echo "\n=== DATABASE ENVIRONMENT CHECK ===\n";
$db_vars = ['MYSQLHOST', 'MYSQLUSER', 'MYSQLPASSWORD', 'MYSQL_DATABASE', 'MYSQLPORT'];
foreach ($db_vars as $var) {
    if (isset($_ENV[$var])) {
        echo "✅ {$var}: " . (strlen($_ENV[$var]) > 0 ? 'SET' : 'EMPTY') . "\n";
    } else {
        echo "❌ {$var}: NOT SET\n";
    }
}

// Intentar ejecutar la migración
echo "\n=== RUNNING MIGRATION ===\n";
try {
    // Cargar CodeIgniter
    define('ENVIRONMENT', 'railway');
    define('FCPATH', __DIR__ . DIRECTORY_SEPARATOR);
    
    require __DIR__ . '/app/Config/Paths.php';
    $paths = new Config\Paths();
    require $paths->systemDirectory . '/Boot.php';
    
    // Ejecutar migración
    $command = "php spark migrate";
    echo "Command: {$command}\n";
    passthru($command);
    
} catch (Exception $e) {
    echo "❌ Error: " . $e->getMessage() . "\n";
    echo "Stack trace:\n" . $e->getTraceAsString() . "\n";
}

echo "\n=== MIGRATION COMPLETE ===\n";
?>
