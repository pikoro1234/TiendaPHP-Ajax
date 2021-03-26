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

            generadorErrores(elemento, "el campo no debe quedar vacio");

            return false;    
            
        }else{

            limpiadorErrores(elemento);

            return true;                                    
        }
    }
    /* FOCUS PARA LOS ERRORES */


    /* VALIDADOR DNI */
    const dniValidacion = (inputDni) =>{

        
        let re = /^[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKET]{1}$/g;

        if (!re.test($(inputDni).val())) {

            generadorErrorDni(inputDni, "la letra debe ser mayuscula y el campo 8 num y una letra" );

            return false;

        }else{

            limpiadorErrores(inputDni);

        }

        // Check last letter
        let lastLetter = $(inputDni).val().substr($(inputDni).val().length-1, $(inputDni).val().lenght);

        let index = parseInt($(inputDni).val().substr(0, 8)) % 23;

        let dniLetters = 'TRWAGMYFPDXBNJZSQVHLCKET';

        if (dniLetters.charAt(index) == lastLetter){
            
            limpiadorErrores(inputDni);

            return true;
            
        } else{
        
            generadorErrorDni(inputDni, "Tu letra calculada es "+ dniLetters.charAt(index));

            return false;

        }
    }
    /* VALIDADOR DNI */


    /* FUNCION QUE GENERA LOS ERRORES DE DNI */
    const generadorErrorDni = (input,memsaje) =>{
        
        $(input).addClass('focusElemento');

        $(input).after(`<p class="text-danger texto-alerta">${memsaje}</p>`);

        $('.texto-alerta').css('display','block')        
    }
    /* FUNCION QUE GENERA LOS ERRORES DE INPUTS */



    /* FUNCION QUE GENERA LOS ERRORES DE INPUTS */
    const generadorErrores = (input,memsaje) =>{

        if ($(input).val() == "") {

            $(input).addClass('focusElemento');

            $(input).after(`<p class="text-danger texto-alerta">${memsaje}</p>`);

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

        if(dniValidacion(dniUser)){
            console.log("valido")
        }else{
            console.log("noo valido")
        }

        /* if (focusInput(userNick) && focusInput(password) && focusInput(nombreUser) && focusInput(dniUser)) {
            
        }

        alert("formulario registro") */
    })



})