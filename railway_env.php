<?php
// Configuración de entorno para Railway
putenv("CI_ENVIRONMENT=production");
putenv("RAILWAY_ENVIRONMENT=production");

// Configurar la URL base si está disponible
if (isset($_ENV['RAILWAY_STATIC_URL'])) {
    putenv("APP_BASE_URL=" . $_ENV['RAILWAY_STATIC_URL']);
}

// Mostrar información del entorno
echo "=== RAILWAY ENVIRONMENT ===\n";
echo "CI_ENVIRONMENT: " . getenv('CI_ENVIRONMENT') . "\n";
echo "RAILWAY_ENVIRONMENT: " . getenv('RAILWAY_ENVIRONMENT') . "\n";
echo "PORT: " . ($_ENV['PORT'] ?? $_SERVER['PORT'] ?? 'undefined') . "\n";
echo "Working Directory: " . getcwd() . "\n";
echo "PHP Version: " . PHP_VERSION . "\n";
echo "========================\n";
?>
