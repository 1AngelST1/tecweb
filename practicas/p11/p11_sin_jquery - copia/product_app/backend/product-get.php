<?php
include_once __DIR__.'/database.php';

$id = $_GET['id']; // Cambiado de $_POST a $_GET

$query = "SELECT * FROM productos WHERE id = $id";
$result = $conexion->query($query);

if ($result && $result->num_rows > 0) {
    $producto = $result->fetch_assoc();
    echo json_encode($producto);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Producto no encontrado']);
}
?>
