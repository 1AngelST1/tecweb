<?php
$link = new mysqli('localhost', 'root', 'SA_toan_123', 'marketzone');

if ($link->connect_errno) {
    exit('<script>alert("Falló la conexión: '.$link->connect_error.'"); window.history.back();</script>');
}

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id > 0) {
    $stmt = $link->prepare("SELECT * FROM productos WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $producto = $result->fetch_assoc();
    $stmt->close();
} else {
    exit('<script>alert("ID de producto no válido"); window.location.href="formulario_productos_v3.php";</script>');
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = trim(htmlspecialchars($_POST['nombre']));
    $marca = trim(htmlspecialchars($_POST['marca']));
    $modelo = trim(htmlspecialchars($_POST['modelo']));
    $precio = floatval($_POST['precio']);
    $detalles = trim(htmlspecialchars($_POST['detalles']));
    $unidades = intval($_POST['unidades']);
    $imagen = trim(htmlspecialchars($_POST['imagen']));
    $eliminado = intval($_POST['eliminado']);

    // Lista de marcas permitidas
    $marcas_permitidas = ["Samsung", "Huawei", "sony"];
    
    if (!in_array($marca, $marcas_permitidas)) {
        exit('<script>alert("Marca no permitida"); window.history.back();</script>');
    }

    $stmt = $link->prepare("UPDATE productos SET nombre=?, marca=?, modelo=?, precio=?, detalles=?, unidades=?, imagen=?, eliminado=? WHERE id=?");
    $stmt->bind_param("sssdsisii", $nombre, $marca, $modelo, $precio, $detalles, $unidades, $imagen, $eliminado, $id);

    if ($stmt->execute()) {
        echo '<script>alert("Producto actualizado correctamente"); window.location.href="get_productos_xhtml_v2.php";</script>';
    } else {
        echo '<script>alert("Error al actualizar el producto: ' . $stmt->error . '");</script>';
    }

    $stmt->close();
}

$link->close();
?>
