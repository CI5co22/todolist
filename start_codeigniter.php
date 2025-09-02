<?php
$port = getenv('PORT');
if (!$port) {
    fwrite(STDERR, "ERROR: No se recibió PORT desde Railway\n");
    exit(1);
}

$host = '0.0.0.0';

echo "=== CODEIGNITER STARTUP ===\n";
echo "PHP Version: " . PHP_VERSION . "\n";
echo "Working Directory: " . getcwd() . "\n";
echo "ENV PORT: " . $port . "\n";

$command = "php -S {$host}:{$port} -t public public/index.php";
echo "Ejecutando: {$command}\n";

passthru($command);
