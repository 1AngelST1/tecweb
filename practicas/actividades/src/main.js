
function getDatos()
{
    var nombre = prompt("Nombre: ", "");

    var edad = prompt("Edad: ", 0);

    var div1 = document.getElementById('nombre');
    div1.innerHTML = '<h3> Nombre: '+nombre+'</h3>';

    var div2 = document.getElementById('edad');
    div2.innerHTML = '<h3> Edad: '+edad+'</h3>';
}

function holamundo()
{
    alert("Hola Mundo");
}

function variable()
{
    var nombre = "Juan";
    var edad = 20;
    var altura = 1.70;
    var casado = false;
    alert("Nombre: "+nombre+" Edad: " +edad  +" Altura: "+altura+" Casado: "+casado);
}

function variable2()
{
    var nombre = prompt("ingresa tu nombre: ", "");
    var edad = prompt("ingresa tu edad: ", "");
    alert("Hola: "+nombre+" , asi que tienes: " +edad+" años.");
}

function estructurada()
{
    var numero = prompt("ingresa primer numero: ", '');
    var num = prompt("ingresa segundo numero: ", '');
    var suma = parseInt(numero) + parseInt(num);
    var multi = parseInt(numero) * parseInt(num);

    alert("La suma de los numeros es: "+suma);
    alert("La multiplicacion de los numeros es: "+multi);
}

function sentenciaif()
{
    var nombre = prompt("ingresa tu nombre: ", "");
    var nota = prompt("ingresa tu nota: ", '');

    if(nota >= 4)
    {
        alert("Felicidades "+nombre+", has aprobado con: "+nota);
    }
}

function sentenciaifelse()
{
    var numero1 = prompt("ingresa el primer numero: ", '');
    var numero2 = prompt("ingresa el segundo numero: ", '');

    numero1 = parseInt(numero1);
    numero2 = parseInt(numero2);

    if(numero1 > numero2)
    {
        alert("El numero mayor es: "+numero1);
    }
    else
    {
        alert("El numero mayor es: "+numero2);
    }
}

function sentenciaifelseif()
{
    var nota1 = prompt("ingresa 1ra. nota : ", '');
    var nota2 = prompt("ingresa 2da. nota : ", '');
    var nota3 = prompt("ingresa 3ra. nota : ", '');

    nota1 = parseInt(nota1);
    nota2 = parseInt(nota2);
    nota3 = parseInt(nota3);

    prome = (nota1 + nota2 + nota3) / 3;

    if (prome >= 7)
    {
        alert("Aprobado con: "+prome);
    }
    else 
    {
        if (prome >= 4)
        {
            alert("Regular con: "+prome);
        }
        else
        {
            alert("repobado con: "+prome);
        }
    }
}

function sentenciaswitch()
{
    var valor = prompt("ingresa un valor comprendido entre 1 y 5: ", '');
    //convertir a entero
    valor = parseInt(valor);

    switch(valor)
    {
        case 1:
            alert("uno");
            break;
        case 2:
            alert("dos");
            break;
        case 3:
            alert("tres");
            break;
        case 4:
            alert("cuatro");
            break;
        case 5:
            alert("cinco");
            break;
        default:
            alert("valor fuera de rango");
    }
}
