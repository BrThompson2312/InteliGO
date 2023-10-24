import {rut_conexion, alertSuccess} from '../add_all.js';

export function add_operador(parent){

    let cedula = document.getElementsByName('ci-operador')[0].value;
    let nombre = document.getElementsByName('nombre-operador')[0].value;
    let pass = document.getElementsByName('contrasena-operador')[0].value;
    let fecha = document.getElementsByName('fecha-operador')[0].value;

    // let parent = document.querySelector('.BRS-operador');
    // let parentBlock = parent.document.querySelector('.alert_section').reset;

    if (cedula == '' || nombre == '' || pass == '' || fecha == ''){
        alertSuccess('incompleted');
    } else {
        if (cedula.length == 8){
            $.ajax({
                url: `${rut_conexion}operador.php`,
                type: 'POST',
                data: {
                    cedula: cedula,
                    nombre: nombre,
                    pass: pass,
                    fecha: fecha
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
        } else {
            alertSuccess('warning');
        }
    }
}
