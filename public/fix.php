<?php
$host = $_ENV['MYSQLHOST'];
$user = $_ENV['MYSQLUSER'];
$pass = $_ENV['MYSQLPASSWORD'];
$db = $_ENV['MYSQL_DATABASE'];
$port = (int) $_ENV['MYSQLPORT'];

$conn = new mysqli($host, $user, $pass, $db, $port);

// 1. PRIMERO: Desactivar modo estricto temporalmente
$conn->query("SET SESSION sql_mode = ''");

// 2. BUSCAR registros problemáticos (solo verificar)
$result = $conn->query("SELECT id, fecha FROM tareas WHERE fecha = '0000-00-00 00:00:00' OR fecha IS NULL");
echo "📋 Registros problemáticos encontrados: " . $result->num_rows . "<br>";

// 3. CREAR TABLA TEMPORAL con datos buenos
$conn->query("CREATE TABLE tareas_temp LIKE tareas");

// 4. COPIAR solo registros con fechas válidas
$conn->query("INSERT INTO tareas_temp SELECT * FROM tareas WHERE fecha > '1000-01-01'");

// 5. ELIMINAR tabla original
$conn->query("DROP TABLE tareas");

// 6. RENOMBRAR temporal a original
$conn->query("RENAME TABLE tareas_temp TO tareas");

// 7. RESTAURAR modo estricto
$conn->query("SET SESSION sql_mode = 'STRICT_TRANS_TABLES'");

echo "✅ BASE DE DATOS COMPLETAMENTE LIMPIA<br>";
echo "🗑️ Registros con fechas inválidas eliminados<br>";
echo "📊 Solo quedaron registros con fechas válidas";

$conn->close();
?>