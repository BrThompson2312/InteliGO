import {rut_conexion, alertSuccess} from "../add_all.js";

export function add_empresa(parent){
    
    let rut = document.getElementsByName('rut-empresa')[0].value;
    let razonsocial = document.getElementsByName('razonsocial-empresa')[0].value;
    let listanegra = document.getElementsByName('listanegra-empresa')[0].value;
    let empleado = document.getElementsByName('empleado-empresa')[0].value;
    let direccion = document.getElementsByName('direccion-empresa')[0].value;
    let telefono = document.getElementsByName('tel-empresa')[0].value;
    let correo = document.getElementsByName('correo-empresa')[0].value;
    let encargado = document.getElementsByName('encargado-empresa')[0].value;
    let autorizado = document.getElementsByName('autorizado-empresa')[0].value;

    if (rut == '' || listanegra == '' || empleado == '' || direccion == '' || telefono == '' || correo == '' || encargado == '' || autorizado == ''){
        alertSuccess('incompleted');
    } else {
        if (rut.length == 3 && telefono.length == 8){
        $.ajax({
            url: `${rut_conexion}empresa.php`,
            type: 'POST',
            data: {
                rut: rut,
                razonsocial: razonsocial,
                listanegra: listanegra,
                empleado: empleado,
                direccion: direccion,
                telefono: telefono,
                correo: correo,
                encargado: encargado,
                autorizado: autorizado
            },
            success: function(response){
                console.log(response);
                if (response == true){
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