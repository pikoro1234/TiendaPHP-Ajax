$(document).ready(function (){

    let contenedorCardsProd = document.querySelector('.content-productos');

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


    /* AJAX OBTENCION TODOS LOS PRODUCTOS AL RECARGAR LA PAGINA */
    const __ajaxAllProductos = (url) => {  

        const ajax = $.ajax({
            "method":"POST",
            "url":url,
        })

        return ajax;
    }
    /* AJAX OBTENCION TODOS LOS PRODUCTOS AL RECARGAR LA PAGINA */



    /* LLLAMADA ARCHIVO PHP CON LA CONSULTA DE LOS PRODUCTOS */
    __ajaxAllProductos("./modelsJS/todosLosProductos.php")
    .done((info) =>{

        let preciosOrdenado = JSON.parse(info);

        cardsProductos(preciosOrdenado);
    })
    /* LLLAMADA ARCHIVO PHP CON LA CONSULTA DE LOS PRODUCTOS */


});