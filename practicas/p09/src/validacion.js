document.addEventListener("DOMContentLoaded", function () {
    document.querySelector("form").addEventListener("submit", validarFormulario);
});

function validarFormulario(event) {
    event.preventDefault(); // Evita el envío automático

    let form = document.forms["productoForm"];
    let nombre = form["nombre"].value.trim();
    let marca = form["marca"].value.trim();
    let modelo = form["modelo"].value.trim();
    let precio = parseFloat(form["precio"].value);
    let detalles = form["detalles"].value.trim();
    let unidades = parseInt(form["unidades"].value);
    let imagen = form["imagen"].value.trim();

    if (!nombre || nombre.length > 100) {
        alert("El nombre es obligatorio y debe tener hasta 100 caracteres.");
        return;
    }

    if (!marca || marca.length > 50) {
        alert("La marca es obligatoria y debe tener hasta 50 caracteres.");
        return;
    }

    if (!modelo || modelo.length > 25 || !/^[a-zA-Z0-9 ]+$/.test(modelo)) {
        alert("El modelo es obligatorio, alfanumérico y de máximo 25 caracteres.");
        return;
    }

    if (isNaN(precio) || precio <= 99.99) {
        alert("El precio debe ser un número mayor a 99.99.");
        return;
    }

    if (detalles.length > 250) {
        alert("Los detalles deben tener hasta 250 caracteres.");
        return;
    }

    if (isNaN(unidades) || unidades < 0) {
        alert("Las unidades deben ser un número mayor o igual a 0.");
        return;
    }

    if (!imagen) {
        form["imagen"].value = "img/default.png";
    } else {
        form["imagen"].value = "img/" + imagen.trim();
    }

    form.submit(); // Envía el formulario si todas las validaciones pasan
}
