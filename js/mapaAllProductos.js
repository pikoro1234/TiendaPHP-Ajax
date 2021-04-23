$(document).ready(function(){

    let map;

    /* POST AJAX A REUTILIZAR PARA TODAS LAS PETICIONES */
    const __ajaxDatosMapa= (url) => {  

        const ajax = $.ajax({
            "method":"POST",
            "url":url
        })

        return ajax;
    }
    /* POST AJAX A REUTILIZAR PARA TODAS LAS PETICIONES */



     /* POST AJAX A REUTILIZAR PARA TODAS LAS PETICIONES */
     const __ajaxProductosSingles= (url, data) => {  

        const ajax = $.ajax({
            "method":"POST",
            "url":url,
            "data":data
        })

        return ajax;
    }
    /* POST AJAX A REUTILIZAR PARA TODAS LAS PETICIONES */



    /* OBTENEMOS TODOS LOS DATOS DE LOS CLIENTES */
    const consultaDatos = () =>{

        __ajaxDatosMapa("./modelsJS/datosMapa.php")
        .done((info) =>{

            let datosMapa = JSON.parse(info);

            obtenerLatiLong(datosMapa);
        })
    }
    /* OBTENEMOS TODOS LOS DATOS DE LOS CLIENTES */



    /* GENERAMOS CONTENIDO DE MARKET PERSONALIZADO */
    const generMarkerPersonalizado = (arrayElementos, usuario, idUserconst ,mark) =>{

        let nombreProducto = [];

        for (let index = 0; index < arrayElementos.length; index++) {

            nombreProducto.push(index+".- "+arrayElementos[index].nombre +"</br>");
           
            mark.bindPopup(`<figure class="figure">
            <img src="${arrayElementos[index].imagen_front}" class="figure-img img-fluid rounded" alt="..."><figcaption class="figure-caption">Imagen producto</figcaption></figure><b class="text-center d-block">${usuario}</b></br> <em class="text-primary mb-3">el id es: ${idUserconst}</em></br></br> <span class="text-center d-block mb-2 text-success font-weight-bold fs-3">Mis Productos</span><b><span class="fs-3">${nombreProducto}</span></b></br>`).openPopup(); 
        }

    }
    /* GENERAMOS CONTENIDO DE MARKET PERSONALIZADO */



    /* GENERAMOS CONTENIDO DE MARKET PERSONALIZADO */
    const generMarkerVacio = (usuario, idUserconst ,mark) =>{

        mark.bindPopup(`<b class="text-center d-block">${usuario}</b></br> <em class="text-primary mb-3">el id es: ${idUserconst}</em></br></br> <span class="text-center d-block mb-2 text-danger">Aun no tienes productos</b></br>`).openPopup(); 

    }
    /* GENERAMOS CONTENIDO DE MARKET PERSONALIZADO */



    /* MIS PRODUCTOS POR CADA MARKER */
    const misProductosMarker = (user, id, mark) =>{        

        let idUsuario = "id="+id;

        __ajaxProductosSingles("./modelsJS/productosAllMapa.php",idUsuario)
        .done((info) =>{

            let productos = JSON.parse(info);

            if (productos.length > 0) {
            
                generMarkerPersonalizado(productos, user, id,mark);

            }else{

                generMarkerVacio( user, id,mark);
            }            
        })
    }
    /* MIS PRODUCTOS POR CADA MARKER */



    /* LISTADO DE PRODUCTOS EN EL MARKER */
    const productosMarker = (mark, user, idUser) =>{
    
        misProductosMarker(user, idUser, mark);

    }
    /* LISTADO DE PRODUCTOS EN EL MARKER */


    /* CONSTRUIMOS LOS MARKERS DE LOS PRODUCTOS */
    const generadorMarker = (lat, longi, user, idUser) =>{

        let marker = L.marker([lat, longi]).addTo(map);

        productosMarker(marker, user, idUser);

    }
    /* CONSTRUIMOS LOS MARKERS DE LOS PRODUCTOS */


    /* OBTENEMOS LATITUD Y LONGITUD */
    const obtenerLatiLong = (datos) =>{

        for (const property in datos) {

            let latitud = datos[property].latitud;

            let nick = datos[property].nick_user;

            let longitud = datos[property].longitud;

            let idUser = datos[property].id;

            generadorMarker(latitud, longitud, nick, idUser);
        }
    }
    /* OBTENEMOS LATITUD Y LONGITUD */



    /* INICIALIZACION DEL MAPA */
    const loadMap = () =>{

        map = L.map('map').setView([41.388, 2.159], 13);

        L.esri.basemapLayer('Topographic').addTo(map);

        consultaDatos();
    }
    /* INICIALIZACION DEL MAPA */

    loadMap();
    
})