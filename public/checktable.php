<?php
$host = $_ENV['MYSQLHOST'];
$user = $_ENV['MYSQLUSER'];
$pass = $_ENV['MYSQLPASSWORD'];
$db = $_ENV['MYSQL_DATABASE'];
$port = (int) $_ENV['MYSQLPORT'];

$conn = new mysqli($host, $user, $pass, $db, $port);

// Ver estructura de la tabla
$result = $conn->query("DESCRIBE tareas");
echo "<h3>Estructura de la tabla 'tareas':</h3>";
while ($row = $result->fetch_assoc()) {
    echo "{$row['Field']} - {$row['Type']} - {$row['Extra']}<br>";
}

$conn->close();
?>