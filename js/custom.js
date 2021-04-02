$(document).ready(function(){

    let contenedorCardsProd = document.querySelector('.content-productos');
    
    /* BOTTON LOGIN */
    $('.btn-login').on('click', (e) => {

        e.preventDefault();    

        let datos = $('#userRegister').val();

        let password = $('#passRegister').val();
    
        let contenedorAlertas = $('.contenedorAlertas');
        
        let envio = "user="+datos+"&password="+password;         
        
        __ajax("../modelsJS/verificarUser.php", envio)
        .done((info)=>{
            
            let resultado = JSON.parse(info).result;

            if (resultado === 'true') {                
                
                window.location = 'http://localhost/TiendaPHP-Ajax/views/dashboard/principal.php';

            }else{                    

                generadorAlertas(contenedorAlertas, 'usuario no existente');
            }
        })
    })
    /* BOTTON LOGIN */



    /* BOTTON BUSCAR */
    $('#btn-buscar').on('click', (ev) => {

        ev.preventDefault();

        let nombreProducto = $('#producto').val();

        if (nombreProducto != "") {

            let nombreBuscar = "producto="+nombreProducto

                __ajaxGet("./modelsJS/buscarProducto.php", nombreBuscar)
                .done((info)=>{

                let productos = JSON.parse(info);

                if (productos.length > 0) {

                    cardsProductos(productos);

                }else{

                    contenedorCardsProd.innerHTML = "";

                    contenedorCardsProd.innerHTML +=`
                        <div class='alert alert-secondary w-100 text-center' role='alert'>
                        Tu busqueda<spam style='font-weight: bold;'> '${nombreProducto}' </spam>no genero ningun resultado
                        </div>`;
                }                                        
            })
            
        }else{

            alert("el campo no debe quedar vacio");
        }
    })
    /* BOTTON BUSCAR */



    /* SELECT FILTRADO POR CATEGORIA */
    $('select[name=categoria]').change(function(){

        let valorSelect = $(this).val();

        let valorEnviar = "categoria="+valorSelect

            __ajaxGet("./modelsJS/filtrarCategoria.php", valorEnviar)
            .done((info)=>{

                let categorias = JSON.parse(info);

                cardsProductos(categorias);
            })
        
    });
    /* SELECT FILTRADO POR CATEGORIA */



    /* BOTON FILTRAR POR PRECIO DESDE-HASTA */
    $('#btn-filtrar').on('click', (e) =>{

        e.preventDefault();

        let desde = $('#desde').val();

        let hasta = $('#hasta').val();

        if (desde != "" && hasta != "") {

            let valoresDesdeHasta = "desde="+desde+"&hasta="+hasta;

            __ajaxGet("./modelsJS/filtrarDesdeHasta.php", valoresDesdeHasta)
            .done((info) =>{

                let desdeHastaArray = JSON.parse(info);

                if (desdeHastaArray.length > 0) {
                    
                    cardsProductos(desdeHastaArray);

                }else{

                    contenedorCardsProd.innerHTML = "";

                    contenedorCardsProd.innerHTML +=`
                        <div class='alert alert-secondary w-100 text-center' role='alert'>
                        El filtrado entre <spam style='font-weight: bold;'> '${desde}' </spam> y <spam style='font-weight: bold;'> ' ${hasta}' </spam>no genero ningun resultado
                        </div>`;
                }                                
            })
            
        }else{
            alert("los campos no deben quedar vacios");
        }    
    })
    /* BOTON FILTRAR POR PRECIO DESDE-HASTA */



    /* ORDENADO POR FECHA ASC-DESC */
    $('select[name=fecha]').change(function(){

        let valorSelect = $(this).val();

        let valorFecha = "fecha="+valorSelect;

        __ajax("./modelsJS/ordenadoFecha.php", valorFecha)
        .done((info) =>{

            let fechasOrdenado = JSON.parse(info);

            cardsProductos(fechasOrdenado);
        })
        
    });
    /* ORDENADO POR FECHA ASC-DESC */



    /* ORDENADO POR PRECIO CARO-BARATO */
    $('select[name=precio]').change(function(){

        let valorSelect = $(this).val();

        let valorPrecio = "precio="+valorSelect;

        __ajax("./modelsJS/ordenadoPrecio.php", valorPrecio)
        .done((info) =>{

            let preciosOrdenado = JSON.parse(info);

            cardsProductos(preciosOrdenado);
        })
        
    });
    /* ORDENADO POR PRECIO CARO-BARATO */



    /* DESHABILITAMOS TECLA ENTER POR QUE POR DEFECTO ENVIA FORMULARIO PARA NO INTERFERIR CON EL AJAX */
    $("body").keypress(function(e) {
        
        let code = (e.keyCode ? e.keyCode : e.which);

        if(code==13){

            alert('Función DESHABILITADA utiliza los botones para realizar las acciones');

            return false;
        }
    });
    /* DESHABILITAMOS TECLA ENTER POR QUE POR DEFECTO ENVIA FORMULARIO PARA NO INTERFERIR CON EL AJAX */

/*
*
* 
* ==============================
* ==============================
*
*  FUNCIONES GENERALES REUTILIZABLES
*
* ==============================
* ==============================
*
*
*/

    /* GENERADOR DE ALERTA PARA LOS ERRORES */
    const generadorAlertas = (contenedor, dato) => {
        
        contenedor.html(`<div class='alert alert-danger w-100 my-0 px-3 py-3 text-center' role='alert'>${dato}</div>`);               
    } 
    /* GENERADOR DE ALERTA PARA LOS ERRORES */
    


    /* POST AJAX A REUTILIZAR PARA TODAS LAS PETICIONES */
    const __ajax= (url, data) => {  

        const ajax = $.ajax({
            "method":"POST",
            "url":url,
            "data":data
        })

        return ajax;
    }
    /* POST AJAX A REUTILIZAR PARA TODAS LAS PETICIONES */



     /* GET AJAX A REUTILIZAR PARA TODAS LAS PETICIONES */
     const __ajaxGet= (url, data) => {  

        const ajaxget = $.ajax({
            "method":"GET",
            "url":url,
            "data":data
        })

        return ajaxget;
    }
    /* GET AJAX A REUTILIZAR PARA TODAS LAS PETICIONES */



    /* GENERADOR DE TODAS LAS CARDS MEDIANTE ARRAY POR PARAMETRO */
    const cardsProductos = (arrayProductos) =>{

        contenedorCardsProd.innerHTML = "";

        if (arrayProductos.length > 0) {

            for( let items of arrayProductos){

                contenedorCardsProd.innerHTML += `
                <div class='card' style='width: 18rem; position: relative;'>
                    <img style='height: 180px!important;' src='${items.imagen_front}' class='card-img-top' alt='...'>
                    <div class='card-body'>
                        <h5 class='card-title'>${items.nombre}</h5>
                        <p class='card-text'><strong>categoria: </strong>.${items.categoria}</p>
                        <p class='card-text'>${items.descripcion}</p>
                        <p class='card-text'><strong>estado: </strong>.${items.estado}</p>
                        <div class='pree-footer mb-3' style='display:flex;'>
                            <h2 style='display: flex;justify-content: end;'> 
                            <span class=' text-white badge bg-secondary'>€ ${items.precio}</span>
    
                            </h2>                        
                        </div>                      
                        <a href='http://localhost/TiendaPHP-Ajax/views/singlepage.php?param=${items.id}' class='btn btn-primary'>Leer mas...</a>
                    </div>
                </div>`;
            }         
        }
    }
    /* GENERADOR DE TODAS LAS CARDS MEDIANTE ARRAY POR PARAMETRO */

})