<?php
$host = 'bfhcqaz7dcnefult7yo9-mysql.services.clever-cloud.com';
$dbname = 'bfhcqaz7dcnefult7yo9';
$user = 'uhougzfja5rrs8sh';
$password = 'Ma0TA9vRq0YG3hEd7aZE';

// Crear conexión con las credenciales antes configuradas
$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT temperatura, humedad_externa, humedad_tierra 
        FROM web_riego 
        ORDER BY id DESC 
        LIMIT 1";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode([
        "temperature" => floatval($row["temperatura"]),
        "humidity" => floatval($row["humedad_tierra"]),
        "ambiente" => floatval($row["humedad_externa"])
    ]);
} else {
    echo json_encode([
        "temperature" => 0,
        "humidity" => 0,
        "ambiente" => 0
    ]);
}

$conn->close();
?>