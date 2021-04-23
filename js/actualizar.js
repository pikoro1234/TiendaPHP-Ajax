$(document).ready(function(){

    const idProducto = $('#idProducto').val();
    const nombreProducto = $('#nombreProducto').val();
    const precioProducto = $('#precio').val();
    const descripcionProducto = $('#descripcion').val();
    const pesoProducto = $('#peso').val();
    const dimensionProducto = $('#dimension').val();
    const marcaProducto = $('#marca').val();
    const colorProducto = $('#color').val();
    const envaseProducto = $('#envase').val();
    const categoriaProducto = $('#categoria').val();
    const estadoProducto = $('#estado').val();

    $('#btnActualizarPro').on('click',(e) =>{

        /* function actualizarMiProducto($conPDO, $id, $nombre, $precio, $descripcion, $peso, $dimension, $marca, $color, $envase, $categoria, $estado){*/

        envioFormularioActualizar(idProducto,nombreProducto,precioProducto,descripcionProducto,pesoProducto,dimensionProducto,marcaProducto,colorProducto,envaseProducto,categoriaProducto,estadoProducto);

        /* console.log("id -- "+idProducto+
        "nombre -- "+nombreProducto+
        "precio -- "+precioProducto+
        "descripcion -- "+descripcionProducto+
        "peso -- "+pesoProducto+
        "dimension -- "+dimensionProducto+
        "marca -- "+marcaProducto+
        "color -- "+colorProducto+
        "envase -- "+envaseProducto+
        "cat -- "+categoriaProducto+
        "esta -- "+estadoProducto); */

        e.preventDefault();

    })


    /* FUNCION QUE ENVIA LOS DATOS DEL FORMULARIO */
    const envioFormularioActualizar = ( id,nombre,precio,descripcion,peso,dimension,marca,color,envase,categoria,estado ) =>{    
        
        const valores = {
            "idProducto" : id,
            "nombreProducto" : nombre,
            "precioProducto" : precio,
            "descripcionProducto" : descripcion,
            "pesoProducto" : peso,
            "dimensionProducto" : dimension,
            "marcaProducto" : marca,
            "colorProducto" : color,
            "envaseProducto" : envase,
            "categoriaProducto" : categoria,
            "estadoProducto" : estado
        }

        __ajax("../modelsJS/registrarUsuario.php", valores)
        .done((info) =>{
            console.log(info);

            let resultado = JSON.parse(info).result;

            if (resultado === 'true') { 
                
                $(".alerta-flotante").css("display", "block");

                $('.alerta-flotante').hide(7000);

            }else{

                $(".alerta-flotante-false").css("display", "block");

                $('.alerta-flotante-false').hide(7000);
            }   
        })
    }



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