<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">    

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Práctica 4</title>
</head>

<body>
<h1>Ejercicio 1:</h1>
    <p>
    Determina cuál de las siguientes variables son válidas y explica por qué:
    </p>
    <p>
        $_myvar, <br>$_7var, <br>$myvar, <br>myvar, <br>$var7, <br>$_element1, <br>$house*5
    </p>
    <?php
    $_myvar;  // Válida: Empieza con _ y usa solo caracteres permitidos.  
    $_7var;   // Válida: Empieza con _ y usa caracteres válidos.  
    // myvar;    // No válida: Falta el signo $.  
    $myvar;   // Válida: Sigue las reglas de PHP.  
    $var7;    // Válida: Puede contener números después de una letra.  
    $_element1;  // Válida: Sigue las reglas de PHP.  
    // $house*5;    // No válida: Contiene un operador (*), lo cual no está permitido en nombres de variables.   
    
    echo '<h4>Respuesta:</h4>';   
    
    echo '<ul>';
    echo '<li>$_myvar es válida porque inicia con guión bajo.</li>';
    echo '<li>$_7var es válida porque inicia con guión bajo.</li>';
    echo '<li>myvar es inválida porque no tiene el signo de dolar ($).</li>';
    echo '<li>$myvar es válida porque inicia con una letra.</li>';
    echo '<li>$var7 es válida porque inicia con una letra.</li>';
    echo '<li>$_element1 es válida porque inicia con guión bajo.</li>';
    echo '<li>$house*5 es inválida porque el símbolo * no está permitido.</li>';
    echo '</ul>'; 

    ?>


</body>
</html>