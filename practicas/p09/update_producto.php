<?php
// Conectar a la base de datos
$link = new mysqli('localhost', 'root', 'SA_toan_123', 'marketzone');

if ($link->connect_errno) {
    die('<script>alert("Falló la conexión: '.$link->connect_error.'");</script>');
}

// Obtener el ID del producto
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Cargar datos del producto si se recibe un ID
if ($id > 0) {
    $stmt = $link->prepare("SELECT * FROM productos WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $producto = $result->fetch_assoc();
    $stmt->close();
} else {
    die('<script>alert("ID de producto no válido"); window.location.href="formulario_productos_v3.php";</script>');
}

// Si el formulario se envía, actualizar el producto
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $precio = $_POST['precio'];
    $detalles = $_POST['detalles'];
    $unidades = $_POST['unidades'];
    $imagen = $_POST['imagen'];

    $stmt = $link->prepare("UPDATE productos SET nombre=?, marca=?, modelo=?, precio=?, detalles=?, unidades=?, imagen=? WHERE id=?");
    $stmt->bind_param("sssdsisi", $nombre, $marca, $modelo, $precio, $detalles, $unidades, $imagen, $id);

    if ($stmt->execute()) {
        echo '<script>alert("Producto actualizado correctamente"); window.location.href="get_productos_xhtml_v2.php";</script>';
    } else {
        echo '<script>alert("Error al actualizar el producto");</script>';
    }

    $stmt->close();
}

$link->close();
?>
