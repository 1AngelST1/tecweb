<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">  

<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <title>Práctica 4</title>
</head>

<body>
    <h1>Ejercicio 1:</h1>
        <p> Determina cuál de las siguientes variables son válidas y explica por qué: 
        </p>

        <p>
        $_myvar, <br />$_7var, <br />$myvar, <br />myvar, <br />$var7, <br />$_element1, <br />$house*5
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

<h1>Ejercicio 2:</h1>

<p>Proporcionar los valores de $q, $w, $e como sigue:</p>

<p>Cambie los valores de a, b, c por los valores q, w, e respectivamente por problemas con el siguiente ejercicio.</p>

<?php
    $q = "ManejadorSQL";
    $w = 'MySQL';
    $e = &$q; // $e es una referencia a $q
?>

<div>
    <p>Valores iniciales:</p>
    <p>q: <?php echo $q; ?></p>
    <p>w: <?php echo $w; ?></p>
    <p>e: <?php echo $e; ?></p>
</div>

<?php
    $q = "PHP server"; 
    $w = &$e; // Ahora $w también referencia $e
?>

<div>
    <p>Después de la reasignación:</p>
    <p>q: <?php echo $q; ?></p>
    <p>w: <?php echo $w; ?></p>
    <p>e: <?php echo $e; ?></p>
</div>

<p>Al asignar e = q, e referencia el mismo valor que q, por lo que cualquier cambio en q también afecta a e.</p>



    <h1>Ejercicio 3: </h1>
    <p>
        Muestra el contenido de cada variable inmediatamente después de cada asignación,
        verificar la evolución del tipo de estas variables (imprime todos los componentes del arreglo):
    </p>
    <p>
        $a = "PHP5";<br  />
        $z[] = $a;<br  />
        $b = "5a version de PHP";<br  />
        $c = intval($b) * 10;<br  />
        $a .= $b;<br  />
        $b = intval($b) * $c;<br  />
        $z[0] = "MySQL";<br  />
    </p>

    <?php
    $a = "PHP5";
    $z[] = $a; // Se asigna el valor sin referencia
    $b = "5a version de PHP";
    $c = intval($b) * 10; // Convertimos a número antes de multiplicar
    $a .= $b; // Concatena "5a version de PHP" a $a
    $b = intval($b) * $c; // Convertimos $b en número antes de multiplicar
    $z[0] = "MySQL"; // Se asigna sin afectar a $a

    // Resultados dentro de etiquetas válidas
    echo "<p>a: $a</p>";
    echo "<p>b: $b</p>";
    echo "<p>c: $c</p>";
    echo "<pre>";
    print_r($z);
    echo "</pre>";
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

    // Extraer el número de la cadena antes de operar
    $num_b = intval($GLOBALS['b']); // Esto extrae el número "5" y lo convierte en entero

    $GLOBALS['c'] = $num_b * 10;  // Ahora la operación es válida
    $GLOBALS['a'] .= $GLOBALS['b'];  
    $GLOBALS['b'] = $num_b * $GLOBALS['c']; // Asegurar que la operación sea numérica

    $GLOBALS['z'][0] = "MySQL";

    echo "<p>a: " . $GLOBALS['a'] . "</p>";
    echo "<p>b: " . $GLOBALS['b'] . "</p>";
    echo "<p>c: " . $GLOBALS['c'] . "</p>";
    echo "<pre>";
    print_r($GLOBALS['z']);
    echo "</pre>";
    ?>

    <h1>Ejercicio 5:</h1>
    <p>
    Dar el valor de las variables $a, $b, $c al final del siguiente script:<br />
    $a = “7 personas”;<br />
    $b = (integer) $a;<br />
    $a = “9E3”;<br />
    $c = (double) $a;<br />
    </p>

    <?php
    $a = "7 personas";
    $b = (integer) $a; // Convierte "7 personas" en 7 (descarta la parte de texto)
    $a = "9E3"; // Representa 9000 en notación científica
    $c = (double) $a; // Convierte "9E3" a 9000.0

    echo "<p>a:" . $a . "</p>";
    echo "<p>b:" . $b . "</p>";
    echo "<p>c:" . $c . "</p>";
    ?>

<h1>Ejercicio 6: </h1>
    <p>Dar y comprobar el valor booleano de las variables $a, $b, $c, $d, $e y $f y muéstralas
    usando la función var_dump(datos).</p>
    <p>Después investiga una función de PHP que permita transformar el valor booleano de $c y $e
    en uno que se pueda mostrar con un echo:<br />
    $a = “0”;<br  />
    $b = “TRUE”;<br  />
    $c = FALSE;<br  />
    $d = ($a OR $b);<br  />
    $e = ($a AND $c);<br  />
    $f = ($a XOR $b);<br  />
    </p>

    <?php

    $a = "0";
    $b = "TRUE";
    $c = FALSE;
    $d = ($a OR $b);
    $e = ($a AND $c);
    $f = ($a XOR $b);

    
    echo "<p>a: " . ((bool)$a ? "true" : "false") . "</p>";
    echo "<p>b: " . ((bool)$b ? "true" : "false") . "</p>";
    echo "<p>c: " . ((bool)$c ? "true" : "false") . "</p>";
    echo "<p>d: " . ((bool)$d ? "true" : "false") . "</p>";
    echo "<p>e: " . ((bool)$e ? "true" : "false") . "</p>";
    echo "<p>f: " . ((bool)$f ? "true" : "false") . "</p>";
    
    echo "<div>Convertidos a string:</div>";

    echo "<p>c: " . json_encode($c) . "</p>";
    echo "<p>e: " . json_encode($e) . "</p>"; 
    
    echo "<p>la función json_encode() convierte valores booleanos en verdadero o falso como cadenas </p>";
    ?>


    <h1>Ejercicio 7:</h1>
    <?php
    echo "<p>Versión de Apache y PHP: " . $_SERVER['SERVER_SOFTWARE'] . "</p>";
    echo "<p>Nombre del sistema operativo: " . PHP_OS . "</p>";
    echo "<p>Idioma del navegador: " . $_SERVER['HTTP_ACCEPT_LANGUAGE'] . "</p>";
    ?>

    <p>
        <a href="https://validator.w3.org/markup/check?uri=referer"><img
        src="https://www.w3.org/Icons/valid-xhtml11" alt="Valid XHTML 1.1" height="31" width="88" /></a>
    </p>


</body>
</html>