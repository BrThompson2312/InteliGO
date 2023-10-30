import {rut_conexion, alertSuccess} from "../add_all.js";

export function add_reserva(parent){
    
    // Datos del viaje
    let origen          = document.getElementsByName('origen-servicio')[0].value;
    let destino         = document.getElementsByName('destino-servicio')[0].value;
    let fecha           = document.getElementsByName('fecha-servicio')[0].value;
    let hora            = document.getElementsByName('hora-servicio')[0].value;
    let comentario      = document.getElementsByName('comentario-servicio')[0].value;
    let nombre          = document.getElementsByName('nombre-servicio')[0].value;
    let apellido        = document.getElementsByName('apellido-servicio')[0].value;
    let monto           = document.getElementsByName('monto-servicio')[0].value;


    // Chofer asignado
    let chofer          = document.getElementsByName('chofer-realizan')[0].value;

    // Telefono del pasajero
    let telefono        = document.getElementsByName('tel-cliente-servicio')[0].value;

    // Reserva del viaje
    let cliente         = document.getElementsByName('cliente-reserva')[0].value;
    let fecha_reserva   = document.getElementsByName('fecha-reserva')[0].value;
    let hora_reserva    = document.getElementsByName('hora-reserva')[0].value;

    if (
        // Datos del viaje
        origen == ''
        || destino == ''
        || fecha == ''
        || hora == ''
        || comentario == ''
        || nombre == ''
        || apellido == ''
        || monto == ''

        // Chofer asignado
        || chofer == ''

        // Telefono del pasajero
        || telefono == ''

        // Reserva del viaje
        || cliente == ''
        || fecha_reserva == ''
        || hora_reserva == ''
    ){
        alertSuccess('incompleted');
    } else {
        if (
            telefono.length >= 8 && telefono.length <= 12
            && chofer.length == 8
        ){
        $.ajax({
            url: `${rut_conexion}reserva.php`,
            type: 'POST',
            data: {
                // Datos del viaje
                origen: origen,
                destino: destino,
                fecha: fecha,
                hora: hora,
                comentario: comentario,
                nombre: nombre,
                apellido: apellido,
                monto: monto,

                // Chofer asignado
                chofer: chofer,

                // Telefono del pasajero
                telefono: telefono,

                // Reserva del viaje
                cliente: cliente,
                fecha_reserva: fecha_reserva,
                hora_reserva: hora_reserva
            },
            success: function(response){
                alert(response);
                if (response == true ){
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