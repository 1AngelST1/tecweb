// JSON BASE A MOSTRAR EN FORMULARIO
var baseJSON = {
    "precio": 0.0,
    "unidades": 1,
    "modelo": "XX-000",
    "marca": "NA",
    "detalles": "NA",
    "imagen": "img/default.png"
};

$(document).ready(function () {
    // Mostrar JSON en el formulario
    $('#description').val(JSON.stringify(baseJSON, null, 2));

    // Listar productos al cargar la página
    listarProductos();

    // Buscar producto
    $('#search-form').submit(function (e) {
        e.preventDefault();
        buscarProducto();
    });

    // Buscar producto mientras se teclea
    $('#search').on('input', function () {
        buscarProducto();
    });

    // Agregar producto
    $('#add-product-form').submit(function (e) {
        e.preventDefault();
        agregarProducto();
    });
});

function listarProductos() {
    $.get('./backend/product-list.php', function (data) {
        let productos = JSON.parse(data);
        let template = '';
        
        if (productos.length > 0) {
            productos.forEach(producto => {
                let descripcion = `
                    <li>precio: ${producto.precio}</li>
                    <li>unidades: ${producto.unidades}</li>
                    <li>modelo: ${producto.modelo}</li>
                    <li>marca: ${producto.marca}</li>
                    <li>detalles: ${producto.detalles}</li>`;
                
                template += `
                    <tr productId="${producto.id}">
                        <td>${producto.id}</td>
                        <td>${producto.nombre}</td>
                        <td><ul>${descripcion}</ul></td>
                        <td>
                            <button class="product-edit btn btn-primary">Editar</button>
                            <button class="product-delete btn btn-danger">Eliminar</button>
                        </td>
                    </tr>`;
            });
            $('#products').html(template);
        }
    });
}

function buscarProducto() {
    let search = $('#search').val();
    $.get(`./backend/product-search.php?search=${search}`, function (data) {
        let productos = JSON.parse(data);
        let template = '', template_bar = '';
        
        productos.forEach(producto => {
            let descripcion = `
                <li>precio: ${producto.precio}</li>
                <li>unidades: ${producto.unidades}</li>
                <li>modelo: ${producto.modelo}</li>
                <li>marca: ${producto.marca}</li>
                <li>detalles: ${producto.detalles}</li>`;
            
            template += `
                <tr productId="${producto.id}">
                    <td>${producto.id}</td>
                    <td>${producto.nombre}</td>
                    <td><ul>${descripcion}</ul></td>
                    <td>
                        <button class="product-edit btn btn-primary">Editar</button>
                        <button class="product-delete btn btn-danger">Eliminar</button>
                    </td>
                </tr>`;

            template_bar += `<li>${producto.nombre}</li>`;
        });

        $('#product-result').addClass('d-block');
        $('#container').html(template_bar);
        $('#products').html(template);
    });
}

function agregarProducto() {
    let name = $('#name').val().trim();
    let description = $('#description').val().trim();

    // Validaciones de los campos
    if (name === "") {
        alert("Error: El nombre del producto no puede estar vacío.");
        return;
    }

    if (description === "") {
        alert("Error: La descripción no puede estar vacía.");
        return;
    }

    try {
        var finalJSON = JSON.parse(description); 
        // Validar que la descripción sea un JSON válido
    } catch (e) {
        alert("Error: La descripción no tiene un formato JSON válido.");
        return;
    }

    // Validaciones de los campos del JSON
    if (!finalJSON.precio || isNaN(finalJSON.precio) || finalJSON.precio <= 0) {
        alert("Error: El precio debe ser un número mayor que 0.");
        return;
    }
    if (!finalJSON.unidades || isNaN(finalJSON.unidades) || finalJSON.unidades <= 0) {
        alert("Error: Las unidades deben ser un número mayor que 0.");
        return;
    }
    if (!finalJSON.modelo || finalJSON.modelo.trim() === "") {
        alert("Error: El modelo no puede estar vacío.");
        return;
    }
    if (!finalJSON.marca || finalJSON.marca.trim() === "") {
        alert("Error: La marca no puede estar vacía.");
        return;
    }
    if (!finalJSON.detalles || finalJSON.detalles.trim() === "") {
        alert("Error: Los detalles no pueden estar vacíos.");
        return;
    }
    if (!finalJSON.imagen || finalJSON.imagen.trim() === "") {
        alert("Error: La URL de la imagen no puede estar vacía.");
        return;
    }

    finalJSON['nombre'] = name;
    let id = $('#productId').val(); // Obtener el ID del producto
    let url = id ? './backend/product-update.php' : './backend/product-add.php'; // Determinar si es una actualización o una inserción
    let method = id ? 'PUT' : 'POST'; // Método HTTP correspondiente

    $.ajax({
        url: url,
        type: method,
        contentType: 'application/json',
        data: JSON.stringify({ id, ...finalJSON }),
        success: function (response) {
            let respuesta = JSON.parse(response);
            $('#product-result').addClass('d-block');
            $('#container').html(`
                <li style="list-style: none;">status: ${respuesta.status}</li>
                <li style="list-style: none;">message: ${respuesta.message}</li>`);
            listarProductos();}
    });
}

$(document).on('click', '.product-delete', function () {
    if (confirm("¿De verdad deseas eliminar el Producto?")) {
        let id = $(this).closest('tr').attr('productId');
        $.get(`./backend/product-delete.php?id=${id}`, function (response) {
            let respuesta = JSON.parse(response);
            $('#product-result').addClass('d-block');
            $('#container').html(`
                <li style="list-style: none;">status: ${respuesta.status}</li>
                <li style="list-style: none;">message: ${respuesta.message}</li>`);
            listarProductos();
        });
    }
});

$(document).on('click', '.product-edit', function () {
    let id = $(this).closest('tr').attr('productId');

    $.get(`./backend/product-get.php?id=${id}`, function (data) {
        let producto = JSON.parse(data);

        // Cargar los datos en el formulario
        $('#name').val(producto.nombre);
        $('#description').val(JSON.stringify(producto, null, 2)); 
        $('#productId').val(producto.id); // Guardar el ID para la actualización

        // Cambiar el texto del botón para indicar que se actualizará un producto
        $('#add-product-btn').text("Actualizar Producto");
    });
});
