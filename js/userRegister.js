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



    /* VALIDACION E-MAIL */
    const isValidEmail = (elemento) =>{        

        let regexEmail =  /^\w+(\.\w+)*@\w+(\.\w+){1,2}$/g;

        if (regexEmail.test($(elemento).val())) {

            limpiadorErrores(elemento);

            return true;
            
        }else{

            generadorErrores(elemento, "email invalido");

            return false;
        }
    }
    /* VALIDACION E-MAIL */
    


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



    /* FUNCION QUE RELLENA INPUTS SIN IMPORTANCIA */
    const datosRelleno = (elemento) =>{

        if (elemento === "") {

            return "sin datos";

        }else{

            return elemento;
        }
    }
    /* FUNCION QUE RELLENA INPUTS SIN IMPORTANCIA */



    /* FUNCION QUE ENVIA LOS DATOS DEL FORMULARIO */
    const envioFormulario = ( nick, password, nombre, dni, email, direction, telefono, city, lati, longi ) =>{    
        
        const valores = {
            "nickUser" : $(nick).val(),
            "passUser" : $(password).val(),
            "nombreUser" : $(nombre).val(),
            "dniUser" : $(dni).val(),
            "emailUser" : $(email).val(),
            "direcUser" : datosRelleno($(direction).val()),
            "telfUser" : datosRelleno($(telefono).val()),
            "cityUser" : datosRelleno($(city).val()),
            "latiUser" : $(lati).val(),
            "longiUser" : $(longi).val()
        }

        __ajax("../modelsJS/registrarUsuario.php", valores)
        .done((info) =>{
            console.log(info);
        })
    }
    /* FUNCION QUE ENVIA LOS DATOS DEL FORMULARIO */



    /* POST AJAX A ENVIO MAS FOTOS */
    const __ajax = (url, data) => {  

        const ajax = $.ajax({
            "method":"POST",
            "url":url,
            "data":data,           
        })

        return ajax;
    }
    /* POST AJAX A ENVIO MAS FOTOS */
    
        

    /* BOTON CON EL QUE ENVIAMOS LOS DATOS */
    $('#btnRegistroUser').on('click', (e) =>{

        e.preventDefault();

        if (focusInput(userNick) && focusInput(password) && focusInput(nombreUser) && isValidEmail(emailUser)
        && dniValidacion(dniUser) && focusInput(latitud) && focusInput(longitud)) {


            /* if ($(latitud).val() === "" && $(longitud).val() === "") {

                alert(" esta vacio")

            }else{*/
                envioFormulario(userNick, password, nombreUser, dniUser, emailUser, phoneUser, direccion, ciudad, latitud, longitud);
            /* } */
            
        }else{

            alert("no se pudo enviar el formulario con los datos");
        }
    })

})