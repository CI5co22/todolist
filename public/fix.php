<?php
// ... tu código de conexión ...

// Query alternativo más detallado
$result = $conn->query("SHOW CREATE TABLE tareas");

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo "<h3>📋 CREATE TABLE STATEMENT</h3>";
    echo "<pre>" . $row['Create Table'] . "</pre>";
} else {
    echo "No se pudo obtener la estructura de la tabla";
}

$conn->close();
?>