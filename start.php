<?php
// Script de inicio para Railway
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "🚀 Iniciando servidor PHP para Railway...\n";

$port = $_ENV['PORT'] ?? 8080;
$host = '0.0.0.0';

echo "📡 Servidor iniciando en {$host}:{$port}\n";
echo "📁 Directorio de trabajo: " . getcwd() . "\n";
echo "📂 Directorio público: " . __DIR__ . "/public\n";

// Verificar que los archivos necesarios existen
$requiredFiles = [
    'public/index.php',
    'app/Config/Paths.php',
    'system/Boot.php'
];

foreach ($requiredFiles as $file) {
    if (file_exists($file)) {
        echo "✅ {$file} existe\n";
    } else {
        echo "❌ {$file} NO existe\n";
    }
}

// Iniciar el servidor
$command = "php -S {$host}:{$port} -t public public/index.php";
echo "🔧 Comando: {$command}\n";

passthru($command);
?>
