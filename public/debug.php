<?php
// Archivo de diagnóstico con captura de errores
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', '/tmp/php_errors.log');

// Función para capturar errores
function errorHandler($severity, $message, $file, $line) {
    echo "<div style='color: red; border: 1px solid red; padding: 10px; margin: 10px;'>";
    echo "<strong>ERROR:</strong> $message<br>";
    echo "<strong>File:</strong> $file<br>";
    echo "<strong>Line:</strong> $line<br>";
    echo "</div>";
    return true;
}

set_error_handler('errorHandler');

// Función para capturar errores fatales
register_shutdown_function(function() {
    $error = error_get_last();
    if ($error && in_array($error['type'], [E_ERROR, E_PARSE, E_CORE_ERROR, E_COMPILE_ERROR])) {
        echo "<div style='color: red; border: 2px solid red; padding: 15px; margin: 10px; background: #ffe6e6;'>";
        echo "<h3>FATAL ERROR:</h3>";
        echo "<strong>Type:</strong> " . $error['type'] . "<br>";
        echo "<strong>Message:</strong> " . $error['message'] . "<br>";
        echo "<strong>File:</strong> " . $error['file'] . "<br>";
        echo "<strong>Line:</strong> " . $error['line'] . "<br>";
        echo "</div>";
    }
});

echo "<!DOCTYPE html>";
echo "<html><head><title>Debug Railway</title></head><body>";
echo "<h1>🔍 Diagnóstico de Railway</h1>";

echo "<h2>Información del Sistema:</h2>";
echo "<p><strong>PHP Version:</strong> " . PHP_VERSION . "</p>";
echo "<p><strong>Directorio actual:</strong> " . getcwd() . "</p>";
echo "<p><strong>PORT:</strong> " . ($_ENV['PORT'] ?? 'No definida') . "</p>";

echo "<h2>Prueba de CodeIgniter:</h2>";

try {
    echo "<p>Intentando cargar CodeIgniter...</p>";
    
    // Definir constantes necesarias
    define('ENVIRONMENT', 'railway');
    define('FCPATH', __DIR__ . DIRECTORY_SEPARATOR);
    
    echo "<p>✅ Constantes definidas</p>";
    
    // Cargar Paths
    $pathsPath = realpath(__DIR__ . '/../app/Config/Paths.php');
    if (!$pathsPath) {
        throw new Exception('Paths.php no encontrado');
    }
    require $pathsPath;
    echo "<p>✅ Paths.php cargado</p>";
    
    $paths = new Config\Paths();
    echo "<p>✅ Objeto Paths creado</p>";
    
    // Cargar Boot
    require $paths->systemDirectory . '/Boot.php';
    echo "<p>✅ Boot.php cargado</p>";
    
    echo "<p><strong>🎉 CodeIgniter cargado exitosamente!</strong></p>";
    
    // Intentar ejecutar CodeIgniter
    echo "<p>Intentando ejecutar CodeIgniter...</p>";
    $result = CodeIgniter\Boot::bootWeb($paths);
    echo "<p>✅ CodeIgniter ejecutado: " . $result . "</p>";
    
} catch (Exception $e) {
    echo "<div style='color: red; border: 1px solid red; padding: 10px; margin: 10px;'>";
    echo "<h3>EXCEPCIÓN:</h3>";
    echo "<p><strong>Mensaje:</strong> " . $e->getMessage() . "</p>";
    echo "<p><strong>Archivo:</strong> " . $e->getFile() . "</p>";
    echo "<p><strong>Línea:</strong> " . $e->getLine() . "</p>";
    echo "<p><strong>Stack trace:</strong></p>";
    echo "<pre>" . $e->getTraceAsString() . "</pre>";
    echo "</div>";
} catch (Error $e) {
    echo "<div style='color: red; border: 1px solid red; padding: 10px; margin: 10px;'>";
    echo "<h3>ERROR FATAL:</h3>";
    echo "<p><strong>Mensaje:</strong> " . $e->getMessage() . "</p>";
    echo "<p><strong>Archivo:</strong> " . $e->getFile() . "</p>";
    echo "<p><strong>Línea:</strong> " . $e->getLine() . "</p>";
    echo "<p><strong>Stack trace:</strong></p>";
    echo "<pre>" . $e->getTraceAsString() . "</pre>";
    echo "</div>";
}

echo "</body></html>";
?>