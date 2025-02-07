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

    



</body>
</html>