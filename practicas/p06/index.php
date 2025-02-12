<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 6</title>
</head>
<body>
    <h2>Ejercicio 1</h2>
    <p>Escribir programa para comprobar si un número es un múltiplo de 5 y 7</p>
    <?php

        require_once __DIR__ .'/src/funciones.php';
        
        if(isset($_GET['numero']))
        {
            es_multiplo7y5($_GET['numero']);
        }

    ?>

    <h2>Ejercicio 2</h2>
    <p>Crea un programa para la generación repetitiva de 3 números aleatorios hasta obtener una
    secuencia compuesta por:</p>
    <p>
        impar, par , impar <br>
        990,   382,  786 <br>
        422,   361,  473 <br>
        213,   744,  911
   </p>

   <?php
        require_once __DIR__ .'/src/funciones.php';
        
        list($matriz, $iteraciones) = generarSecuencias();

        echo "<h3>Secuencias generadas:</h3>";
        echo "<table border='1'>";
        foreach ($matriz as $fila) {
            echo "<tr><td>{$fila[0]}</td><td>{$fila[1]}</td><td>{$fila[2]}</td></tr>";
        }
        echo "</table>";

        echo "<p>Total de iteraciones: $iteraciones</p>";
    ?>


    <h2>Ejercicio 3</h2>
    <p>Utiliza un ciclo while para encontrar el primer número entero obtenido aleatoriamente,
    pero que además sea múltiplo de un número dado.</p>

    <?php

        require_once __DIR__ .'/src/funciones.php';
        
        if(isset($_GET['multiplo']))
        {
            $multiplo = $_GET['multiplo'];
            $numero = encontrarMultiplo($multiplo);
            echo "<h3>El primer número múltiplo de $multiplo es: $numero</h3>";
        }

    ?>

    <h2>Ejercicio 4</h2>
    <p>Crear un arreglo cuyos índices van de 97 a 122 y cuyos valores son las letras de la ‘a’
        a la ‘z’. Usa la función chr(n) que devuelve el caracter cuyo código ASCII es n para poner
        el valor en cada índice. Es decir:
    </p>

    <p>
        [97] => a <br>
        [98] => b <br>
        [99] => c <br>
        ... <br>
        [122] => z
    </p>

    <?php
        require_once __DIR__ .'/src/funciones.php';

        $abecedario = generarAbecedario();

        echo "<h3>Abecedario:</h3>";
        echo "<table border='1' cellspacing='0' cellpadding='5'>";
        echo "<tr><th>Índice</th><th>Letra</th></tr>";
        foreach ($abecedario as $indice => $letra) {
            echo "<tr><td>$indice</td><td>$letra</td></tr>";
        }
        echo "</table>";
    ?>


    <h2>Ejercicio 5</h2>
    <p> Usar las variables $edad y $sexo en una instrucción if para identificar una persona de
        sexo “femenino”, cuya edad oscile entre los 18 y 35 años y mostrar un mensaje de
        bienvenida apropiado. Por ejemplo:
    </p>

    <p>
        Bienvenida, usted está en el rango de edad permitido.<br>
        En caso contrario, deberá devolverse otro mensaje indicando el error.<br>
    </p>

    <form method="post" action="">
        edad: <input type="number" name="edad" required>
        sexo: <select name="sexo">
            <option value="femenino">Femenino</option>
            <option value="masculino">Masculino</option>
        </select>
        <input type="submit" value="Enviar">
    </form>
    <br>
    <?php

        require_once __DIR__ .'/src/funciones.php';

         if (isset($_POST["edad"]) && isset($_POST["sexo"])) {
        $edad = $_POST["edad"];
        $sexo = $_POST["sexo"];

        echo validarEdadSexo($edad, $sexo);
        }
    ?>

    <h2>Ejercicio 6</h2>
    <p> Crea en código duro un arreglo asociativo que sirva para registrar el parque vehicular de
        una ciudad. Cada vehículo debe ser identificado por:
    </p>

    <p>
        . Matricula<br>
        . Auto<br>
        . Marca<br>
        . Modelo (año)<br>
        . Tipo (sedan|hachback|camioneta)<br>
        . Propietario<br>
        . Nombre<br>
        . Ciudad<br>
        . Dirección
    </p>



    <form method="post">
        <label for="matricula">Ingresa la matrícula del vehículo:</label>
        <input type="text" name="matricula" id="matricula" maxlength="7">
        <input type="submit" value="Consultar">
    </form>

    <h3>Todos los vehículos registrados:</h3>
    <?php
    require_once __DIR__ .'/src/funciones.php';

    $parqueVehicular = array(
        "UBN6338" => array(
            "Auto" => array(
                "marca" => "HONDA",
                "modelo" => "2020",
                "tipo" => "camioneta"
            ),
            "Propietario" => array(
                "nombre" => "Alfonzo Esparza",
                "ciudad" => "Puebla, Pue.",
                "direccion" => "C.U., Jardines de San Manuel"
            )
        ),
        "UBN6339" => array(
            "Auto" => array(
                "marca" => "MAZDA",
                "modelo" => "2019",
                "tipo" => "sedan"
            ),
            "Propietario" => array(
                "nombre" => "Ma. del Consuelo Molina",
                "ciudad" => "Puebla, Pue.",
                "direccion" => "97 oriente"
            )
        ),
        "XYZ1234" => array(
            "Auto" => array(
                "marca" => "TOYOTA",
                "modelo" => "2021",
                "tipo" => "camioneta"
            ),
            "Propietario" => array(
                "nombre" => "Carlos García",
                "ciudad" => "CDMX",
                "direccion" => "Av. Reforma 123"
            )
        ),
        // Agregar más vehículos aquí...
    );
    
    foreach ($parqueVehicular as $matricula => $datos) {
        echo "<li>$matricula</li>";
    }

    // Consultar por matrícula
    if (isset($_POST['matricula'])) {
        $matriculaConsulta = $_POST['matricula'];
        $resultado = auto_info($parqueVehicular, $matriculaConsulta);
        echo $resultado;
    }
    ?>





</body>
</html>