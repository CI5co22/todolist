<?php
// Archivo ultra-simple para verificar que PHP funciona
header('Content-Type: text/html; charset=utf-8');

echo "<!DOCTYPE html>";
echo "<html><head><title>Ultra Simple Test</title></head><body>";
echo "<h1>✅ PHP funciona correctamente!</h1>";
echo "<p><strong>Fecha:</strong> " . date('Y-m-d H:i:s') . "</p>";
echo "<p><strong>PHP Version:</strong> " . PHP_VERSION . "</p>";
echo "<p><strong>Directorio actual:</strong> " . getcwd() . "</p>";
echo "<p><strong>PORT:</strong> " . ($_ENV['PORT'] ?? 'undefined') . "</p>";

// Verificar variables de base de datos
echo "<h2>Variables de Base de Datos:</h2>";
$db_vars = ['MYSQLHOST', 'MYSQLUSER', 'MYSQLPASSWORD', 'MYSQL_DATABASE', 'MYSQLPORT'];
foreach ($db_vars as $var) {
    if (isset($_ENV[$var])) {
        echo "<p>✅ {$var}: " . (strlen($_ENV[$var]) > 0 ? 'SET' : 'EMPTY') . "</p>";
    } else {
        echo "<p>❌ {$var}: NOT SET</p>";
    }
}

// Intentar conectar a la base de datos directamente
echo "<h2>Prueba de Conexión a Base de Datos:</h2>";
try {
    $host = $_ENV['MYSQLHOST'] ?? 'localhost';
    $user = $_ENV['MYSQLUSER'] ?? 'root';
    $pass = $_ENV['MYSQLPASSWORD'] ?? '';
    $db = $_ENV['MYSQL_DATABASE'] ?? 'test';
    $port = $_ENV['MYSQLPORT'] ?? 3306;
    
    $pdo = new PDO("mysql:host={$host};port={$port};dbname={$db}", $user, $pass);
    echo "<p>✅ Conexión a base de datos exitosa</p>";
    
    // Verificar si la tabla tareas existe
    $stmt = $pdo->query("SHOW TABLES LIKE 'tareas'");
    if ($stmt->rowCount() > 0) {
        echo "<p>✅ Tabla 'tareas' existe</p>";
        
        // Contar registros
        $stmt = $pdo->query("SELECT COUNT(*) as count FROM tareas");
        $count = $stmt->fetch()['count'];
        echo "<p>📊 Registros en tabla tareas: {$count}</p>";
    } else {
        echo "<p>❌ Tabla 'tareas' NO existe</p>";
    }
    
} catch (Exception $e) {
    echo "<p>❌ Error de base de datos: " . $e->getMessage() . "</p>";
}

echo "</body></html>";
?>
