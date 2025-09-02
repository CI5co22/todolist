<?php
// Archivo de prueba simple para verificar que PHP funciona
echo "✅ PHP está funcionando correctamente!<br>";
echo "Versión de PHP: " . PHP_VERSION . "<br>";
echo "Fecha actual: " . date('Y-m-d H:i:s') . "<br>";
echo "Directorio actual: " . getcwd() . "<br>";
echo "Variables de entorno PORT: " . ($_ENV['PORT'] ?? 'No definida') . "<br>";

// Verificar si CodeIgniter puede cargar
try {
    $pathsPath = realpath(__DIR__ . '/../app/Config/Paths.php');
    if ($pathsPath) {
        echo "✅ Paths.php encontrado: " . $pathsPath . "<br>";
    } else {
        echo "❌ Paths.php no encontrado<br>";
    }
} catch (Exception $e) {
    echo "❌ Error: " . $e->getMessage() . "<br>";
}
?>
