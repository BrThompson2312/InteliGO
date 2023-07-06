let administradores = [
    {    
        "nombre_completo":"administrador_0",
        "cedula":"00000000",
        "edad":"00",
        "fecha_de_ingreso":"00/00/00",
        "id": "0000",
    },
    {    
        "nombre_completo":"administrador_1",
        "cedula":"00000000",
        "edad":"00",
        "fecha_de_ingreso":"00/00/00",
        "id": "0001",
    },
    {    
        "nombre_completo":"administrador_2",
        "cedula":"00000000",
        "edad":"00",
        "fecha_de_ingreso":"00/00/00",
        "id": "0002",
    },
    {    
        "nombre_completo":"administrador_3",
        "cedula":"00000000",
        "edad":"00",
        "fecha_de_ingreso":"00/00/00",
        "id": "0003",
    },
]

function prototype2(jsonObj) {
    let registro_administradores = document.querySelector('.registro-administradores'); 
    for (let i = 0; i < jsonObj.length; i++){

        let registro = document.createElement('tr');
            registro.classList.add('datos-admin');
            registro_administradores.appendChild(registro);
            
        let id = document.createElement('td');
            id.textContent = jsonObj[i].id;

        let nombre = document.createElement('td');
            nombre.textContent = jsonObj[i].nombre_completo;

        let consultar = document.createElement('td');
            let simb_consultar = document.createElement('i');
            consultar.appendChild(simb_consultar);
            simb_consultar.classList.add('fa-solid','fa-eye');
            consultar.onclick = function() {
                alert(
                    ' Nombre: ' + jsonObj[i].nombre_completo +
                    ' Cédula: ' + jsonObj[i].cedula +
                    ' Edad: ' + jsonObj[i].edad + 
                    ' Fecha de ingreso: ' + jsonObj[i].fecha_de_ingreso + 
                    ' ID: ' + jsonObj[i].id
                );
            }

        let modificar = document.createElement('td');
            let simb_modificar = document.createElement('i');
            modificar.appendChild(simb_modificar);
            simb_modificar.classList.add('fa-solid', 'fa-gear');
            modificar.onclick = function() {
                alert('modificar' + [i]);
            }

        let eliminar = document.createElement('td');
            let simb_eliminar = document.createElement('i');
            eliminar.appendChild(simb_eliminar);
            simb_eliminar.classList.add('fa-solid', 'fa-arrow-right-from-bracket');
            eliminar.onclick = function() {
                alert('eliminar' + [i]);
            }
            registro.appendChild(id);
            registro.appendChild(nombre);
            registro.appendChild(consultar);
            registro.appendChild(modificar);
            registro.appendChild(eliminar);
    }
}

prototype2(administradores); 