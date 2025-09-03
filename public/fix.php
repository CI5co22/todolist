<?php
$host = $_ENV['MYSQLHOST'];
$user = $_ENV['MYSQLUSER'];
$pass = $_ENV['MYSQLPASSWORD'];
$db = $_ENV['MYSQL_DATABASE'];
$port = (int) $_ENV['MYSQLPORT'];

$conn = new mysqli($host, $user, $pass, $db, $port);

// SOLUCIÓN NUCLEAR: Eliminar TODOS los registros existentes
$conn->query("DELETE FROM tareas");

// REINICIAR el autoincrement
$conn->query("ALTER TABLE tareas AUTO_INCREMENT = 1");

echo "💥 BASE DE DATOS COMPLETAMENTE LIMPIA<br>";
echo "🗑️ TODOS los registros eliminados<br>";
echo "🔁 Auto increment reiniciado a 1";

$conn->close();
?>