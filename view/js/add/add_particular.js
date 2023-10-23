export function add_particular(){

    let cedula = document.getElementsByName('ci-particular')[0].value;
    let nombre = document.getElementsByName('nombre-particular')[0].value;
    let apellido = document.getElementsByName('apellido-particular')[0].value;
    let direccion = document.getElementsByName('direccion-particular')[0].value;
    let telefono = document.getElementsByName('tel-particular')[0].value;
    let listanegra = document.getElementsByName('ln-particular')[0].value;

    if (nombre, cedula, apellido, direccion, telefono, listanegra == ''){
        alert('Llene todos los campos');z
    } else {
        if (cedula.length == 8 && telefono.length == 8){
        $.ajax({
            url: `${rut_conexion}particular.php`,
            type: 'POST',
            data: {
                cedula: cedula,
                nombre: nombre,
                apellido: apellido,
                direccion: direccion,
                telefono: telefono,
                listanegra: listanegra,
            },
            success: function(response){
                alert(response);
            },
            error: function(reject){
                alert(reject);
            }
        })
        } else {
            alert('Cedula y/o telefono invalidos');
        }
    }    
}
