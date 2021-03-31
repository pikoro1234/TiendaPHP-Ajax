$(document).ready(function(){

    /* DATOS DEL PRODUCTO Y EL VENDEDOR */
    let foto1 = document.getElementById('foto1');

    let foto2 = document.getElementById('foto2');

    let foto3 = document.getElementById('foto3'); 

    let usuario = $('#user').val(); 

    let nombreProducto = $('#nombreProducto');

    let precioProducto = $('#precio'); 

    let descripcionProducto = $('#descripcion');  

    let pesoProducto = $('#peso');  

    let dimensionProducto = $('#dimension');   

    let marcaProducto = $('#marca');   

    let colorProducto = $('#color');  

    let envaseProducto = $('#envase');    

    let categoriaProducto = $('#categoriaCrear');   

    let estadoProducto = $('#estado');   
    
    /* VALIDACION DE TIPO FORMATOS DE FOTOS */
    const validacionFotos = (foto1, foto2, foto3) =>{

        if (foto1.files.length > 0) {

            if (foto1.files[0].type === "image/png" || foto1.files[0].type === "image/jpeg"){

                if (foto2.files.length > 0) {

                    if (foto2.files[0].type === "image/png" || foto2.files[0].type === "image/jpeg"){

                        if (foto3.files.length > 0) {

                            if (foto3.files[0].type === "image/png" || foto3.files[0].type === "image/jpeg"){

                                return true;

                            }else{

                                return false;
                            }
                      
                        }else{

                            return false;
                        }

                    }else{

                        return false;
                    }

                }else{                    

                    return false;
                }

            }else{

                return false;
            }

        }else{

            alert("la primera foto no debe quedar vacia");
        }
    }
    /* VALIDACION DE TIPO FORMATOS DE FOTOS */



    /* FOCUS PARA LOS ERRORES */
    const focusInput = (elemento) =>{

        if ($(elemento).val() == "") {

            generadorErrores(elemento);

            return false;    
            
        }else{

            limpiadorErrores(elemento);

            return true;                                    
        }
    }
    /* FOCUS PARA LOS ERRORES */



    /* FUNCION QUE GENERA LOS ERRORES DE INPUTS */
    const generadorErrores = (input) =>{

        if ($(input).val() == "") {

            $(input).addClass('focusElemento');

            $(input).after(`<p class="text-danger texto-alerta">el campo no debe quedar vacio</p>`);

            $('.texto-alerta').css('display','block');
        }
    }
    /* FUNCION QUE GENERA LOS ERRORES DE INPUTS */



    /* LIMPIAMOS LOS INPUT CUANDO TODO ESTA VALIDADO */
    const limpiadorErrores = (input) =>{       

        $(".texto-alerta").remove();

        $(input).removeClass('focusElemento');
    }
    /* LIMPIAMOS LOS INPUT CUANDO TODO ESTA VALIDADO */



    /* DATOS VACIOS REEMPLACE */
    const generadorDatosRelleno = (element, mensaje) =>{

        let dato;

       if ($(element).val() == "") {

            dato = mensaje
            
        }else{

            dato = $(element).val();
        }

        return dato

    }
    /* DATOS VACIOS REEMPLACE */


    
    /* ENVIO DEL FORMULARIO A PHP */
    const envioFormulario = () =>{

        let formData = new FormData();

        jQuery.each(jQuery('#foto1')[0].files, function(i, file1) {

            formData.append('image1', file1)
        })

        jQuery.each(jQuery('#foto2')[0].files, function(i, file2) {

            formData.append('image2', file2)
        })

        jQuery.each(jQuery('#foto3')[0].files, function(i, file3) {

            formData.append('image3', file3)
        })

        formData.append('userNick', usuario);

        formData.append('nombreProducto', $(nombreProducto).val());

        formData.append('precioProducto', $(precioProducto).val());

        formData.append('descripcionProducto', generadorDatosRelleno(descripcionProducto, "sin descripcion"));

        formData.append('pesoProducto', generadorDatosRelleno(pesoProducto, "sin peso especificado"));

        formData.append('dimensionProducto', generadorDatosRelleno(dimensionProducto, "sin dimension especificada"));

        formData.append('marcaProducto', generadorDatosRelleno(marcaProducto, "sin marca"));

        formData.append('colorProducto', generadorDatosRelleno(colorProducto, "ningun color"));

        formData.append('envaseProducto', generadorDatosRelleno(envaseProducto, "sin envase"));

        formData.append('categoriaProducto', $(categoriaProducto).val());

        formData.append('estadoProducto', generadorDatosRelleno(estadoProducto, "estado null"));

        __ajax("../../modelsJS/crearProductos.php", formData)
        .done((info)=>{
            
            console.log(info);
        })
    }
    /* ENVIO DEL FORMULARIO A PHP */


    /* POST AJAX A ENVIO MAS FOTOS */
    const __ajax= (url, data) => {  

        const ajax = $.ajax({
            "method":"POST",
            "url":url,
            "data":data,
            cache: false,
            contentType: false,
            processData: false,
        })

        return ajax;
    }
    /* POST AJAX A ENVIO MAS FOTOS */


    /* BOTON ACTIVA EVENTO ENVIO DE FORMULARIO */
    $('#enviarDatosProductos').on('click', (e) =>{

        e.preventDefault();

        if (validacionFotos(foto1, foto2, foto3)) {

            if (focusInput(nombreProducto) && focusInput(precioProducto) && focusInput(categoriaProducto)) {
                    
                envioFormulario();              

            }else{            

                alert('verifica los datos del formulario');
            }                                                            

        }else{

            alert("(OBLIGATORIO ENVIAR TODAS LAS FOTOS) formato permitido PNG/JPEG");
        }
    })
    /* BOTON ACTIVA EVENTO ENVIO DE FORMULARIO */


})
