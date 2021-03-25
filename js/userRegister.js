$(document).ready(function(){

    let userNick = $('#user');

    let password = $('#password');

    let nombreUser = $('#nombre');

    let dniUser = $('#dniUser');

    let emailUser = $('#email');

    let phoneUser = $('#telefono');

    let direccion = $('#direccion');

    let ciudad = $('#ciudad');

    let latitud = $('#latCrear');

    let longitud = $('#longCrear');



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
    
        

    $('#btnRegistroUser').on('click', (e) =>{

        e.preventDefault();

        if (focusInput(userNick) && focusInput(password) && focusInput(nombreUser) && focusInput(dniUser)) {
            
        }

        alert("formulario registro")
    })



})