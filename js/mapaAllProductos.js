$(document).ready(function(){

    

    let map, lat, lng;

    /* POST AJAX A REUTILIZAR PARA TODAS LAS PETICIONES */
    const __ajaxDatosMapa= (url) => {  

        const ajax = $.ajax({
            "method":"POST",
            "url":url
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


    /* CONSTRUIMOS LOS MARKERS DE LOS PRODUCTOS */
    const generadorMarker = (lat, longi, user) =>{
        console.log("las lat son"+lat+" - "+longi+" - "+user);

        let marker = L.marker([lat, longi]).addTo(map);
        
    }
    /* CONSTRUIMOS LOS MARKERS DE LOS PRODUCTOS */

    /* OBTENEMOS LATITUD Y LONGITUD */
    const obtenerLatiLong = (datos) =>{

        console.log(datos);

        for (const property in datos) {

            let latitud = datos[property].latitud;

            let nick = datos[property].nick_user;

            let longitud = datos[property].longitud;

            generadorMarker(latitud, longitud, nick);
            /* console.log(`${property}: ${latitud} - ${longitud}`); */
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


    


    /* select latitud,longitud,nick_user from clientes */

    /*const direcciones = () =>{

        const tipoVia = $("#via").val();

        const nombreCalle = $("#nomCarrer").val();

        const numeroCalle = $("#numCarrer").val();

        const poblacion = $("#poblacio").val();

        const address = `${tipoVia} ${nombreCalle} ${numeroCalle} ${poblacion}`;

        return address;

    }

    const generarMarker = (lat, long) =>{

        let marker = L.marker([lat, long]).addTo(map);
    }

    const geocoderDirecciones = () =>{

        const direccion = direcciones();

        const latInsert = $('#latCrear');

        const longInsert = $('#longCrear');

        L.esri.Geocoding.geocode().text(direccion).run( (err, results, response) =>{

            if (!err) {

                lat = results.results[0].latlng.lat;

                lng = results.results[0].latlng.lng;

                latInsert.val(lat);

                longInsert.val(lng);

                console.log("lat = "+lat+" , lng = "+lng);

                generarMarker(lat, lng);        
            }
        })
    }

    $("#findLoc").on('click', () =>{

        geocoderDirecciones();
    }) */
    
})