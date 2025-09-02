<?php
// DEBUG: Verificar si los archivos existen
error_log("🟢 Index.php accessed");
$pathsFile = __DIR__ . '/../app/Config/Paths.php';
$bootFile = __DIR__ . '/../system/Boot.php';

if (!file_exists($pathsFile)) {
    error_log("❌ PATHS.PHP NOT FOUND: " . $pathsFile);
    die("ERROR: Paths.php not found");
}

if (!file_exists($bootFile)) {
    error_log("❌ BOOT.PHP NOT FOUND: " . $bootFile);
    die("ERROR: Boot.php not found");
}

error_log("✅ All files found");

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
