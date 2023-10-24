import {rut_conexion, alertSuccess} from "../add_all.js";

export function add_mantenimiento(parent){

    let codigofac = document.getElementsByName('codigofac-gdm')[0].value;
    let fecha = document.getElementsByName('fecha-gdm')[0].value;
    let concepto = document.getElementsByName('concepto-gdm')[0].value;
    let importe = document.getElementsByName('importe-gdm')[0].value;
    let comentario = document.getElementsByName('comentario-gdm')[0].value;

    if (codigofac == '' || fecha == '' || concepto == '' || importe == '' || comentario == ''){
        alertSuccess('incompleted');
    } else {
        $.ajax({
            url: `${rut_conexion}mantenimiento.php`,
            type: 'POST',
            data: {
                cod: codigofac,
                fecha: fecha,
                concepto: concepto,
                importe: importe,
                comentario: comentario,
            },
            success: function(response){
                if(response == true){
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
    }    
}