<?php
$nombre = $_POST['nombre'];
$marca  = $_POST['marca'];
$modelo = $_POST['modelo'];
$precio = $_POST['precio'];
$detalles = $_POST['detalles'];
$unidades = $_POST['unidades'];
$imagen   = $_POST['imagen']; // Solo guardamos el nombre de la imagen

// Conectar a la base de datos
@$link = new mysqli('localhost', 'root', 'SA_toan_123', 'marketzone');

// Verificar conexión
if ($link->connect_errno) {
    die('Falló la conexión: ' . $link->connect_error);
}

// Verificar si el producto ya existe (comparando nombre, marca y modelo)
$sql_check = "SELECT id FROM productos WHERE nombre = ? AND marca = ? AND modelo = ?";
$stmt = $link->prepare($sql_check);
$stmt->bind_param("sss", $nombre, $marca, $modelo);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    echo "El producto ya está registrado.";
} else {
    // Insertar datos en la tabla productos
    $sql_insert = "INSERT INTO productos (nombre, marca, modelo, precio, detalles, unidades, imagen) 
                   VALUES (?, ?, ?, ?, ?, ?, ?)"; 
    $stmt_insert = $link->prepare($sql_insert);
    $stmt_insert->bind_param("sssdsis", $nombre, $marca, $modelo, $precio, $detalles, $unidades, $imagen);

    if ($stmt_insert->execute()) {
        echo "Producto insertado con ID: " . $stmt_insert->insert_id;
    } else {
        echo "El producto no pudo ser insertado =(";
    }

    $stmt_insert->close();
}

$stmt->close();
$link->close();
?>
