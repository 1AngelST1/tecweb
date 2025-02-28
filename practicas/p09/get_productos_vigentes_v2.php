<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
    <?php
    @$link = new mysqli('localhost', 'root', 'SA_toan_123', 'marketzone');

    if ($link->connect_errno) {
        die('<script>alert("Falló la conexión: '.$link->connect_error.'");</script>');
    }

    if ($result = $link->query("SELECT * FROM productos WHERE eliminado = 0")) {
        $productos = [];
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $productos[] = $row;
        }
        $result->free();
    }
    $link->close();
    ?>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Lista de Productos</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <h3>Lista de Productos</h3>
        <br/>

        <?php if (!empty($productos)) : ?>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Unidades</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($productos as $producto) : ?>
                        <tr>
                            <th scope="row"> <?= htmlspecialchars($producto['id']) ?> </th>
                            <td> <?= htmlspecialchars($producto['nombre']) ?> </td>
                            <td> <?= htmlspecialchars($producto['precio']) ?> </td>
                            <td> <?= htmlspecialchars($producto['unidades']) ?> </td>
                            <td><img src="<?= htmlspecialchars($producto['imagen']) ?>" width="50" height="50" /></td>
                            <td>
                                <a href="formulario_productos_v3.php?id=<?= htmlspecialchars($producto['id']) ?>" class="btn btn-primary">Modificar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else : ?>
            <script>
                alert('No hay productos ');
            </script>
        <?php endif; ?>
    </body>
</html>
