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
    let finalJSON = JSON.parse($('#description').val());
    finalJSON['nombre'] = $('#name').val();
    let productoJsonString = JSON.stringify(finalJSON, null, 2);

    $.ajax({
        url: './backend/product-add.php',
        type: 'POST',
        contentType: 'application/json',
        data: productoJsonString,
        success: function (response) {
            let respuesta = JSON.parse(response);
            $('#product-result').addClass('d-block');
            $('#container').html(`
                <li style="list-style: none;">status: ${respuesta.status}</li>
                <li style="list-style: none;">message: ${respuesta.message}</li>`);
            listarProductos();
        }
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