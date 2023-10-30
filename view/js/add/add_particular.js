import {rut_conexion, alertSuccess} from "../add_all.js";

export function add_particular(parent){

    let telefono    = document.getElementsByName('tel-particular')[0].value;
    let nombre      = document.getElementsByName('nombre-particular')[0].value;
    let apellido    = document.getElementsByName('apellido-particular')[0].value;
    let direccion   = document.getElementsByName('direccion-particular')[0].value;
    let listanegra  = document.getElementsByName('ln-particular')[0].value;

    if (telefono == '' || nombre == '' || apellido == '' || direccion == '' || listanegra == ''){
        alertSuccess('incompleted');
    } else {
        if (telefono.length >= 8 && telefono.length <= 12){
            $.ajax({
                url: `${rut_conexion}particular.php`,
                type: 'POST',
                data: {
                    telefono: telefono,
                    nombre: nombre,
                    apellido: apellido,
                    direccion: direccion,
                    listanegra: listanegra
                },
                success: function(response){
                    // alert(response);
                    if(response == true) {
                        alertSuccess('success');
                        document.querySelector(`${parent} .alert_section`).reset();
                    } else {
                        alertSuccess('error');
                    }
                },
                error: function(reject){
                    alert(reject);
                }
            })
        } else {
            alertSuccess('warning');
        }
    }    
}
