<?php
$link = new mysqli('localhost', 'root', 'SA_toan_123', 'marketzone');
if ($link->connect_errno) {
    die('<script>alert("Falló la conexión: '.$link->connect_error.'");</script>');
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
    die('<script>alert("ID de producto no válido"); window.location.href="get_productos_xhtml_v2.php";</script>');
}
$link->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Producto</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="src/validacion.js" defer></script> 
</head>
<body>
    <div class="container">
        <h1>Modificar Producto</h1>
        <form name="productoForm" method="post" action="update_producto.php?id=<?= $_GET['id'] ?>">
            <fieldset>
                <legend>Detalles del producto:</legend>
                <div class="form-group">
                    <label>Nombre:</label>
                    <input type="text" name="nombre" class="form-control" value="<?= htmlspecialchars($producto['nombre']) ?>" required>
                </div>
                <div class="form-group">
                    <label>Marca:</label>
                    <select name="marca" class="form-control" required>
                        <option value="Samsung" <?= $producto['marca'] == 'Samsung' ? 'selected' : '' ?>>Samsung</option>
                        <option value="Huawei" <?= $producto['marca'] == 'Huawei' ? 'selected' : '' ?>>Huawei</option>
                        <option value="sony" <?= $producto['marca'] == 'sony' ? 'selected' : '' ?>>sony</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Modelo:</label>
                    <input type="text" name="modelo" class="form-control" value="<?= htmlspecialchars($producto['modelo']) ?>" required>
                </div>
                <div class="form-group">
                    <label>Precio:</label>
                    <input type="number" name="precio" class="form-control" step="0.01" value="<?= htmlspecialchars($producto['precio']) ?>" required>
                </div>
                <div class="form-group">
                    <label>Detalles:</label>
                    <textarea name="detalles" class="form-control"><?= htmlspecialchars($producto['detalles']) ?></textarea>
                </div>
                <div class="form-group">
                    <label>Unidades:</label>
                    <input type="number" name="unidades" class="form-control" value="<?= htmlspecialchars($producto['unidades']) ?>" required>
                </div>
                <div class="form-group">
                    <label>Nombre de la Imagen:</label>
                    <input type="text" name="imagen" class="form-control" value="<?= htmlspecialchars($producto['imagen']) ?>">
                </div>
                <div class="form-group">
                    <label>Eliminado:</label>
                    <input type="number" name="eliminado" class="form-control" value="<?= htmlspecialchars($producto['eliminado']) ?>" required>
                </div>
            </fieldset>
            <p>
                <input type="submit" value="Guardar Cambios" class="btn btn-success">
                <a href="get_productos_xhtml_v2.php" class="btn btn-secondary">Cancelar</a>
            </p>
        </form>
    </div>
</body>
</html>
