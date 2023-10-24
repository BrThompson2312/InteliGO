import {rut_conexion, alertSuccess} from "../add_all.js";

export function add_reserva(parent){

    let tipo_reserva, pasajero, origen, fecha_reserva, hora_reserva, chofer, telefono, destino, fecha_viaje, hora_viaje, comentario;
    
    tipo_reserva = document.getElementsByName('tipo-reserva')[0].value;
    pasajero = document.getElementsByName('pasajero-reserva')[0].value;
    origen = document.getElementsByName('origen-reserva')[0].value;
    fecha_reserva = document.getElementsByName('fecha-reserva-reserva')[0].value;
    hora_reserva = document.getElementsByName('hora-reserva')[0].value;
    chofer = document.getElementsByName('chofer-reserva')[0].value;
    telefono = document.getElementsByName('tel-reserva')[0].value;
    destino = document.getElementsByName('destino-reserva')[0].value;
    fecha_viaje = document.getElementsByName('fecha_viaje-reserva')[0].value;
    hora_viaje = document.getElementsByName('hora-viaje')[0].value;
    comentario = document.getElementsByName('comentario-reserva')[0].value;

    if (tipo_reserva == '' || pasajero == '' || origen == '' || fecha_reserva == '' || hora_reserva == '' || chofer == '' || telefono == '' || destino == '' || fecha_viaje == '' || hora_viaje == '' || comentario == ''){
        alert('Llene todos los campos');
    } else {
        if (telefono.length == 8){
        $.ajax({
            url: `${rut_conexion}reserva.php`,
            type: 'POST',
            data: {
                tipo_reserva: tipo_reserva,
                pasajero: pasajero,
                origen: origen,
                fecha_reserva: fecha_reserva,
                hora_reserva: hora_reserva,
                chofer: chofer,
                telefono: telefono,
                destino: destino,
                fecha_viaje: fecha_viaje,
                hora_viaje: hora_viaje,
                comentario: comentario
            },
            success: function(response){
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