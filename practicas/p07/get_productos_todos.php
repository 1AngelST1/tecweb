<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Lista de Productos</title>
</head>
<body>
    <h1>Lista de Productos con Stock Bajo</h1>
    
    <?php
        if(isset($_GET['tope'])) {
            $tope = $_GET['tope'];
        } else {
            die('<p>Parámetro "tope" no detectado...</p>');
        }

        if (!empty($tope)) {
            @$link = new mysqli('localhost', 'root', 'SA_toan_123', 'marketzone');
            
            if ($link->connect_errno) {
                die('<p>Falló la conexión: '.$link->connect_error.'</p>');
            }

            if ($result = $link->query("SELECT * FROM productos WHERE unidades <= $tope")) {
                echo '<table border="1">';
                echo '<tr><th>ID</th><th>Nombre</th><th>Precio</th><th>Unidades</th></tr>';
                
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>'.htmlspecialchars($row['id']).'</td>';
                    echo '<td>'.htmlspecialchars($row['nombre']).'</td>';
                    echo '<td>'.htmlspecialchars($row['precio']).'</td>';
                    echo '<td>'.htmlspecialchars($row['unidades']).'</td>';
                    echo '<td>'.htmlspecialchars($row['imagen']).'</td>';
                    echo '</tr>';
                }
                
                echo '</table>';
                $result->free();
            }

            $link->close();
        }
    ?>
</body>
</html>
