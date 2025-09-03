<?php
$host = $_ENV['MYSQLHOST'];
$user = $_ENV['MYSQLUSER'];
$pass = $_ENV['MYSQLPASSWORD'];
$db = $_ENV['MYSQL_DATABASE'];
$port = (int) $_ENV['MYSQLPORT'];

$conn = new mysqli($host, $user, $pass, $db, $port);

// ELIMINAR registros con fechas inválidas
$conn->query("DELETE FROM tareas WHERE fecha = '0000-00-00 00:00:00' OR fecha LIKE '%-0001%'");

echo "✅ REGISTROS CON FECHAS INVÁLIDAS ELIMINADOS";
$conn->close();
?>