$(document).ready(function(){

    let idProducto = $('#idProducto');

    let nombreProducto = $('#nombreProducto');

    let precioProducto = $('#precio');

    let descripcionProducto = $('#descripcion');

    let pesoProducto = $('#peso');

    let dimensionProducto = $('#dimension');

    let marcaProducto = $('#marca');

    let colorProducto = $('#color');

    let envaseProducto = $('#envase');

    let categoriaProducto = $('#categoria');

    let estadoProducto = $('#estado');



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



    /* ENVIO DEL FORMULARIO */
    $('#btnActualizarPro').on('click',(e) =>{

        e.preventDefault();

        if (focusInput(nombreProducto) && focusInput(precioProducto) && focusInput(categoriaProducto) && focusInput(estadoProducto)) {

            envioFormularioActualizar(idProducto,nombreProducto,precioProducto,descripcionProducto,pesoProducto,dimensionProducto,marcaProducto,colorProducto,envaseProducto,categoriaProducto,estadoProducto);
            
        }else{            

            alert('verifica los nuevos datos');
        }

    })
    /* ENVIO DEL FORMULARIO */


    /* FUNCION QUE ENVIA LOS DATOS DEL FORMULARIO */
    const envioFormularioActualizar = ( id,nombre,precio,descripcion,peso,dimension,marca,color,envase,categoria,estado ) =>{    
        
        const valores = {
            "idProducto" : $(id).val(),
            "nombreProducto" : $(nombre).val(),
            "precioProducto" : $(precio).val(),
            "descripcionProducto" : $(descripcion).val(),
            "pesoProducto" : $(peso).val(),
            "dimensionProducto" : $(dimension).val(),
            "marcaProducto" : $(marca).val(),
            "colorProducto" : $(color).val(),
            "envaseProducto" : $(envase).val(),
            "categoriaProducto" : $(categoria).val(),
            "estadoProducto" : $(estado).val()
        }

        __ajaxActualizar("../../modelsJS/actualizarProd.php", valores)
        .done((info) =>{
            console.log(info);

            let resultado = JSON.parse(info).result;

            if (resultado === 'true') { 
                
                $(".alerta-flotante").css("display", "block");

                $('.alerta-flotante').hide(6000);
            }
        })
    }
    /* FUNCION QUE ENVIA LOS DATOS DEL FORMULARIO */



     /* POST AJAX A ENVIO MAS FOTOS */
     const __ajaxActualizar = (url, data) => {  

        const ajax = $.ajax({
            "method":"POST",
            "url":url,
            "data":data,           
        })

        return ajax;
    }
    /* POST AJAX A ENVIO MAS FOTOS */
})