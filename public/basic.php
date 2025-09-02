<?php
// Archivo ultra-básico - solo PHP puro
echo "Hello World!";
echo "\nPHP Version: " . PHP_VERSION;
echo "\nTime: " . date('Y-m-d H:i:s');
echo "\nPort: " . ($_ENV['PORT'] ?? 'undefined');
echo "\nWorking Dir: " . getcwd();
?>
