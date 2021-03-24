$(document).ready(function(){

    let map, lat, lng;


    const loadMap = () =>{

        map = L.map('map').setView([41.388, 2.159], 13);

        L.esri.basemapLayer('Topographic').addTo(map);
    }

    loadMap();


    const direcciones = () =>{

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
    })
    


})