// JSON BASE A MOSTRAR EN FORMULARIO
const baseJSON = {
    marca: "NA",
    modelo: "XX-000",
    precio: 0.0,
    detalles: "NA",
    unidades: 1,
    imagen: "imagen/default.png"
};

// FUNCIÓN COMÚN PARA REALIZAR PETICIONES AJAX
function hacerPeticion(url, method, data, callback) {
    const client = new XMLHttpRequest();
    client.open(method, url, true);
    client.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    client.onreadystatechange = () => {
        if (client.readyState === 4 && client.status === 200) {
            callback(client.responseText);
        }
    };

    client.send(data);
}

// FUNCIÓN CALLBACK DE BOTÓN "Buscar por ID"
function buscarID(e) {
    e.preventDefault();
    const id = document.getElementById('searchID').value;
    hacerPeticion('./backend/read.php', 'POST', `searchID=${id}`, response => {
        const productos = JSON.parse(response);
        if (productos.length) {
            const descripcion = generarDescripcion(productos[0]);
            const template = `
                <tr>
                    <td>${productos[0].id}</td>
                    <td>${productos[0].nombre}</td>
                    <td><ul>${descripcion}</ul></td>
                </tr>
            `;
            document.getElementById("productos").innerHTML = template;
        }
    });
}

// FUNCIÓN CALLBACK DE BOTÓN "Buscar por nombre, marca o detalles"
function buscarProducto(event) {
    event.preventDefault();
    const search = document.getElementById('searchTerm').value;

    fetch('backend/read.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `search=${encodeURIComponent(search)}`
    })
    .then(response => response.json())
    .then(data => {
        const resultados = document.getElementById('productos');
        resultados.innerHTML = data.length ? data.map(producto => {
            const descripcion = generarDescripcion(producto);
            return `
                <tr>
                    <td>${producto.id}</td>
                    <td>${producto.nombre}</td>
                    <td><ul>${descripcion}</ul></td>
                </tr>
            `;
        }).join('') : '<tr><td colspan="3">No se encontraron productos.</td></tr>';
    })
    .catch(error => console.error('Error:', error));
}

// GENERA LA DESCRIPCIÓN DE UN PRODUCTO
function generarDescripcion(producto) {
    return `
        <li>precio: ${producto.precio}</li>
        <li>unidades: ${producto.unidades}</li>
        <li>modelo: ${producto.modelo}</li>
        <li>marca: ${producto.marca}</li>
        <li>detalles: ${producto.detalles}</li>
    `;
}

// FUNCIÓN CALLBACK DE BOTÓN "Agregar Producto"
function agregarProducto(e) {
    e.preventDefault();

    const productoJsonString = document.getElementById('description').value;
    let finalJSON = JSON.parse(productoJsonString);
    finalJSON['nombre'] = document.getElementById('name').value;

    if (validarProducto(finalJSON)) {
        hacerPeticion('./backend/create.php', 'POST', JSON.stringify(finalJSON), response => {
            alert(response);
        });
    }
}

// VALIDACIONES DE LOS DATOS DEL PRODUCTO
function validarProducto(producto) {
    if (producto.nombre.trim() === "" || producto.nombre.length > 100) {
        alert("El nombre es requerido y debe tener máximo 100 caracteres.");
        return false;
    }
    if (producto.marca.trim() === "") {
        alert("La marca es requerida.");
        return false;
    }
    if (producto.modelo.trim() === "" || producto.modelo.length > 25 || !/^[a-zA-Z0-9]+$/.test(producto.modelo)) {
        alert("El modelo es requerido, alfanumérico y debe tener máximo 25 caracteres.");
        return false;
    }
    if (isNaN(producto.precio) || producto.precio <= 99.99) {
        alert("El precio es requerido y debe ser mayor a 99.99.");
        return false;
    }
    if (producto.detalles.length > 250) {
        alert("Los detalles no deben superar los 250 caracteres.");
        return false;
    }
    if (isNaN(producto.unidades) || producto.unidades < 0) {
        alert("Las unidades deben ser un número mayor o igual a 0.");
        return false;
    }
    if (producto.imagen.trim() === "") {
        producto.imagen = "imagen/default.png";
    }
    return true;
}

// INICIALIZA EL FORMULARIO CON EL JSON BASE
function init() {
    document.getElementById("description").value = JSON.stringify(baseJSON, null, 2);
}
