export function add_reserva(parent){
    
    let origen          = document.getElementsByName('origen-servicio')[0].value;
    let destino         = document.getElementsByName('destino-servicio')[0].value;
    let fecha           = document.getElementsByName('fecha-servicio')[0].value;
    let hora            = document.getElementsByName('hora-servicio')[0].value;
    let comentario      = document.getElementsByName('comentario-servicio')[0].value;
    let nombre          = document.getElementsByName('nombre-servicio')[0].value;
    let apellido        = document.getElementsByName('apellido-servicio')[0].value;
    let monto           = document.getElementsByName('monto-servicio')[0].value;
    let chofer          = document.getElementsByName('chofer-realizan')[0].value;
    let cliente         = document.getElementsByName('cliente-reserva')[0].value;

    if (
        origen == ''
        || destino == ''
        || fecha == ''
        || hora == ''
        || comentario == ''
        || nombre == ''
        || apellido == ''
        || monto == ''
        || chofer == ''
        || cliente == ''
    ){
        alertSuccess('incompleted');
    } else {
        if (
            chofer.length == 8
        ){
        $.ajax({
            url: `${rut_conexion}reserva.php`,
            type: 'POST',
            data: {
                origen: origen,
                destino: destino,
                fecha: fecha,
                hora: hora,
                comentario: comentario,
                nombre: nombre,
                apellido: apellido,
                monto: monto,
                chofer: chofer,
                cliente: cliente,
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