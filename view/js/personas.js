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
    }
];

$.ajax({
    url: 'controller/bd.php',
    type: 'POST',
    success: function(response){
        let choferes = JSON.parse(response);
        seccion_chofer('.registro-chofer', choferes);
    }
})

function tableData(parametro, jsonObj){
    
    let registro_seccion = document.querySelector(parametro);   
    for (let i = 0; i < jsonObj.length; i++){

        let registro = document.createElement('tr');
        registro.classList.add('datos-admin');
        registro_seccion.appendChild(registro);
        
        let id = document.createElement('td');
            id.textContent = jsonObj[i].id;
    
        let nombre = document.createElement('td');
            nombre.textContent = jsonObj[i].nombre_completo;
    
        let consultar = document.createElement('td');
            let simb_consultar = document.createElement('i');
            consultar.appendChild(simb_consultar);
            simb_consultar.classList.add('fa-solid','fa-eye');
            consultar.onclick = function() {

                // alert(
                //     ' Nombre: ' + jsonObj[i].nombre_completo +
                //     ' Cédula: ' + jsonObj[i].cedula +
                //     ' Edad: ' + jsonObj[i].edad + 
                //     ' Fecha de ingreso: ' + jsonObj[i].fecha_de_ingreso + 
                //     ' ID: ' + jsonObj[i].id  
                // );

                // simb_consultar.classList.remove('fa-solid','fa-eye');
                // simb_consultar.classList.add('fa-regular','fa-eye-slash');

                // switch(parametro){
                //     case '.registro-administradores':
                //         datapackEmpleados(registro_seccion, jsonObj[i]);
                //     break;
                //     case '.registro-choferes':
                //         datapack2(jsonObj[i]);
                //     break;
                // }

                switch(parametro){
                    case '.registro-administradores':
                        datapack(jsonObj[i]);
                    break;
                    case '.registro-chofer':
                        datapack(jsonObj[i]);
                    break;
                }

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

function seccion_administrador(registroAdministradores, administradores) {
    tableData(registroAdministradores, administradores);
}

function seccion_chofer(registroChoferes, choferes){
    tableData(registroChoferes, choferes);
}

seccion_administrador('.registro-administradores',administradores); 

// function datapackEmpleados(registro_seccion, jsonObj){
//     let tr = document.createElement('tr');
//         tr.classList.add('consultas');
//         registro_seccion.appendChild(tr);

//     let c1 = document.createElement('td');
//     let c2 = document.createElement('td');
//     let c3 = document.createElement('td');
//     let c4 = document.createElement('td');
//     let c5 = document.createElement('td');

//     tr.appendChild(c1);
//     tr.appendChild(c2);
//     tr.appendChild(c3);
//     tr.appendChild(c4);
//     tr.appendChild(c5);

//     let tb1_consulta = document.createElement('tr');
//     let tb2_consulta = document.createElement('tr');
//     let tb3_consulta = document.createElement('tr');
//     let tb4_consulta = document.createElement('tr');
//     let tb5_consulta = document.createElement('tr');

//     let c1_nombreConsulta = document.createElement('td');
//     let c2_nombreConsulta = document.createElement('td');
//     let c1_cedulaConsulta = document.createElement('td');
//     let c2_cedulaConsulta = document.createElement('td');
//     let c1_edadConsulta = document.createElement('td');
//     let c2_edadConsulta = document.createElement('td');
//     let c1_fechaingConsulta = document.createElement('td');
//     let c2_fechaingConsulta = document.createElement('td');
//     let c1_idConsulta = document.createElement('td');
//     let c2_idConsulta = document.createElement('td');
    
//     c2.appendChild(tb1_consulta);
//     c2.appendChild(tb2_consulta);
//     c2.appendChild(tb3_consulta);
//     c2.appendChild(tb4_consulta);
//     c2.appendChild(tb5_consulta);
    
//     tb1_consulta.appendChild(c1_nombreConsulta);
//     tb1_consulta.appendChild(c2_nombreConsulta);
//     tb2_consulta.appendChild(c1_cedulaConsulta);
//     tb2_consulta.appendChild(c2_cedulaConsulta);
//     tb3_consulta.appendChild(c1_edadConsulta);
//     tb3_consulta.appendChild(c2_edadConsulta);
//     tb4_consulta.appendChild(c1_fechaingConsulta);
//     tb4_consulta.appendChild(c2_fechaingConsulta);
//     tb5_consulta.appendChild(c1_idConsulta);
//     tb5_consulta.appendChild(c2_idConsulta);
    
//     c1_nombreConsulta.textContent = "Nombre:";
//     c2_nombreConsulta.textContent = jsonObj.nombre_completo;
//     c1_cedulaConsulta.textContent = "Cedula:";
//     c2_cedulaConsulta.textContent = jsonObj.cedula;
//     c1_edadConsulta.textContent = "Edad:";
//     c2_edadConsulta.textContent = jsonObj.edad;
//     c1_fechaingConsulta.textContent = "Fecha de ingreso:";
//     c2_fechaingConsulta.textContent = jsonObj.fecha_de_ingreso;
//     c1_idConsulta.textContent = "ID:";
//     c2_idConsulta.textContent = jsonObj.id;
// }

function datapack(jsonObj){
    var result = '';
    for (let i in jsonObj) {
        if (jsonObj.hasOwnProperty(i)) {
            result += `${jsonObj[i]}\n`;
        }
    }
    return (alert(result))
}
