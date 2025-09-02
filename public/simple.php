<?php
// Versión ultra-simple sin CodeIgniter
header('Content-Type: text/html; charset=utf-8');

echo "<!DOCTYPE html>";
echo "<html><head><title>Test Simple</title></head><body>";
echo "<h1>✅ PHP funciona correctamente!</h1>";
echo "<p><strong>Fecha:</strong> " . date('Y-m-d H:i:s') . "</p>";
echo "<p><strong>PHP Version:</strong> " . PHP_VERSION . "</p>";
echo "<p><strong>Directorio actual:</strong> " . getcwd() . "</p>";
echo "<p><strong>Variables de entorno PORT:</strong> " . ($_ENV['PORT'] ?? 'No definida') . "</p>";

// Verificar archivos
$files = [
    'index.php' => __DIR__ . '/index.php',
    'Paths.php' => __DIR__ . '/../app/Config/Paths.php',
    'Boot.php' => __DIR__ . '/../system/Boot.php'
];

echo "<h2>Verificación de archivos:</h2>";
foreach ($files as $name => $path) {
    if (file_exists($path)) {
        echo "<p>✅ {$name}: " . $path . "</p>";
    } else {
        echo "<p>❌ {$name}: NO ENCONTRADO en " . $path . "</p>";
    }
}

// Intentar cargar CodeIgniter paso a paso
echo "<h2>Prueba de CodeIgniter:</h2>";

try {
    echo "<p>1. Cargando Paths.php...</p>";
    $pathsPath = realpath(__DIR__ . '/../app/Config/Paths.php');
    if (!$pathsPath) {
        throw new Exception('Paths.php no encontrado');
    }
    require $pathsPath;
    echo "<p>✅ Paths.php cargado</p>";
    
    echo "<p>2. Creando objeto Paths...</p>";
    $paths = new Config\Paths();
    echo "<p>✅ Objeto Paths creado</p>";
    
    echo "<p>3. Verificando systemDirectory...</p>";
    echo "<p>System Directory: " . $paths->systemDirectory . "</p>";
    
    if (!file_exists($paths->systemDirectory . '/Boot.php')) {
        throw new Exception('Boot.php no encontrado en: ' . $paths->systemDirectory);
    }
    echo "<p>✅ Boot.php encontrado</p>";
    
    echo "<p>4. Cargando Boot.php...</p>";
    require $paths->systemDirectory . '/Boot.php';
    echo "<p>✅ Boot.php cargado</p>";
    
    echo "<p><strong>🎉 CodeIgniter se puede cargar correctamente!</strong></p>";
    
} catch (Exception $e) {
    echo "<p>❌ Error: " . $e->getMessage() . "</p>";
    echo "<p>Stack trace:</p><pre>" . $e->getTraceAsString() . "</pre>";
}

echo "</body></html>";
?>
