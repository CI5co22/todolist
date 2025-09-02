<?php

/*
 |--------------------------------------------------------------------------
 | RAILWAY ENVIRONMENT CONFIGURATION
 |--------------------------------------------------------------------------
 | Configuración específica para el entorno de Railway
 */

// Habilitar logging de errores para debugging
error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
ini_set('log_errors', '1');
ini_set('error_log', '/tmp/php_errors.log');

// Configurar timezone
date_default_timezone_set('UTC');

// Configurar límites de memoria y tiempo
ini_set('memory_limit', '256M');
ini_set('max_execution_time', 30);

// Configurar sesiones para Railway
ini_set('session.save_path', '/tmp');
ini_set('session.gc_maxlifetime', 3600);

// Debug mode para Railway (temporal)
defined('CI_DEBUG') || define('CI_DEBUG', true);

// Log de inicio
error_log("Railway: CodeIgniter iniciando en " . date('Y-m-d H:i:s'));
error_log("Railway: PHP Version " . PHP_VERSION);
error_log("Railway: Working Directory " . getcwd());
error_log("Railway: Environment Variables: " . json_encode($_ENV));
?>
