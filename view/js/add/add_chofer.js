export function add_chofer(parent){

    var telefono    = document.getElementsByName("tel-chofer")[0].value;
    let nombre      = document.getElementsByName('nombre-chofer')[0].value;
    let apellido    = document.getElementsByName('apellido-chofer')[0].value;
    let cedula      = document.getElementsByName('ci-chofer')[0].value;

    if (telefono == '' || nombre == '' || apellido == '' | cedula == ''){
        alertSuccess('incompleted')
    } else {
        if (cedula.length == 8 && telefono.length >= 8 && telefono.length <= 12){
            $.ajax({
                url: `${rut_conexion}chofer.php`,
                type: 'POST',
                data: {
                    telefono:   telefono,
                    nombre:     nombre,
                    apellido:   apellido,
                    cedula:     cedula,
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