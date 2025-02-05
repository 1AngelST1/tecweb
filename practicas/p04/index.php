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

<h1>Ejercicio 2: </h1>
    <p>Proporcionar los valores de $q, $w, $e como sigue:</p>
    <p>cambie los valores de a,b,c por los valores q,w,e respectivamente por problemas con el siguiente ejercicio.</p>
    <?php

        $q = "ManejadorSQL";
        $w = 'MySQL';
        $e = &$q; // $c es una referencia a $a

        echo "Valores iniciales:<br>";
        echo "q: $q <br>";
        echo "w: $w <br>";
        echo "e: $e <br>";

        $q = "PHP server"; 
        $w = &$e; // Ahora $b también referencia $a

        echo "Después de la reasignación:<br>";
        echo "q: $q <br>";
        echo "w: $w <br>";
        echo "e: $e <br>";

        echo "Al asignar e = q, e referencia el mismo valor que q,";
        echo "por lo que cualquier cambio en a también afecta a e.";
        ?>


<h1>Ejercicio 3: </h1>
    <p>
        Muestra el contenido de cada variable inmediatamente después de cada asignación,
        verificar la evolución del tipo de estas variables (imprime todos los componentes de los
        arreglo):
    </p>
    <p>
        $q = “PHP5”;<br>
        $w[] = &$q;<br>
        $e = “5a version de PHP”;<br>
        $r = $e*10;<br>
        $q .= $e;<br>
        $e *= $r;<br>
        $w[0] = “MySQL”;<br>
    </p>

    <?php
    $a = "PHP5";
    $z[] = &$a; // $z[0] es una referencia a $a
    $b = "5a version de PHP";
    $c = $b * 10; // PHP convierte "5a version de PHP" en 5 y lo multiplica por 10
    $a .= $b; // Concatena "5a version de PHP" a $a
    $b *= $c; // Multiplica el valor de $b por $c
    $z[0] = "MySQL"; // Cambia $z[0], lo cual también afecta a $a porque es una referencia

    echo "a: $a <br>";
    echo "b: $b <br>";
    echo "c: $c <br>";
    print_r($z);
    ?>
    <h1>Ejercicio 4:</h1>
    <p>
    Lee y muestra los valores de las variables del ejercicio anterior, pero ahora con la ayuda de
    la matriz $GLOBALS o del modificador global de PHP.
    </p>
    <?php
    $GLOBALS['a'] = "PHP5";
    $GLOBALS['z'][] = &$GLOBALS['a'];
    $GLOBALS['b'] = "5a version de PHP";
    $GLOBALS['c'] = $GLOBALS['b'] * 10;
    $GLOBALS['a'] .= $GLOBALS['b'];
    $GLOBALS['b'] *= $GLOBALS['c'];
    $GLOBALS['z'][0] = "MySQL";

    echo "a: " . $GLOBALS['a'] . "<br>";
    echo "b: " . $GLOBALS['b'] . "<br>";
    echo "c: " . $GLOBALS['c'] . "<br>";
    print_r($GLOBALS['z']);
    ?>


    <h1>Ejercicio 5:</h1>
    <p>
    Dar el valor de las variables $a, $b, $c al final del siguiente script:<br>
    $a = “7 personas”;<br>
    $b = (integer) $a;<br>
    $a = “9E3”;<br>
    $c = (double) $a;<br>
    </p>
    <?php
    $a = "7 personas";
    $b = (integer) $a; // Convierte "7 personas" en 7 (descarta la parte de texto)
    $a = "9E3"; // Representa 9000 en notación científica
    $c = (double) $a; // Convierte "9E3" a 9000.0

    echo "a: $a <br>";
    echo "b: $b <br>";
    echo "c: $c <br>";
    ?>

<h1>Ejercicio 6: </h1>
    <p>Dar y comprobar el valor booleano de las variables $a, $b, $c, $d, $e y $f y muéstralas
    usando la función var_dump(<datos>).</p>
    <p>Después investiga una función de PHP que permita transformar el valor booleano de $c y $e
    en uno que se pueda mostrar con un echo:<br>
    $a = “0”;<br>
    $b = “TRUE”;<br>
    $c = FALSE;<br>
    $d = ($a OR $b);<br>
    $e = ($a AND $c);<br>
    $f = ($a XOR $b);<br>
    </p>
    <?php
    $a = "0";
    $b = "TRUE";
    $c = FALSE;
    $d = ($a OR $b);
    $e = ($a AND $c);
    $f = ($a XOR $b);

    echo "a: "; var_dump((bool)$a); echo "<br>";
    echo "b: "; var_dump((bool)$b); echo "<br>";
    echo "c: "; var_dump((bool)$c); echo "<br>";
    echo "d: "; var_dump((bool)$d); echo "<br>";
    echo "e: "; var_dump((bool)$e); echo "<br>";
    echo "f: "; var_dump((bool)$f); echo "<br>";

    echo "<br> Convertidos a string:<br>";
    echo "c: " . json_encode($c) . "<br>"; 
    echo "e: " . json_encode($e) . "<br>";
    
    echo "la función json_encode() convierte valores booleanos en verdadero o falso como cadenas";
    
    ?>


    <h1>Ejercicio 7:</h1>
    <?php
    echo "Versión de Apache y PHP: " . $_SERVER['SERVER_SOFTWARE'] . "<br>";
    echo "Nombre del sistema operativo: " . PHP_OS . "<br>";
    echo "Idioma del navegador: " . $_SERVER['HTTP_ACCEPT_LANGUAGE'] . "<br>";
    ?>


</body>
</html>