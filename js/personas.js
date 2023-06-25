let administradores = [
    {    
        "id": "0000",
        "nombre":"administrador_0",
    },
    {    
        "id": "0001",
        "nombre":"administrador_1",
    },
    {    
        "id": "0002",
        "nombre":"administrador_2",
    },
    {    
        "id": "0003",
        "nombre":"administrador_3",
    },
    {    
        "id": "0004",
        "nombre":"administrador_4",
    },
    {    
        "id": "0005",
        "nombre":"administrador_5",
    }
]

function prueba(jsonObj) {

    const tabla = document.getElementsByClassName('registro-administradores');
        for (let j = 0; j < jsonObj.length; j++) {
            
            let registro = document.createElement('tr'); 
                registro.classList.add('datos-admin');

            let id = document.createElement('td');

            let nombre = document.createElement('td');

            let consulta = document.createElement('td');
                // consulta.style.backgroundColor = "#03A600";
                let simb_consulta = document.createElement('i');
                consulta.appendChild(simb_consulta);
                simb_consulta.classList.add('fa-solid', 'fa-eye');
                consulta.onclick = function() {
                    alert('consultar');
                    // let newRegistro = document.createElement('tr');
                    // let newColumna = document.createElement('td');
                    // registro.appendChild(newRegistro);
                    // newRegistro.appendChild(newColumna);
                    // newColumna.textContent = "fefef";
                }

            let modificar = document.createElement('td');
                // modificar.style.backgroundColor = "#F1D900";
                let simb_modificar = document.createElement('i');
                modificar.appendChild(simb_modificar);
                simb_modificar.classList.add('fa-solid', 'fa-gear');
                modificar.onclick = function() {
                    alert('modificar');
                }
            
            let eliminar = document.createElement('td');
                // eliminar.style.backgroundColor = "#9E2600";
                let simb_eliminar = document.createElement('i');
                eliminar.appendChild(simb_eliminar);
                simb_eliminar.classList.add('fa-solid', 'fa-arrow-right-from-bracket');
                eliminar.onclick = function() {
                    alert('eliminar');
                }

            for (let i = 0; i < tabla.length; i++) {
                tabla[i].appendChild(registro);
            }

            registro.appendChild(id);
            registro.appendChild(nombre);
            registro.appendChild(consulta);
            registro.appendChild(modificar);
            registro.appendChild(eliminar);
            id.textContent = jsonObj[j].id;
            nombre.textContent = jsonObj[j].nombre;
        }
        
}

prueba(administradores);