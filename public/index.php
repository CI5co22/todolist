<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set('log_errors', '1');
ini_set('error_log', __DIR__ . '/../php-errors.log');


echo "🔍 INICIANDO CODEIGNITER...";
error_log("🚀 STARTING CODEIGNITER");

$pathsFile = __DIR__ . '/../app/Config/Paths.php';
$systemDir = __DIR__ . '/../system/Boot.php';
// FIX PARA RAILWAY - PUERTO CORRECTO
$port = getenv('PORT') ?: '1111';
$_SERVER['SERVER_PORT'] = $port;
$_SERVER['HTTP_HOST'] = getenv('RAILWAY_STATIC_URL') ?: ('localhost:' . $port);

// ... el resto de tu código
/*
 *---------------------------------------------------------------
 * CHECK PHP VERSION
 *---------------------------------------------------------------
 */
$minPhpVersion = '8.1';
if (version_compare(PHP_VERSION, $minPhpVersion, '<')) {
    $message = sprintf(
        'Your PHP version must be %s or higher to run CodeIgniter. Current version: %s',
        $minPhpVersion,
        PHP_VERSION
    );

    header('HTTP/1.1 503 Service Unavailable.', true, 503);
    echo $message;
    exit(1);
}

/*
 *---------------------------------------------------------------
 * SET THE CURRENT DIRECTORY
 *---------------------------------------------------------------
 */
define('ENVIRONMENT', 'production');

// Path to the front controller (this file)
define('FCPATH', __DIR__ . DIRECTORY_SEPARATOR);

// Ensure the current directory is pointing to the front controller's directory
if (getcwd() . DIRECTORY_SEPARATOR !== FCPATH) {
    chdir(FCPATH);
}

/*
 *---------------------------------------------------------------
 * BOOTSTRAP THE APPLICATION
 *---------------------------------------------------------------
 */
require FCPATH . '/../app/Config/Paths.php';
$paths = new Config\Paths();
require $paths->systemDirectory . '/Boot.php';

/*
 *---------------------------------------------------------------
 * START CODEIGNITER
 *---------------------------------------------------------------
 */
$app = CodeIgniter\Boot::bootWeb($paths);

// NO EXIT, dejar que el proceso quede vivo para Railway
