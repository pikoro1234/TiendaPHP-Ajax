let modalContenedor = document.querySelector(".modal-producto");


const modalProducto = (id) =>{

    modalContenedor.innerHTML = "";

    modalContenedor.innerHTML +=`
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <span class="text-center py-3 bold">¿Esta seguro de eliminar?</span>
        <input type="text" name="id-eliminar" id="id-eliminar" value="${id}">
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-primary">SI</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>        
    </div>
    `;




    generadorModal(id);

}


$(document).ready(function (){


    

    
    
})