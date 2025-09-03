<?php
$host = $_ENV['MYSQLHOST'];
$user = $_ENV['MYSQLUSER'];
$pass = $_ENV['MYSQLPASSWORD'];
$db = $_ENV['MYSQL_DATABASE'];
$port = (int) $_ENV['MYSQLPORT'];

$conn = new mysqli($host, $user, $pass, $db, $port);

// SOLUCIÓN: Actualizar fechas inválidas a fecha actual
$conn->query("UPDATE tareas SET fecha = NOW() WHERE fecha = '0000-00-00 00:00:00' OR fecha LIKE '%-0001%' OR fecha IS NULL");

echo "✅ FECHAS INVÁLIDAS ACTUALIZADAS A FECHA ACTUAL";
$conn->close();
?>