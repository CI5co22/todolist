<?php
$port = getenv('PORT');
if (!$port) {
    fwrite(STDERR, "ERROR: No se recibió PORT desde Railway\n");
    exit(1);
}

$host = '0.0.0.0';
$command = "php -S {$host}:{$port} -t public public/index.php 2>&1";
echo "Command: {$command}\n";
passthru($command);
