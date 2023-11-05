export function add_coche(parent){

    let matricula = document.getElementsByName('matricula-coche')[0].value;
    let marca = document.getElementsByName('marca-coche')[0].value;
    let modelo = document.getElementsByName('modelo-coche')[0].value;
    let año = document.getElementsByName('año-coche')[0].value;

    if (matricula == '' || marca == '' || modelo == ''|| año == ''){
        alertSuccess('incompleted')
    } else {
        if (matricula.length == 7 && año.length == 4){
            $.ajax({
                url: `${rut_conexion}coche.php`,
                type: 'POST',
                data: {
                    matricula: matricula,
                    marca: marca,
                    modelo: modelo,
                    año: año
                },
                success: function(response){
                    if (response == true){
                        alertSuccess('success');
                        document.querySelector(`${parent} .alert_section`).reset();
                    } else {
                        alert(response)
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