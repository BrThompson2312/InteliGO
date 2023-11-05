export function add_operador(parent){

    let cedula = document.getElementsByName('ci-operador')[0].value;
    let nombre = document.getElementsByName('nombre-operador')[0].value;
    let pass = document.getElementsByName('contrasena-operador')[0].value;

    if (cedula == '' || nombre == '' || pass == ''){
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
                },
                success: function(response){
                    if(response == true){
                        alertSuccess('success');
                        // wewe();
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
