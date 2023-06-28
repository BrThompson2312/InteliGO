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

// function prueba(jsonObj) {

//     let tabla = document.getElementsByClassName('registro-administradores');
//         for (let j = 0; j < jsonObj.length; j++) {            

//             let registro = document.createElement('tr'); 
//                 registro.classList.add('datos-admin');
//                 registro.classList.add('datos-admin-'+j);
//             let id = document.createElement('td');
//             let nombre = document.createElement('td');

//             // Datos consulta
//                 let rev_registro = document.createElement('tr');
//                     rev_registro.classList.add('rev-registro');
//                     // rev_registro.setAttribute('id',"registro"+j);
//                 let columna_vacia = document.createElement('td');
//                 // columna_vacia.innerHTML='&nbsp;';
//                 let columna_madre = document.createElement('td');
//                 // columna_madre.setAttribute('colspan',"4");

//                 let tabla_madre = document.createElement('table');
//                     tabla_madre.classList.add('dis_rev-registro');
//                 let fila_nombre = document.createElement('tr');
//                 let fila_cedula = document.createElement('tr');
//                 let fila_edad = document.createElement('tr');
//                 let fila_fechaIngreso = document.createElement('tr');
//                 let fila_id = document.createElement('tr');

//                 let columna_nombre = document.createElement('td');
//                 let columna_cedula = document.createElement('td');
//                 let columna_edad = document.createElement('td');
//                 let columna_fechaIngreso = document.createElement('td');
//                 let columna_id = document.createElement('td');

                
//             // Datos consulta
//             let consulta = document.createElement('td');
//             // consulta.style.backgroundColor = "#03A600";
//             let simb_consulta = document.createElement('i');
//             consulta.appendChild(simb_consulta);
//             simb_consulta.classList.add('fa-solid', 'fa-eye');
//             consulta.onclick = function() {
//                 alert('consultar');
                
//                 rev_registro.appendChild(columna_vacia);
//                 rev_registro.appendChild(columna_madre); 
//                     columna_madre.appendChild(tabla_madre);    
//                         tabla_madre.appendChild(fila_nombre);
//                         tabla_madre.appendChild(fila_cedula);
//                         tabla_madre.appendChild(fila_edad);
//                         tabla_madre.appendChild(fila_fechaIngreso);
//                         tabla_madre.appendChild(fila_id);

//                 fila_nombre.appendChild(columna_nombre);
//                 fila_cedula.appendChild(columna_cedula);
//                 fila_edad.appendChild(columna_edad);
//                 fila_fechaIngreso.appendChild(columna_fechaIngreso);
//                 fila_id.appendChild(columna_id);
            
//                 columna_nombre.textContent = "Nombre Completo: " + jsonObj[j].nombre_completo;
//                 columna_cedula.textContent = "Cedula: " + jsonObj[j].cedula;
//                 columna_edad.textContent = "Edad: " + jsonObj[j].edad;
//                 columna_fechaIngreso.textContent = "Fecha de ingreso: " + jsonObj[j].fecha_de_ingreso;
//                 columna_id.textContent = "ID: " + jsonObj[j].id;
//             }

//             let modificar = document.createElement('td');
//                 // modificar.style.backgroundColor = "#F1D900";
//                 let simb_modificar = document.createElement('i');
//                 modificar.appendChild(simb_modificar);
//                 simb_modificar.classList.add('fa-solid', 'fa-gear');
//                 modificar.onclick = function() {
//                     alert('modificar');
//                 }
            
//             let eliminar = document.createElement('td');
//                 // eliminar.style.backgroundColor = "#9E2600";
//                 let simb_eliminar = document.createElement('i');
//                 eliminar.appendChild(simb_eliminar);
//                 simb_eliminar.classList.add('fa-solid', 'fa-arrow-right-from-bracket');
//                 eliminar.onclick = function() {
//                     alert('eliminar');
//                 }

//             for (let i = 0; i < tabla.length; i++) {
//                 tabla[i].appendChild(registro);
//                 tabla[i].appendChild(rev_registro);
//             }

//             registro.appendChild(id);
//             registro.appendChild(nombre);
//             registro.appendChild(consulta);
//             registro.appendChild(modificar);
//             registro.appendChild(eliminar);
//             id.textContent = jsonObj[j].id;
//             nombre.textContent = jsonObj[j].nombre_completo;
//         }
        
// }
// prueba(administradores); 

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