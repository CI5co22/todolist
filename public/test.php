<?php
echo "✅ PHP está funcionando<br>";
echo "✅ Versión PHP: " . PHP_VERSION . "<br>";
echo "✅ Directorio: " . __DIR__ . "<br>";

// Test básico de CodeIgniter
if (file_exists('../app/Config/Paths.php')) {
    echo "✅ Paths.php encontrado<br>";
} else {
    echo "❌ Paths.php NO encontrado<br>";
}