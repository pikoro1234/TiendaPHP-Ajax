$(document).ready(function(){
    
    let foto1 = document.getElementById('foto1');

    let foto2 = document.getElementById('foto2');

    let foto3 = document.getElementById('foto3'); 

    /* DATOS DEL PRODUCTO Y EL VENDEDOR */

    let usuario = $('#user').val(); 

    let nombreProducto = $('#nombreProducto');

    let precioProducto = $('#precio'); 

    let descripcionProducto = $('#descripcion').val();  

    let pesoProducto = $('#peso').val();  

    let dimensionProducto = $('#dimension').val();   

    let marcaProducto = $('#marca').val();   

    let colorProducto = $('#color').val();  

    let envaseProducto = $('#envase').val();    

    let categoriaProducto = $('#categoriaCrear').val();   

    let estadoProducto = $('#estado').val();   

    let latitud = $('#latCrear').val();  

    let longitud = $('#longCrear').val();

    
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

                            return true;
                        }

                    }else{

                        return false;
                    }

                }else{                    

                    return true;
                }

            }else{

                return false;
            }

        }else{

            alert("la primera foto no debe quedar vacia");
        }
    }
    /* VALIDACION DE TIPO FORMATOS DE FOTOS */



    /* VALIDACION DE LOS CAMPOS DEL FORMULARIO */
    const validacionDatosForm = () =>{

    }
    /* VALIDACION DE LOS CAMPOS DEL FORMULARIO */



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

        alert("el valor FFF de los campos es: "+$(input).val());

        $(".texto-alerta").remove();

        $(input).removeClass('focusElemento');
    }
    /* LIMPIAMOS LOS INPUT CUANDO TODO ESTA VALIDADO */



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

            if (focusInput(nombreProducto) && focusInput(precioProducto)) {
                
                alert("si correcto ambos verdadero");                

            }else{            

                alert("falso todo falso")
            }                                                            

        }else{

            alert("el formato de las fotos deben ser PNG/JPEG");
        }
    })
    /* BOTON ACTIVA EVENTO ENVIO DE FORMULARIO */


})
