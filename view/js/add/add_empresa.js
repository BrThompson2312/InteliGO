export function add_empresa(parent){
    
    let rut             = document.getElementsByName('rut-empresa')[0].value;
    let razonsocial     = document.getElementsByName('razonsocial-empresa')[0].value;
    let fantasia        = document.getElementsByName('fantasia-empresa')[0].value;
    let listanegra      = document.getElementsByName('listanegra-empresa')[0].value;
    let direccion       = document.getElementsByName('direccion-empresa')[0].value;
    let telefono        = document.getElementsByName('tel-empresa')[0].value;
    let correo          = document.getElementsByName('correo-empresa')[0].value;
    let encargado       = document.getElementsByName('encargado-empresa')[0].value;
    let autorizado      = document.getElementsByName('autorizado-empresa')[0].value;

    if (
        rut == '' 
        || razonsocial == '' 
        || fantasia == ''
        || listanegra == '' 
        || direccion == '' 
        || telefono == '' 
        || correo == '' 
        || encargado == '' 
        || autorizado == ''
    ){
        alertSuccess('incompleted');
    } else {
        if (rut.length == 12 && telefono.length >= 8 && telefono.length <= 12){
        $.ajax({
            url: `${rut_conexion}empresa.php`,
            type: 'POST',
            data: {
                rut: rut,
                razonsocial: razonsocial,
                fantasia: fantasia,
                listanegra: listanegra,
                direccion: direccion,
                telefono: telefono,
                correo: correo,
                encargado: encargado,
                autorizado: autorizado
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