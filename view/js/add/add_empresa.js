import {alertSuccess} from "../add_all.js";

export function add_empresa(){
    
    let rut = document.getElementsByName('rut-empresa')[0].value;
    let listanegra = document.getElementsByName('ln-empresa')[0].value;
    let empleado = document.getElementsByName('empleado-empresa')[0].value;
    let direccion = document.getElementsByName('direccion-empresa')[0].value;
    let telefono = document.getElementsByName('telefono-empresa')[0].value;
    let correo = document.getElementsByName('correo-empresa')[0].value;

    if (rut, listanegra, nombre, direccion, telefono, correo == ''){
        alert('Llene todos los campos');
    } else {
        if (rut.length == 12 && telefono.length == 8){
        $.ajax({
            url: `${rut_conexion}empresa.php`,
            type: 'POST',
            data: {
                rut: rut,
                listanegra: listanegra,
                empleado: empleado,
                direccion: direccion,
                telefono: telefono,
                correo: correo,
            },
            success: function(response){
                if (response == true){
                    alertSuccess('success');
                } else {
                    alertSuccess('error');
                }
            },
            error: function(reject){
                alert(reject);
            }
        })
        } else {
            alert('Rut y/o telefono invalidos');
        }
    }    
}