<?php
echo "🟢 PHP funciona - Iniciando CodeIgniter...<br>";
error_log("DEBUG: Starting CodeIgniter");

// Intenta cargar CodeIgniter
try {
    $pathsPath = realpath(__DIR__ . '/../app/Config/Paths.php');
    if (!$pathsPath) {
        throw new Exception('Paths.php not found');
    }
    
    require $pathsPath;
    $paths = new Config\Paths();
    require rtrim($paths->systemDirectory, '/ ') . '/bootstrap.php';
    
    echo "🟢 CodeIgniter cargado exitosamente!";
    
} catch (Exception $e) {
    echo "❌ Error: " . $e->getMessage();
    error_log("CODEIGNITER_ERROR: " . $e->getMessage());
}
?>