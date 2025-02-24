
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
    var div = document.getElementById('holamundo');
    div.innerHTML = '<h1> Hola Mundo </h1>';
}

function variable()
{
    var nombre = "Juan";
    var edad = 20;
    var altura = 1.70;
    var casado = false;

    var div = document.getElementById('nom');
    div.innerHTML = '<h3> Nombre: '+nombre+'</h3>';

    var div1 = document.getElementById('ed');
    div1.innerHTML += '<h3> Edad: '+edad+'</h3>';

    var div2 = document.getElementById('altura');
    div2.innerHTML += '<h3> Altura: '+altura+'</h3>';

    var div3 = document.getElementById('casado');
    div3.innerHTML += '<h3> Casado: '+casado+'</h3>';
}

function variable2()
{
    var nom2 = prompt("ingresa tu nombre: ", "");
    var edad2 = prompt("ingresa tu edad: ", "");

    var div = document.getElementById('mensaje');
    div.innerHTML = '<h3> hola '+nom2+' asi que tienes :' +edad2+ 'años </h3>';

}

function estructurada()
{
    var numero = prompt("ingresa primer numero: ", '');
    var num = prompt("ingresa segundo numero: ", '');
    var suma = parseInt(numero) + parseInt(num);
    var multi = parseInt(numero) * parseInt(num);

    var div = document.getElementById('suma');
    div.innerHTML = '<h3> La suma de los numeros es: '+suma+'</h3>';

    var div1 = document.getElementById('multi');
    div1.innerHTML = '<h3> La multiplicacion de los numeros es: '+multi+'</h3>';

}

function sentenciaif()
{
    var nombre = prompt("ingresa tu nombre: ", "");
    var nota = prompt("ingresa tu nota: ", '');

    if(nota >= 4)
    {
        var div = document.getElementById('aprobado');
        div.innerHTML = '<h3> Felicidades '+nombre+', has aprobado con: '+nota+'</h3>';
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
        var div = document.getElementById('mayor');
        div.innerHTML = '<h3> El numero mayor es: '+numero1+'</h3>';
    }
    else
    {
        var div1 = document.getElementById('mayor');
        div1.innerHTML = '<h3> El numero mayor es: '+numero2+'</h3>';
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
        var div = document.getElementById('califi');
        div.innerHTML = '<h3> Aprobado con: '+prome+'</h3>';
    }
    else 
    {
        if (prome >= 4)
        {
            var div1 = document.getElementById('califi');
            div1.innerHTML = '<h3> Regular con: '+prome+'</h3>';
        }
        else
        {
            var div2 = document.getElementById('califi');
            div2.innerHTML = '<h3> Reprobado con: '+prome+'</h3>';
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
            var div = document.getElementById('valor');
            div.innerHTML = '<h3> uno </h3>';
            break;
        case 2:
            var div1 = document.getElementById('valor');
            div1.innerHTML = '<h3> dos </h3>';
            break;
        case 3:
            var div2 = document.getElementById('valor');
            div2.innerHTML = '<h3> tres </h3>';
            break;
        case 4:
            var div3 = document.getElementById('valor');
            div3.innerHTML = '<h3> cuatro </h3>';
            break;
        case 5:
            var div4 = document.getElementById('valor');
            div4.innerHTML = '<h3> cinco </h3>';
            break;
        default:
            var div5 = document.getElementById('valor');
            div5.innerHTML = '<h3> valor no valido </h3>';
    }
}

function sentenciaswitch2()
{
    var col = prompt("ingresa el color con que quieras pintar el fondo de la ventana (rojo,verde,azul) ", '');

    switch(col)
    {
        case 'rojo':
            var div = document.getElementById('color');
            div.innerHTML = '<h3> color rojo </h3>';
            document.bgColor = 'red';
            break;
        case 'verde':
            var div1 = document.getElementById('color');
            div1.innerHTML = '<h3> color verde </h3>';
            document.bgColor = 'green';
            break;
        case 'azul':
            var div2 = document.getElementById('color');
            div2.innerHTML = '<h3> color azul </h3>';
            document.bgColor = 'blue';
            break;
        default:
            var div3 = document.getElementById('color');
            div3.innerHTML = '<h3> color no valido </h3>';
    }
}

function sentenciawhile()
{
    var x = 1;
    while(x <= 10)
    {
        var div = document.getElementById('contador');
        div.innerHTML += '<h3> '+x+' </h3>';
        x++;
    }
}

function sentenciawhile2()
{
    var x = 1;
    var suma = 0;
    var valor;

    while(x <= 5)
    {
        var valor = prompt("ingresa el valor : ", '');
        valor = parseInt(valor);
        suma += valor;
        x++;
    }
    var div = document.getElementById('sum5');
    div.innerHTML = '<h3> La suma de los valores es: '+suma+' </h3>';
}

function sentenciadowhile()
{
    var valor ;
    do
    {
        valor = prompt("ingresa un valor entre 0 y 999: ", '');
        valor = parseInt(valor);

        var div = document.getElementById('ing');
        div.innerHTML = '<h3> valor ingresado: '+valor+' </h3>';

        if (valor <= 10)
        {
            var div1 = document.getElementById('dig');
            div1.innerHTML = '<h3> tiene 1 digito </h3>';
        }else   
        {
            if (valor <= 100)
            {
                var div2 = document.getElementById('dig');
                div2.innerHTML = '<h3> tiene 2 digitos </h3>';
            }else
            {
                var div3 = document.getElementById('dig');
                div3.innerHTML = '<h3> tiene 3 digitos </h3>';
            }
        }
    }while(valor <= 0);
}

function sentenciafor()
{
    var i;
    for(i = 1; i <= 10; i++)
    {
        var div = document.getElementById('conta');
        div.innerHTML += '<h3> '+i+' </h3>';
    }
}

function implementacion()
{
    var div = document.getElementById('implementacion');
    div.innerHTML = '<h3> cuiado '+' ingresa tu documento correctamente</h3>';
    var div1 = document.getElementById('implementacion');
    div1.innerHTML += '<h3> cuiado '+' ingresa tu documento correctamente</h3>';
    var div2 = document.getElementById('implementacion');
    div2.innerHTML += '<h3> cuiado '+' ingresa tu documento correctamente</h3>';

}

function implementacion2()
{
    function mensaje()
    {
        var div = document.getElementById('implementacion2');
        div.innerHTML += '<h3> cuiado '+' ingresa tu documento correctamente</h3>';
    }
    mensaje();
    mensaje();
    mensaje();   
}

function implementacion3()
{
    var valor1 = prompt("ingresa el valor inferior : ", '');
    var valor2 = prompt("ingresa el valor superior : ", '');
    valor1 = parseInt(valor1);
    valor2 = parseInt(valor2);
    function mostrarrango(valor1, valor2)
    {
        var i;
        for(i = valor1; i <= valor2; i++)
        {
            var div = document.getElementById('rango');
            div.innerHTML += '<h3> '+i+' </h3>';
        }
    }
    mostrarrango(valor1, valor2);

}

function retorno()
{
    function convertirCastellano(x)
    {
        if (x == 1)
        {
            var div = document.getElementById('retorno');
            div.innerHTML = '<h3> uno </h3>';
            return ;
        }else
        {
            if (x == 2)
            {
                var div1 = document.getElementById('retorno');
                div1.innerHTML = '<h3> dos </h3>';
                return ;
            }else
            {
                if (x == 3)
                {
                    var div2 = document.getElementById('retorno');
                    div2.innerHTML = '<h3> tres </h3>';
                    return ;
                }else
                {
                    if (x == 4)
                    {
                        var div3 = document.getElementById('retorno');
                        div3.innerHTML = '<h3> cuatro </h3>';
                        return ;
                    }
                    else
                    {
                        if (x == 5)
                        {
                            var div4 = document.getElementById('retorno');
                            div4.innerHTML = '<h3> cinco </h3>';
                            return ;
                        }
                        else
                        {
                            var div5 = document.getElementById('retorno');
                            div5.innerHTML = '<h3> numero no valido </h3>';
                            return ;
                        }
                    }
                }
            }
        }
    }
    var valor = prompt("ingresa un valor entre 1 y 5: ", '');
    valor = parseInt(valor);
    convertirCastellano(valor);
}

function retorno2()
{
    function convertirCastellano(x)
    {
        switch(x)
        {
            case 1:
                var div = document.getElementById('retorno2');
                div.innerHTML = '<h3> uno </h3>';
                break;
            case 2:
                var div1 = document.getElementById('retorno2');
                div1.innerHTML = '<h3> dos </h3>';
                break;
            case 3:
                var div2 = document.getElementById('retorno2');
                div2.innerHTML = '<h3> tres </h3>';
                break;
            case 4:
                var div3 = document.getElementById('retorno2');
                div3.innerHTML = '<h3> cuatro </h3>';
                break;
            case 5:
                var div4 = document.getElementById('retorno2');
                div4.innerHTML = '<h3> cinco </h3>';
                break;
            default:
                var div5 = document.getElementById('retorno2');
                div5.innerHTML = '<h3> numero no valido </h3>';
                return ;
        }
    }
    var valor = prompt("ingresa un valor entre 1 y 5: ", '');
    valor = parseInt(valor);
    convertirCastellano(valor);
}
