$(document).ready(function(){

    let idProducto = $('#idSingle').val();

    let container = document.querySelector('.container');

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

    let datoEnvio = "idProduct="+idProducto;

    __ajax("../modelsJS/single.php", datoEnvio)
        .done((info)=>{

        let producto = JSON.parse(info);

        construccionSingle(producto)
    })

    const construccionSingle = (datos) =>{

        container.innerHTML = '';

        for( let items of datos){

            container.innerHTML += `
            <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"></li>
                    <li data-bs-target="#carouselExampleDark" data-bs-slide-to="1"></li>
                    <li data-bs-target="#carouselExampleDark" data-bs-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active" data-bs-interval="1000">
                        <img src="${items.imagen_front}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item" data-bs-interval="1000">
                        <img src="${items.imagen_left}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item" data-bs-interval="1000">
                        <img src="${items.imagen_back}" class="d-block w-100" alt="...">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleDark" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleDark" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </a>
            </div>

            <br>
            <br>
            <br>
            <br>

            <h1 class="text-center my-3">Datos del Producto</h1>
            <div class="card w-100 mt-2 mb-5" style="box-shadow: 0 -6px 20px #00000059;">
                <div class="card-body mb-5">
                    <h2 class="card-title text-center">${items.nombre}</h2>
                    <div class="datos-internos d-flex">
                        <div class="content-left-card w-50 p-5">
                            <div class="cards-internos d-flex mb-3 justify-content-between">
                                <div class="cards-internos-left w-50">
                                    <p class="card-text"><strong>categoria: </strong>${items.categoria}<?php echo $arraySingle[0]['categoria']?></p>
                                    <p class="card-text"><strong>visitas: </strong>${items.numero_visitas}<?php echo $valor?></p>
                                </div>
                                <div class="cards-internos-rigth w-50">
                                    <p class="card-text"><strong>stock: </strong>${items.estado}<?php echo $arraySingle[0]['estado']?></p>
                                    <p class="card-text"><strong>fecha: </strong>${items.fecha}<?php echo $arraySingle[0]['fecha']?></p>
                                </div>
                            </div>
                            <h3 class="card-text text-center">descripcion</h3>
                            <p class="card-text">
                            ${items.descripcion}
                            <?php echo strlen($arraySingle[0]['descripcion']) === 0 ? 'sin ninguna descripcion especificada por el usuario' : $arraySingle[0]['descripcion'];?>
                            </p>
                        </div>
                        <div class="content-rigth-card w-50 p-5">
                            <div class="contenedor-rigth d-flex justify-content-around">
                                <div class="contenedor-left-fond">
                                    <p class="card-text"><strong>precio: </strong>${items.precio}<?php echo $arraySingle[0]['precio']?></p>
                                    <p class="card-text"><strong>peso: </strong>
                                    ${items.peso}
                                    <?php echo strlen($arraySingle[0]['peso']) === 0 ? 'sin peso' : $arraySingle[0]['peso'];?>
                                    </p>
                                    <p class="card-text"><strong>color: </strong>
                                    ${items.color}
                                    <?php echo strlen($arraySingle[0]['color']) === 0 ? 'sin color' : $arraySingle[0]['color'];?>
                                    </p>
                                </div>
                                <div class="contenedor-rigth-fond">
                                    <p class="card-text"><strong>marca: </strong>
                                    ${items.marca}
                                    <?php echo strlen($arraySingle[0]['marca']) === 0 ? 'sin marca' : $arraySingle[0]['marca'];?>
                                    </p>
                                    <p class="card-text"><strong>envase: </strong>
                                    ${items.envase}
                                    <?php echo strlen($arraySingle[0]['envase']) === 0 ? 'sin envase' : $arraySingle[0]['envase'];?>
                                    </p>
                                    <p class="card-text"><strong>dimensiones: </strong>
                                    ${items.dimension}
                                    <?php echo strlen($arraySingle[0]['dimension']) === 0 ? 'sin dimensiones' : $arraySingle[0]['dimension'];?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>`;
        }

    }

})