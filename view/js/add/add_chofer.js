import {rut_conexion, alertSuccess} from "../add_all.js";

export function add_chofer(parent){

    let cedula = document.getElementsByName('ci-chofer')[0].value;
    let nombre = document.getElementsByName('nombre-chofer')[0].value;
    let telefono = document.getElementsByName('tel-chofer')[0].value;
    let matricula = document.getElementsByName('matricula-chofer')[0].value;

    if (cedula == '' || nombre == '' || matricula == '' || telefono == ''){
        alertSuccess('incompleted')
    } else {
        if (cedula.length == 8 && telefono.length >= 8 && telefono.length <= 12 && matricula.length == 7){
            $.ajax({
                url: `${rut_conexion}chofer.php`,
                type: 'POST',
                data: {
                    cedula: cedula,
                    nombre: nombre,
                    telefono: telefono,
                    matricula: matricula,
                },
                success: function(response){
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