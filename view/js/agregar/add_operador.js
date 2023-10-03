let nombre = document.querySelector('[name="nombre-operador"]');
let cedula = document.querySelector('[name="ci-operador"]');
let edad = document.querySelector('[name="edad-operador"');
let pass = document.querySelector('[name="contrasena-operador"]');
let rol = document.querySelector('[name="rol-operador"]');
let fecha = document.querySelector('[name="fechaing-operador"]');

let subir_datos = document.querySelector('.subir_datos');
    subir_datos.onclick = function(event){
        event.preventDefault();
        $.ajax({
            url: '../model/agregar/a_operadores.php',
            type: 'POST',
            data: {
                nombre: nombre.value,
                cedula: cedula.value,
                edad: edad.value,
                pass: pass.value,
                rol: rol.value,
                fecha: fecha.value
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