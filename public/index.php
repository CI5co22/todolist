<?php
// DEBUG EXTREMO - ELIMINA CODEIGNITER TEMPORALMENTE
error_log("🎯 PHP INICIADO - " . date('Y-m-d H:i:s'));

// Verificar variables de entorno
$port = getenv('PORT') ?: '8080';
error_log("PORT: " . $port);

// Verificar archivos básicos
error_log("Vendor exists: " . (is_dir('../vendor') ? 'YES' : 'NO'));
error_log("Autoload exists: " . (file_exists('../vendor/autoload.php') ? 'YES' : 'NO'));

// Simular una respuesta exitosa
http_response_code(200);
echo "✅ PHP FUNCIONANDO - RAILWAY OK";
error_log("✅ PHP RESPONSE COMPLETED");
?>