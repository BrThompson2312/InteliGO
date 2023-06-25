let administradores = [
    {    
        "nombre_completo":"administrador_0",
        "cedula":"00000000",
        "edad":"00",
        "fecha-de-ingreso":"00/00/00",
        "id": "0000",
    },
    {    
        "nombre_completo":"administrador_1",
        "cedula":"00000000",
        "edad":"00",
        "fecha-de-ingreso":"00/00/00",
        "id": "0000",
    },
    {    
        "nombre_completo":"administrador_2",
        "cedula":"00000000",
        "edad":"00",
        "fecha-de-ingreso":"00/00/00",
        "id": "0000",
    },
    {    
        "nombre_completo":"administrador_3",
        "cedula":"00000000",
        "edad":"00",
        "fecha-de-ingreso":"00/00/00",
        "id": "0000",
    },
    {    
        "nombre_completo":"administrador_4",
        "cedula":"00000000",
        "edad":"00",
        "fecha-de-ingreso":"00/00/00",
        "id": "0000",
    },
    {    
        "nombre_completo":"administrador_5",
        "cedula":"00000000",
        "edad":"00",
        "fecha-de-ingreso":"00/00/00",
        "id": "0000",
    }
]

function prueba(jsonObj) {

    let tabla = document.getElementsByClassName('registro-administradores');
        for (let j = 0; j < jsonObj.length; j++) {

                        let rev_registro = document.createElement('tr');
                            rev_registro.classList.add('rev_registro');

                            let columna_vacia = document.createElement('td');
                            let columna_madre = document.createElement('td');
                                columna_madre.classList.add('dis_rev_registro');
                            let tabla_madre = document.createElement('table');
                            let fila_nombre = document.createElement('tr');
                            let fila_cedula = document.createElement('tr');
                            let fila_edad = document.createElement('tr');
                            let fila_fechaIngreso = document.createElement('tr');
                            let fila_id = document.createElement('tr');

                            let columna_nombre = document.createElement('td');
                            let columna_cedula = document.createElement('td');
                            let columna_edad = document.createElement('td');
                            let columna_fechaIngreso = document.createElement('td');
                            let columna_id = document.createElement('td');

                            rev_registro.appendChild(columna_vacia);
                            rev_registro.appendChild(columna_madre);
                            columna_madre.appendChild(tabla_madre);
                            tabla_madre.appendChild(fila_nombre);
                            tabla_madre.appendChild(fila_cedula);
                            tabla_madre.appendChild(fila_edad);
                            tabla_madre.appendChild(fila_fechaIngreso);
                            tabla_madre.appendChild(fila_id);

                            fila_nombre.appendChild(columna_nombre);
                            fila_cedula.appendChild(columna_cedula);
                            fila_edad.appendChild(columna_edad);
                            fila_fechaIngreso.appendChild(columna_fechaIngreso);
                            fila_id.appendChild(columna_id);

                            columna_nombre.textContent = "Nombre:" + jsonObj[j].nombre;
                            columna_cedula.textContent = "Cedula:" + jsonObj[j].cedula;

            
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
                    consultando();
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
            nombre.textContent = jsonObj[j].nombre_completo;
        }
        
}

prueba(administradores);