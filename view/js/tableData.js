function tableData(parametro, jsonObj){
    let registro_seccion = document.querySelector(parametro);      
    registro_seccion.innerHTML = '';
    for (let i = 0; i < jsonObj.length; i++){
        let registro = document.createElement('tr');
        registro.classList.add('datos-admin');
        registro_seccion.appendChild(registro);

        let consultar = document.createElement('td');
            consultar.classList.add('consultaRegistro');
            consultar.style.display = "table-cell";
            let simb_consultar = document.createElement('i');
            consultar.appendChild(simb_consultar);
            consultar.title = "Mas información";
            simb_consultar.classList.add('fa-solid','fa-eye');

        let col1 = document.createElement('td');
        let col2 = document.createElement('td');
        let col3 = document.createElement('td');
        let col4 = document.createElement('td');
        let col5 = document.createElement('td');

            consultar.onclick = function(){
                switch(parametro){
                    case '.registro-operadores':
                        alert(
                            'Cedula: ' + jsonObj[i].col1 + '\n' + 
                            'Nombre: ' + jsonObj[i].col2 + '\n' +
                            'Fecha de ingreso: ' + jsonObj[i].col3
                        );
                    break;
                    case '.registro-choferes':
                        alert(
                            'Teléfono: ' + jsonObj[i].col1 + '\n' +
                            'Nombre: ' + jsonObj[i].col2 + '\n' +
                            'Cedula: ' + jsonObj[i].col3  + '\n' +
                            'Coche: ' + jsonObj[i].col4
                        );
                    break;
                    case '.registro-coches':
                        alert(
                            'matricula: ' + jsonObj[i].col1 + '\n' +
                            'Modelo: ' + jsonObj[i].col2 + '\n' +
                            'Marca: ' + jsonObj[i].col3 + '\n' +
                            'Año: ' + jsonObj[i].col4
                        )
                    break;
                    case '.registro-cliente':
                        alert(
                            'Cliente: ' + jsonObj[i].col1 + '\n' +
                            'Teléfono: ' + jsonObj[i].col2 + '\n' +
                            'Nombre: ' + jsonObj[i].col3 + '\n' +
                            'Apellido: ' + jsonObj[i].col4 + '\n' +
                            'Dirección: ' + jsonObj[i].col5 + '\n' +
                            'Lista Negra: ' + jsonObj[i].col6
                        )
                    break;
                    case '.registro-empresa':
                        alert(
                            'RUT: ' + jsonObj[i].col1 + '\n' +
                            'Lista negra: ' + jsonObj[i].col2 + '\n' +
                            'Nombre fantasia: ' + jsonObj[i].col3 + '\n' +
                            'Dirección: ' + jsonObj[i].col4 + '\n' +
                            'Teléfono: ' + jsonObj[i].col5 + '\n' +
                            'Razon Social: ' + jsonObj[i].col6 + '\n' +
                            'Correo: ' + jsonObj[i].col7 + '\n' +
                            'Encargado de pagos: ' + '' + '\n' +
                            'Autorizado: ' + ''
                        );
                    break;
                    case '.registro-reserva':
                        alert(
                            'COD: ' + jsonObj[i].col1 + '\n' +
                            'Tipo: ' + jsonObj[i].col2 + '\n' +
                            'Chofer: ' + jsonObj[i].col3 + '\n' +
                            'Origen: ' + jsonObj[i].col4 + '\n' +
                            'Destino: ' + jsonObj[i].col5 + '\n' +
                            'Fecha de la reserva: ' + jsonObj[i].col8 + '\n' +
                            'Fecha del viaje: ' + jsonObj[i].col7 + '\n' +
                            'Hora de la reserva: ' + jsonObj[i].col9 + '\n' +
                            'Hora del viaje: ' + jsonObj[i].col10 + '\n' +
                            'Comentario: ' + jsonObj[i].col11
                        );
                    break;
                    case '.registro-GDM':
                        alert(
                            'COD-FACTURA: ' + jsonObj[i].col1 + '\n' +
                            'Matrícula: ' + jsonObj[i].col2 + '\n' +
                            'Concepto: ' + jsonObj[i].col3 + '\n' +
                            'Comentarios: ' + jsonObj[i].col4 + '\n' +
                            'Importe total: ' + jsonObj[i].col5 + '\n' +
                            'Taller: ' + jsonObj[i].col6 + '\n' +
                            'Fecha: ' + jsonObj[i].col7
                        )
                    break;
                }
            }
        let modificar = document.createElement('td');
            modificar.classList.add('modificarRegistro');
            modificar.title = "Modificar";
            let simb_modificar = document.createElement('i');
            modificar.appendChild(simb_modificar);
            simb_modificar.classList.add('fa-solid', 'fa-pen-to-square');
            modificar.onclick = function() {
                alert('modificar' + [i]);
            }

        

        let eliminar = document.createElement('td');
            eliminar.classList.add('eliminarRegistro');
            eliminar.title = "Eliminar";
            let simb_eliminar = document.createElement('i');
            eliminar.appendChild(simb_eliminar);
            simb_eliminar.classList.add('fa-solid', 'fa-trash');

            let rutaDelete = '../../model/del/del_';
            eliminar.onclick = function() {
                switch(parametro){
                    case '.registro-operadores':
                        deleteBlock(`${rutaDelete}operador.php`, jsonObj[i].col1, 'operador.php', '.registro-operadores');
                        break;

                    case '.registro-choferes':
                        deleteBlock(`${rutaDelete}chofer.php`, jsonObj[i].col5, 'chofer.php', '.registro-choferes')
                        break;

                    case '.registro-coches':
                        deleteBlock(`${rutaDelete}coche.php`, jsonObj[i].col1, 'coche.php', '.registro-coches')
                        break;

                    case '.registro-GDM':
                        deleteBlock(`${rutaDelete}mantenimiento.php`, jsonObj[i].col1, 'mantenimiento.php', '.registro-GDM');
                        addBackRegister(jsonObj[i].col2);
                        break;
                }
            }

        switch(parametro){
            case '.registro-operadores':
                col1.textContent = jsonObj[i].col1;
                col2.textContent = jsonObj[i].col2;
                col3.textContent = jsonObj[i].col3;
                registro.appendChild(col1);
                registro.appendChild(col2);
                registro.appendChild(col3);
                break;

            case '.registro-choferes':
            case '.registro-coches':
                col1.textContent = jsonObj[i].col1;
                col2.textContent = jsonObj[i].col2;
                col3.textContent = jsonObj[i].col3;
                col4.textContent = jsonObj[i].col4;
                registro.appendChild(col1);
                registro.appendChild(col2);
                registro.appendChild(col3);
                registro.appendChild(col4);
                break;

            default:
                col1.textContent = jsonObj[i].col1;
                col2.textContent = jsonObj[i].col2;
                col3.textContent = jsonObj[i].col3;
                col4.textContent = jsonObj[i].col4;
                col5.textContent = jsonObj[i].col5;
                registro.appendChild(col1);
                registro.appendChild(col2);
                registro.appendChild(col3);
                registro.appendChild(col4);
                registro.appendChild(col5); 
                break;
        }

        registro.appendChild(consultar);
        registro.appendChild(modificar);
        registro.appendChild(eliminar);
    }
}

function deleteBlock(url, send, read_block, block) {
    let alertConfirmDelete = confirm('¿Está seguro de eliminar este registro?')
    if (alertConfirmDelete == true) {
        $.ajax({
            url: url,
            type: 'POST',
            data: {
                send: send
            },
            success: function(response){
                if(response == 1) {
                    alert('Registro eliminado correctamente')
                } else {
                    alert('Error al eliminar el registro');
                }
                consultas(`${rutaConsulta}${read_block}`, `${block}`)
            },
            error: function(reject){
                alert(reject);
            }
        })
    }
}

function addBackRegister(matricula) {
    $.ajax({
        url: '../../model/add/add_cocheMan.php',
        type: 'POST',
        data: {
            matricula: matricula
        },
        success: function(response) {
            if (response == true) {
                alert('Coche agregado correctamente');
            } else {
                alert('Error al agregar coche');
            }
        },
        error: function(response) {
            alert(response);
        }
    })
}