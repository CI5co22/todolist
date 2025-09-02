<?php
/// DEBUG COMPLETO - AL PRINCIPIO DEL ARCHIVO
error_log("🎯 INDEX.PHP INICIADO - " . date('Y-m-d H:i:s'));

// 1. Verificar VENDOR
$vendorDir = __DIR__ . '/../vendor';
if (!is_dir($vendorDir)) {
    error_log("❌ VENDOR NO EXISTE: " . $vendorDir);
    die("ERROR: Vendor directory missing");
}
error_log("✅ VENDOR ENCONTRADO");

// 2. Verificar AUTOLOAD
$autoloadFile = $vendorDir . '/autoload.php';
if (!file_exists($autoloadFile)) {
    error_log("❌ AUTOLOAD.PHP NO EXISTE: " . $autoloadFile);
    die("ERROR: Autoload file missing");
}
error_log("✅ AUTOLOAD.PHP ENCONTRADO");

// 3. Cargar autoload
require $autoloadFile;
error_log("✅ AUTOLOAD CARGADO");

// 4. Verificar PATHS.PHP
$pathsFile = __DIR__ . '/../app/Config/Paths.php';
if (!file_exists($pathsFile)) {
    error_log("❌ PATHS.PHP NO EXISTE: " . $pathsFile);
    die("ERROR: Paths.php missing");
}
error_log("✅ PATHS.PHP ENCONTRADO");

// 5. Verificar SYSTEM DIRECTORY
$systemDir = __DIR__ . '/../system/Boot.php';
if (!file_exists($systemDir)) {
    error_log("❌ SYSTEM DIRECTORY NO EXISTE: " . $systemDir);
    die("ERROR: System directory missing");
}
error_log("✅ SYSTEM DIRECTORY ENCONTRADO");

error_log("🏁 TODO VERIFICADO - INICIANDO CODEIGNITER");



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
