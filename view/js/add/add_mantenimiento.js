export function add_mantenimiento(parent){

    let codigo = document.getElementsByName('codigo-gdm')[0].value;
    let matricula = document.getElementsByName('matricula-gdm')[0].value;
    let fecha = document.getElementsByName('fecha-gdm')[0].value;
    let concepto = document.getElementsByName('concepto-gdm')[0].value;
    let importe = document.getElementsByName('importe-gdm')[0].value;
    let taller = document.getElementsByName('taller-gdm')[0].value;
    let comentario = document.getElementsByName('comentario-gdm')[0].value;

    if (
        codigo !== '' 
        && matricula !== ''
        && fecha !== '' 
        && concepto !== '' 
        && importe !== '' 
        && taller !== ''
        && comentario !== ''
    ){
        if (matricula.length == 7) {
            $.ajax({
                url: `${rut_conexion}mantenimiento.php`,
                type: 'POST',
                data: {
                    codigo: codigo,
                    matricula: matricula,
                    fecha: fecha,
                    concepto: concepto,
                    importe: importe,
                    taller: taller,
                    comentario: comentario,
                },
                success: function(response){
                    alert(response)
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
    } else {
        alertSuccess('incompleted');
    }    
}