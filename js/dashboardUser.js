let modalContenedor = document.querySelector(".modal-producto");

const modalProducto = (id) =>{

    modalContenedor.innerHTML = "";

    modalContenedor.innerHTML +=`
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body text-center">
        <span class="py-3"><b>¿Esta seguro de eliminar el producto?</b></span>
        <input type="hidden" name="id-eliminar" id="id-eliminar" class="id-eliminar" value="${id}">
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-eliminar-producto" onclick ="generadorModal(${id})" >SI</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>        
    </div>
    `;

}

const generadorModal = (idProducto) =>{

    let datos = idProducto;

    let xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {

        if (this.readyState == 4 && this.status == 200) {

            if (this.responseText === "true") {

                window.location = 'http://localhost/TiendaPHP-Ajax/views/dashboard/principal.php';
            }
        }
    };

    xhttp.open("POST", "http://localhost/TiendaPHP-Ajax/modelsJS/eliminarProducto.php", true);

    xhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded")

    xhttp.send("eliminar="+datos);

}