<?php
include_once __DIR__.'/database.php';

// Recibir el JSON enviado desde el frontend
$data = json_decode(file_get_contents("php://input"), true);

$id = $data['id'];
$nombre = $data['nombre'];
$marca = $data['marca'];
$modelo = $data['modelo'];
$precio = $data['precio'];
$detalles = $data['detalles'];
$unidades = $data['unidades'];
$imagen = $data['imagen'];

$query = "UPDATE productos SET 
    nombre = '$nombre', 
    marca = '$marca', 
    modelo = '$modelo', 
    precio = $precio, 
    detalles = '$detalles', 
    unidades = $unidades, 
    imagen = '$imagen' 
WHERE id = $id";

$result = $conexion->query($query);

if ($result) {
    echo json_encode(['status' => 'success', 'message' => 'Producto actualizado']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'No se pudo actualizar el producto']);
}
?>
