<?php
echo "<!DOCTYPE html>";
echo "<html lang='es'>";
echo "<head><meta charset='UTF-8'><title>Productos desde PostgreSQL</title></head>";
echo "<body style='font-family: Arial; text-align: center; margin-top: 80px;'>";

echo "<h1>Lista de Productos</h1>";

$host = "192.168.56.11";   // IP de la máquina DB
$dbname = "tienda";
$user = "sebastian";
$password = "12345";

try {
    $conn = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM productos";
    $result = $conn->query($sql);

    echo "<table border='1' cellpadding='10' style='margin: 0 auto; border-collapse: collapse;'>";
    echo "<tr><th>ID</th><th>Nombre</th><th>Precio</th></tr>";

    foreach ($result as $row) {
        echo "<tr><td>{$row['id']}</td><td>{$row['nombre']}</td><td>\${$row['precio']}</td></tr>";
    }

    echo "</table>";
} catch (PDOException $e) {
    echo "<p>Error de conexión: " . $e->getMessage() . "</p>";
}

echo "<p style='margin-top: 20px;'>Desarrollado por: <strong>Sebastián Manrique</strong></p>";
echo "</body></html>";
?>
