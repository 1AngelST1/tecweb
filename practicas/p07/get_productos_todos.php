<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
    <?php
    if(isset($_GET['tope'])) {
        $tope = $_GET['tope'];
    } else {
        die('<script>alert("Parámetro \"tope\" no detectado...");</script>');
    }

    if (!empty($tope)) {
        @$link = new mysqli('localhost', 'root', 'SA_toan_123', 'marketzone');

        if ($link->connect_errno) {
            die('<script>alert("Falló la conexión: '.$link->connect_error.'");</script>');
        }

        if ($result = $link->query("SELECT * FROM productos WHERE unidades <= '{$tope}'")) {
            $productos = [];
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                $productos[] = $row;
            }
            $result->free();
        }
        $link->close();
    }
    ?>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Lista de Productos</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <h3>Lista de Productos con Stock Bajo</h3>
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
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else : ?>
            <script>
                alert('No hay productos con stock bajo');
            </script>
        <?php endif; ?>
    </body>
</html>
