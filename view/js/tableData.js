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
                            'Nombre: ' + jsonObj[i].col1 + '\n' +
                            'Matrícula: ' + jsonObj[i].col2 + '\n' +
                            'Modelo: ' + jsonObj[i].col3 + '\n' +
                            'Marca: ' + jsonObj[i].col4+ '\n' +
                            'Año: ' + jsonObj[i].col5 + '\n' +
                            'Teléfono: ' + jsonObj[i].col6 + '\n' +
                            'Cedula: ' + jsonObj[i].col7
                        );
                    break;
                    case '.registro-cliente':
                        alert(
                            'Teléfono: ' + jsonObj[i].col1 + '\n' +
                            'Lista negra: ' + jsonObj[i].col2 + '\n' +
                            'Nombre: ' + jsonObj[i].col3 + '\n' +
                            'Apellido: ' + jsonObj[i].col4 + '\n' +
                            'Dirección: ' + jsonObj[i].col5 + '\n'
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
                            'Fecha: ' + jsonObj[i].col6 + '\n' +
                            'Empresa: ' + jsonObj[i].col7
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
            eliminar.onclick = function() {
                switch(parametro){
                    case '.registro-operadores':
                        let del_operador = confirm('¿Está seguro de eliminar este registro?')
                        if(del_operador == true){
                            $.ajax({
                                url: '../../model/del/del_operador.php',
                                type: 'POST',
                                data: {
                                    cedula: jsonObj[i].col1
                                },
                                success: function(response){
                                    if(response == 1) {
                                        alert('Registro eliminado correctamente')
                                    } else {
                                        alert('Error al eliminar el registro');
                                    }
                                    consultas(`${rutaConsulta}operador.php`, '.registro-operadores')
                                },
                                error: function(reject){
                                    alert(reject);
                                }
                            })
                        }
                    break;
                    case '.registro-choferes':
                        let del_chofer = confirm('¿Está seguro de eliminar este registro?')
                        if(del_chofer == true){
                            $.ajax({
                                url: '../model/eliminar/del_chofer.php',
                                type: 'POST',
                                data: {
                                    cedula: jsonObj[i].col7
                                },
                                success: function(response){
                                    alert(response);
                                    consultas(`${rutaConsulta}chofer.php`, '.registro-choferes');
                                },
                                error: function(reject){
                                    alert(reject);
                                }
                            })
                        } else {
                            alert('Cancelado');
                        }
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
            // case '.registro-deleted-operadores':
            //     alert('si')
            // break;
            case '.registro-empresa':
            case '.registro-cliente':
                col1.textContent = jsonObj[i].col1;
                if (jsonObj[i].col2 == '1'){
                    col2.innerHTML = `<span class="listanegra-si">SI</span>`;
                } else {
                    col2.innerHTML = `<span class="listanegra-no">NO</span>`;
                }
                col3.textContent = jsonObj[i].col3;
                col4.textContent = jsonObj[i].col4;
                col5.textContent = jsonObj[i].col5;
                registro.appendChild(col1);
                registro.appendChild(col2);
                registro.appendChild(col3);
                registro.appendChild(col4);
                registro.appendChild(col5); 
            break;
            case '.registro-reserva':
                col1.textContent = jsonObj[i].col1;
                if (jsonObj[i].col2 == '1'){
                    col2.innerHTML = `<span class="reserva-particular">PARTICULAR</span>`;
                } else {
                    col2.innerHTML = `<span class="reserva-empresa">EMPRESA</span>`;
                }
                col3.textContent = jsonObj[i].col3;
                col4.textContent = jsonObj[i].col4;
                col5.textContent = jsonObj[i].col5;
                registro.appendChild(col1);
                registro.appendChild(col2);
                registro.appendChild(col3);
                registro.appendChild(col4);
                registro.appendChild(col5); 
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