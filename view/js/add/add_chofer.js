import {rut_conexion, alertSuccess} from "../add_all.js";

export function add_chofer(parent){

    let cedula = document.getElementsByName('ci-chofer')[0].value;
    let nombre = document.getElementsByName('nombre-chofer')[0].value;
    let matricula = document.getElementsByName('matricula-veh')[0].value;
    let modelo = document.getElementsByName('modelo-veh')[0].value;
    let marca = document.getElementsByName('marca-veh')[0].value;
    let año = document.getElementsByName('año-veh')[0].value;
    let telefono = document.getElementsByName('tel-chofer')[0].value;

    if (cedula == '' || nombre == '' || telefono == '' || matricula == '' || modelo == '' || marca == '' || año == ''){
        alertSuccess('incompleted')
    } else {
        if (
            cedula.length == 8 
            && telefono.length >= 8 && telefono.length <= 12 
            && matricula.length == 7 
            && año.length == 4
        ){
            $.ajax({
                url: `${rut_conexion}chofer.php`,
                type: 'POST',
                data: {
                    cedula: cedula,
                    nombre: nombre,
                    telefono: telefono,
                    matricula: matricula,
                    modelo: modelo,
                    marca: marca,
                    año: año
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