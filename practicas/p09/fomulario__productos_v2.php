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
    die('<script>alert("ID de producto no válido"); window.location.href="productos.php";</script>');
}

$link->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Producto</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Modificar Producto</h1>
        <form method="post">
            <fieldset>
                <legend>Detalles del producto:</legend>
                <div class="form-group">
                    <label>Nombre:</label>
                    <input type="text" name="nombre" class="form-control" value="<?= htmlspecialchars($producto['nombre']) ?>" required>
                </div>
                <div class="form-group">
                    <label>Marca:</label>
                    <input type="text" name="marca" class="form-control" value="<?= htmlspecialchars($producto['marca']) ?>" required>
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
            </fieldset>
            <p>
                <input type="submit" value="Guardar Cambios" class="btn btn-success">
                <a href="" class="btn btn-secondary">Cancelar</a>
            </p>
        </form>
    </div>
</body>
</html>
