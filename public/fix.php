<?php
// Conectar a la base de datos
$host = $_ENV['MYSQLHOST'];
$user = $_ENV['MYSQLUSER'];
$pass = $_ENV['MYSQLPASSWORD'];
$db = $_ENV['MYSQL_DATABASE'];
$port = (int) $_ENV['MYSQLPORT'];

$conn = new mysqli($host, $user, $pass, $db, $port);

// SQL para agregar AUTO_INCREMENT al ID
$sql = "ALTER TABLE tareas 
        MODIFY COLUMN id INT AUTO_INCREMENT PRIMARY KEY,
        MODIFY COLUMN fecha DATETIME DEFAULT CURRENT_TIMESTAMP";

if ($conn->query($sql)) {
    echo "✅ TABLA REPARADA EXITOSAMENTE:<br>";
    echo "- AUTO_INCREMENT agregado al ID<br>";
    echo "- Tipo de fecha cambiado a DATETIME<br>";
    echo "- DEFAULT CURRENT_TIMESTAMP agregado<br>";
} else {
    echo "❌ ERROR: " . $conn->error;
}

// Mostrar nueva estructura
echo "<hr><h3>Nueva estructura:</h3>";
$result = $conn->query("DESCRIBE tareas");
while ($row = $result->fetch_assoc()) {
    echo "{$row['Field']} - {$row['Type']} - {$row['Extra']}<br>";
}

$conn->close();
?>