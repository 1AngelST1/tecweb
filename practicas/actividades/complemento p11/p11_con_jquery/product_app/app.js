// JSON BASE A MOSTRAR EN FORMULARIO
var baseJSON = {
    "nombre": "NA",
    "precio": 0.0,
    "unidades": 1,
    "modelo": "XX-000",
    "marca": "NA",
    "detalles": "NA",
    "imagen": "img/default.png"
};

$(document).ready(function(){
    let edit = false;

    // Inicializar formulario con valores base
    function inicializarFormulario(){
    $('#nombre').val(baseJSON.nombre);
    $('#precio').val(baseJSON.precio);
    $('#unidades').val(baseJSON.unidades);
    $('#modelo').val(baseJSON.modelo);
    $('#marca').val(baseJSON.marca);
    $('#detalles').val(baseJSON.detalles);
    $('#imagen').val(baseJSON.imagen);
    }

    inicializarFormulario();
    $('#product-result').hide();
    listarProductos();

    // Función para listar productos
    function listarProductos() {
        $.ajax({
            url: './backend/product-list.php',
            type: 'GET',
            success: function(response) {
                const productos = JSON.parse(response);
                if(Object.keys(productos).length > 0) {
                    let template = '';
                    productos.forEach(producto => {
                        let descripcion = '';
                        descripcion += '<li>precio: '+producto.precio+'</li>';
                        descripcion += '<li>unidades: '+producto.unidades+'</li>';
                        descripcion += '<li>modelo: '+producto.modelo+'</li>';
                        descripcion += '<li>marca: '+producto.marca+'</li>';
                        descripcion += '<li>detalles: '+producto.detalles+'</li>';
                    
                        template += `
                            <tr productId="${producto.id}">
                                <td>${producto.id}</td>
                                <td><a href="#" class="product-item">${producto.nombre}</a></td>
                                <td><ul>${descripcion}</ul></td>
                                <td>
                                    <button class="product-delete btn btn-danger" onclick="eliminarProducto()">
                                        Eliminar
                                    </button>
                                </td>
                            </tr>
                        `;
                    });
                    $('#products').html(template);
                }
            }
        });
    }


/*$(document).ready(function(){
    let edit = false;

    let JsonString = JSON.stringify(baseJSON,null,2);
    $('#description').val(JsonString);
    $('#product-result').hide();
    listarProductos();

    function listarProductos() {
        $.ajax({
            url: './backend/product-list.php',
            type: 'GET',
            success: function(response) {
                // SE OBTIENE EL OBJETO DE DATOS A PARTIR DE UN STRING JSON
                const productos = JSON.parse(response);
            
                // SE VERIFICA SI EL OBJETO JSON TIENE DATOS
                if(Object.keys(productos).length > 0) {
                    // SE CREA UNA PLANTILLA PARA CREAR LAS FILAS A INSERTAR EN EL DOCUMENTO HTML
                    let template = '';

                    productos.forEach(producto => {
                        // SE CREA UNA LISTA HTML CON LA DESCRIPCIÓN DEL PRODUCTO
                        let descripcion = '';
                        descripcion += '<li>precio: '+producto.precio+'</li>';
                        descripcion += '<li>unidades: '+producto.unidades+'</li>';
                        descripcion += '<li>modelo: '+producto.modelo+'</li>';
                        descripcion += '<li>marca: '+producto.marca+'</li>';
                        descripcion += '<li>detalles: '+producto.detalles+'</li>';
                    
                        template += `
                            <tr productId="${producto.id}">
                                <td>${producto.id}</td>
                                <td><a href="#" class="product-item">${producto.nombre}</a></td>
                                <td><ul>${descripcion}</ul></td>
                                <td>
                                    <button class="product-delete btn btn-danger" onclick="eliminarProducto()">
                                        Eliminar
                                    </button>
                                </td>
                            </tr>
                        `;
                    });
                    // SE INSERTA LA PLANTILLA EN EL ELEMENTO CON ID "productos"
                    $('#products').html(template);
                }
            }
        });
    }
*/

// funcion para buscar productos
    $('#search').keyup(function() {
        if($('#search').val()) {
            let search = $('#search').val();
            $.ajax({
                url: './backend/product-search.php?search='+$('#search').val(),
                data: {search},
                type: 'GET',
                success: function (response) {
                    if(!response.error) {
                        // SE OBTIENE EL OBJETO DE DATOS A PARTIR DE UN STRING JSON
                        const productos = JSON.parse(response);
                        
                        // SE VERIFICA SI EL OBJETO JSON TIENE DATOS
                        if(Object.keys(productos).length > 0) {
                            // SE CREA UNA PLANTILLA PARA CREAR LAS FILAS A INSERTAR EN EL DOCUMENTO HTML
                            let template = '';
                            let template_bar = '';

                            productos.forEach(producto => {
                                // SE CREA UNA LISTA HTML CON LA DESCRIPCIÓN DEL PRODUCTO
                                let descripcion = '';
                                descripcion += '<li>precio: '+producto.precio+'</li>';
                                descripcion += '<li>unidades: '+producto.unidades+'</li>';
                                descripcion += '<li>modelo: '+producto.modelo+'</li>';
                                descripcion += '<li>marca: '+producto.marca+'</li>';
                                descripcion += '<li>detalles: '+producto.detalles+'</li>';
                            
                                template += `
                                    <tr productId="${producto.id}">
                                        <td>${producto.id}</td>
                                        <td><a href="#" class="product-item">${producto.nombre}</a></td>
                                        <td><ul>${descripcion}</ul></td>
                                        <td>
                                            <button class="product-delete btn btn-danger">
                                                Eliminar
                                            </button>
                                        </td>
                                    </tr>
                                `;

                                template_bar += `
                                    <li>${producto.nombre}</il>
                                `;
                            });
                            // SE HACE VISIBLE LA BARRA DE ESTADO
                            $('#product-result').show();
                            // SE INSERTA LA PLANTILLA PARA LA BARRA DE ESTADO
                            $('#container').html(template_bar);
                            // SE INSERTA LA PLANTILLA EN EL ELEMENTO CON ID "productos"
                            $('#products').html(template);    
                        }
                    }
                }
            });
        }
        else {
            $('#product-result').hide();
        }
    });

    /* validar cada campo cada vez que el "foco" sale de un campo
    // prueba de validación de campo nombre
    $('#nombre').blur(function() {
        if($('#nombre').val() == '') {
            $('#nombre').addClass('is-invalid');
        }
        else {
            $('#nombre').removeClass('is-invalid');
        }
    });*/

    // Validar cada campo cada vez que el "foco" cambie de campo
    $('#product-form input').blur(function() {
        let template_bar = '';
        if ($(this).val() === '') {
            $(this).addClass('is-invalid');
            template_bar += `
                <li style="list-style: none;">Error: El campo ${$(this).attr('id')} es requerido.</li>
            `;
        } else {
            $(this).removeClass('is-invalid');
            template_bar += `
                <li style="list-style: none;">El campo ${$(this).attr('id')} es válido.</li>
            `;
        }
        $('#product-result').show();
        $('#container').html(template_bar);
    });

    // Validar nombres del producto al teclear opciones similares ( se tomo en base a la funcion serach)
    $('#nombre').keyup(function() {
        let search = $(this).val();
        if (search) {
            $.ajax({
                url: './backend/product-search.php',
                data: { search },
                type: 'GET',
                success: function(response) {
                    if (!response.error) {
                        const productos = JSON.parse(response);
                        if (Object.keys(productos).length > 0) {
                            let template = '';
                            let templateTable = '';
                            productos.forEach(producto => {
                                template += `
                                    <li>${producto.nombre}</li>
                                `;
                                let descripcion = `
                                    <li>precio: ${producto.precio}</li>
                                    <li>unidades: ${producto.unidades}</li>
                                    <li>modelo: ${producto.modelo}</li>
                                    <li>marca: ${producto.marca}</li>
                                    <li>detalles: ${producto.detalles}</li>
                                `;
                                templateTable += `
                                    <tr productId="${producto.id}">
                                        <td>${producto.id}</td>
                                        <td><a href="#" class="product-item">${producto.nombre}</a></td>
                                        <td><ul>${descripcion}</ul></td>
                                        <td>
                                            <button class="product-delete btn btn-danger" onclick="eliminarProducto()">
                                                Eliminar
                                            </button>
                                        </td>
                                    </tr>
                                `;
                            });
                            $('#product-result').show();
                            $('#container').html(template);
                            $('#products').html(templateTable);
                        } else {
                            $('#product-result').hide();
                            $('#products').html(''); // Limpiar la tabla si no hay resultados
                        }
                    }
                }
            });
        } else {
            $('#product-result').hide();
            $('#products').html(''); // Limpiar la tabla si el campo de búsqueda está vacío
        }
    });

    // funcion para manejar el envio del formulario
    $('#product-form').submit(e => {
        e.preventDefault();

        // Validar que los campos requeridos no sean vacíos
        let isValid = true;
        let template_bar = '';
        $('#product-form input').each(function() {
            if ($(this).val() === '') {
                $(this).removeClass('is-invalid');
                template_bar += `
                    <li style="list-style: none;">El campo ${$(this).attr('id')} es requerido.</li>
                `;
                isValid = false;
            } else{
                $(this).removeClass('is-invalid');
            }
        });

        if (!isValid) {
            $('#product-result').show();
            $('#container').html(template_bar);
            return;
        }


        // Crear objeto con los datos del formulario
        let postData = {
            nombre: $('#nombre').val(),
            precio: $('#precio').val(),
            unidades: $('#unidades').val(),
            modelo: $('#modelo').val(),
            marca: $('#marca').val(),
            detalles: $('#detalles').val(),
            imagen: $('#imagen').val(),
            id: $('#productId').val()
        };

        /* SE CONVIERTE EL JSON DE STRING A OBJETO
        let postData = JSON.parse( $('#description').val() );
        // SE AGREGA AL JSON EL NOMBRE DEL PRODUCTO
        postData['nombre'] = $('#name').val();
        postData['id'] = $('#productId').val();
        */

        /**
         * AQUÍ DEBES AGREGAR LAS VALIDACIONES DE LOS DATOS EN EL JSON
         * --> EN CASO DE NO HABER ERRORES, SE ENVIAR EL PRODUCTO A AGREGAR
         **/

        const url = edit === false ? './backend/product-add.php' : './backend/product-edit.php';
        
        $.post(url, postData, (response) => {
            //console.log(response);
            // SE OBTIENE EL OBJETO DE DATOS A PARTIR DE UN STRING JSON
            let respuesta = JSON.parse(response);
            // SE CREA UNA PLANTILLA PARA CREAR INFORMACIÓN DE LA BARRA DE ESTADO
            let template_bar = '';
            template_bar += `
                        <li style="list-style: none;">status: ${respuesta.status}</li>
                        <li style="list-style: none;">message: ${respuesta.message}</li>
                    `;
            
            $('#product-form')[0].reset();
            $('#product-result').show();
            $('#container').html(template_bar);
            
            /*
            // SE REINICIA EL FORMULARIO
            $('#name').val('');
            $('#description').val(JsonString);
            // SE HACE VISIBLE LA BARRA DE ESTADO
            $('#product-result').show();
            // SE INSERTA LA PLANTILLA PARA LA BARRA DE ESTADO
            $('#container').html(template_bar);
            */
            
            // SE LISTAN TODOS LOS PRODUCTOS
            listarProductos();

            // cambia el texto del boton a "agregar producto"
            $('#product-form').find('button[type="submit"]').text('Agregar Producto');
            // SE REGRESA LA BANDERA DE EDICIÓN A false
            edit = false;
            inicializarFormulario();
        });
    });

    // funcion para eliminar productos
    $(document).on('click', '.product-delete', (e) => {
        if(confirm('¿Realmente deseas eliminar el producto?')) {
            const element = $(this)[0].activeElement.parentElement.parentElement;
            const id = $(element).attr('productId');
            $.post('./backend/product-delete.php', {id}, (response) => {
                //actualiza barara de estatus
                let respuesta = JSON.parse(response);
                let template_bar = '';
                if (respuesta.status === 'error') {
                    // Mostrar mensaje de error
                    template_bar += `
                        <li style="list-style: none;">Error: ${respuesta.message}</li>
                    `;
                } else {
                    // Mostrar mensaje de éxito
                    template_bar += `
                        <li style="list-style: none;">status: ${respuesta.status}</li>
                        <li style="list-style: none;">message: ${respuesta.message}</li>
                    `;
                }

                $('#product-result').show();
                $('#container').html(template_bar);

                //$('#product-result').hide();
                listarProductos();
            });
        }
    });

    // funcion para editar productos
    $(document).on('click', '.product-item', (e) => {

        // SE OBTIENE EL ID DEL PRODUCTO A EDITAR
        const element = $(this)[0].activeElement.parentElement.parentElement;
        const id = $(element).attr('productId');
        $.post('./backend/product-single.php', {id}, (response) => {
            // SE CONVIERTE A OBJETO EL JSON OBTENIDO
            let product = JSON.parse(response);
            // SE INSERTAN LOS DATOS ESPECIALES EN LOS CAMPOS CORRESPONDIENTES
            $('#nombre').val(product.nombre);
            $('#precio').val(product.precio);
            $('#unidades').val(product.unidades);
            $('#modelo').val(product.modelo);
            $('#marca').val(product.marca);
            $('#detalles').val(product.detalles);
            $('#imagen').val(product.imagen);
            // EL ID SE INSERTA EN UN CAMPO OCULTO PARA USARLO DESPUÉS PARA LA ACTUALIZACIÓN
            $('#productId').val(product.id);
            
            /*/ SE ELIMINA nombre, eliminado E id PARA PODER MOSTRAR EL JSON EN EL <textarea>
            delete(product.nombre);
            delete(product.eliminado);
            delete(product.id);
            // SE CONVIERTE EL OBJETO JSON EN STRING
            let JsonString = JSON.stringify(product,null,2);
            // SE MUESTRA STRING EN EL <textarea>
            $('#description').val(JsonString);
            */

            // SE PONE LA BANDERA DE EDICIÓN EN true
            edit = true;

            // cambia el texto del boton a "modificar producto"
            $('#product-form').find('button[type="submit"]').text('Modificar Producto');

        });

        e.preventDefault();
    });    
});