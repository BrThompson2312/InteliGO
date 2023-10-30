import {rut_conexion, alertSuccess} from "../add_all.js";

export function add_asignacion(parent){

    let cedula = document.getElementsByName('ci-asignacion')[0].value;
    let matricula = document.getElementsByName('matricula-asignacion')[0].value;

    if (cedula == '' || matricula == ''){
        alertSuccess('incompleted')
    } else {
        if (cedula.length == 8 && matricula.length == 7){
            $.ajax({
                url: `${rut_conexion}asignacion.php`,
                type: 'POST',
                data: {
                    cedula: cedula,
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