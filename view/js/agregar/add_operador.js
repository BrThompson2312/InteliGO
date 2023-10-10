let nombre, cedula, edad, pass, rol, fecha, btn_operador;

nombre = document.querySelector('[name="nombre-operador"]');
cedula = document.querySelector('[name="ci-operador"]');
edad = document.querySelector('[name="edad-operador"');
pass = document.querySelector('[name="contrasena-operador"]');
rol = document.querySelector('[name="rol-operador"]');
fecha = document.querySelector('[name="fechaing-operador"]');
btn_operador = document.querySelector('.btn_datos_operador');

function data_operador(){
    $.ajax({
        url: '../model/agregar/a_operadores.php',
        type: 'POST',
        data: {
            nombre: nombre.value,
            cedula: cedula.value,
            edad: edad.value,
            pass: pass.value,
            rol: rol.value,
            fecha: fecha.value,
        },
        success: function(response){
            alert(response)
            nombre.value = null;
            cedula.value = null;
            edad.value = null;
            pass.value = null;
        },
        error: function(reject){
            alert(reject);
        }
    })
}

