<?php

//problema 1
function es_multiplo7y5($num)
{
    if ($num%5==0 && $num%7==0)
    {
        echo '<h3>R= El número '.$num.' SÍ es múltiplo de 5 y 7.</h3>';
    }
    else
    {
        echo '<h3>R= El número '.$num.' NO es múltiplo de 5 y 7.</h3>';
    }
}

//problema 2
function generarSecuencias()
{
    $matriz = [];
    $iteraciones = 0;
    
    while (true) {
        $num1 = rand(1, 999);
        $num2 = rand(1, 999);
        $num3 = rand(1, 999);
        
        if ($num1 % 2 != 0 && $num2 % 2 == 0 && $num3 % 2 != 0) {
            $matriz[] = [$num1, $num2, $num3];
            if (count($matriz) >= 4) break;
        }
        $iteraciones++;
    }
    return [$matriz, $iteraciones];
}

//problema 3
function encontrarMultiplo($n) {
    do {
        $random = rand(1, 1000);
    } while ($random % $n != 0);
    return $random;
}

//problema 4

function generarAbecedario() {
    $arreglo = [];
    for ($i = 97; $i <= 122; $i++) {
        $arreglo[$i] = chr($i);
    }
    return $arreglo;
}

//problema 5

function validarEdadSexo($edad, $sexo) {
    if ($sexo === "femenino" && $edad >= 18 && $edad <= 35) {
        return '<h3>Bienvenida, usted está en el rango de edad permitido.</h3>';
    } else {
        return '<h3>Lo sentimos, no cumple con los requisitos.</h3>';
    }
}


//problema 6

// funciones.php
function auto_info($parqueVehicular, $matriculaConsulta) {
    if (isset($parqueVehicular[$matriculaConsulta])) {
        $vehiculo = $parqueVehicular[$matriculaConsulta];
        $info = "<h3>Información del Vehículo:</h3>";
        $info .= "<p><strong>Marca:</strong> " . $vehiculo['Auto']['marca'] . "</p>";
        $info .= "<p><strong>Modelo:</strong> " . $vehiculo['Auto']['modelo'] . "</p>";
        $info .= "<p><strong>Tipo:</strong> " . $vehiculo['Auto']['tipo'] . "</p>";
        $info .= "<p><strong>Propietario:</strong> " . $vehiculo['Propietario']['nombre'] . "</p>";
        $info .= "<p><strong>Ciudad:</strong> " . $vehiculo['Propietario']['ciudad'] . "</p>";
        $info .= "<p><strong>Dirección:</strong> " . $vehiculo['Propietario']['direccion'] . "</p>";
        return $info;
    } else {
        return "<p>No se encontró un vehículo con esa matrícula.</p>";
    }
}


?>