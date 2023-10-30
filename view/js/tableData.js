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
                            'Encargado de pagos: ' + jsonObj[i].col8 + '\n' +
                            'Autorizado: ' + jsonObj[i].col9
                        );
                        break;

                    case '.registro-reserva':
                        alert(
                            'Cliente: ' + jsonObj[i].col1 + '\n' +
                            'Pasajero: ' + jsonObj[i].col2 + '\n' +
                            'Origen: ' + jsonObj[i].col3 + '\n' +
                            'Destino: ' + jsonObj[i].col4 + '\n' +
                            'Chofer: ' + jsonObj[i].col5 + '\n' +
                            'Identificación Chofer: ' + jsonObj[i].col6 + '\n' +
                            'Apellido Pasajero: ' + jsonObj[i].col7 + '\n' +
                            'Fecha_reserva: ' + jsonObj[i].col8 + '\n' +
                            'Hora de Reserva: ' + jsonObj[i].col9 + '\n' +
                            'Fecha de Servicio: ' + jsonObj[i].col10 + '\n' +
                            'Hora de Servicio: ' + jsonObj[i].col11 + '\n' +
                            'Comentario: ' + jsonObj[i].col12 + '\n' +
                            'Monto: ' + jsonObj[i].col13 + '\n' +
                            'COD SERVICIO: ' + jsonObj[i].col14
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

        function modBlock(container, block, exception) {
            
            ventanaSeccion(container, block, 'modificar');

            let fields = document.querySelectorAll(`${block} label, ${block} input, ${block} select, ${block} textarea`);

            let inputException;
            let labelException;
            
            for (let i = 0; i < fields.length; i++) {
                fields[i].style.display = "none";
            }

            let arrInputs= [];
            for (let i = 0; i < exception.length; i++) {
                console.log(exception[i]);
                inputException = document.querySelector(`input[name="${exception[i]}"]`);
                if(inputException==null) {
                    inputException = document.querySelector(`select[name="${exception[i]}"]`);
                }
                if(inputException==null) {
                    inputException = document.querySelector(`textarea[name="${exception[i]}"]`);
                    //textareaException.style.display = "block";
                }   
                inputException.style.display = "block";
                arrInputs.push(inputException);
                labelException = document.querySelector(`label[for="${exception[i]}"]`);
                labelException.style.display = "block";
                
            }

            let modificar_datos = document.querySelector(`${block} .modificar_datos`);
                modificar_datos.onclick = function() {
                    let errores=false;
                    for (let i = 0; i < arrInputs.length; i++) {
                        console.log(arrInputs[i].value);
                        if (arrInputs[i].value == '') {
                            errores = true;
                            break;
                        }
                    }

                    if(errores) {
                        alert('No puede dejar campos vacios');
                    } else {
                        switch (block) {
                            case '.BRS-operador':
                                $.ajax({
                                    url: '../../model/update/upd_operador.php',
                                    type: 'POST',
                                    data: {
                                        cedula: jsonObj[i].col1,
                                        nombre: arrInputs[0].value,
                                        contrasena: arrInputs[1].value,
                                    },
                                    success: function(response) {
                                        alert(response);
                                    },
                                    error: function() {
                                        alert('No hay conexión');
                                    }
                               })
                            break;
                            case '.BRS-choferes':
                                $.ajax({
                                    url: '../../model/update/upd_chofer.php',
                                    type: 'POST',
                                    data: {
                                        cedula: jsonObj[i].col4,
                                        telefono: arrInputs[0].value,
                                        nombre: arrInputs[1].value,
                                        apellido: arrInputs[2].value,
                                    },
                                    success: function(response) {
                                        alert(response);
                                    },
                                    error: function() {
                                        alert('No hay conexión');
                                    }
                               })
                            break;
                            case '.BRS-coches':
                                $.ajax({
                                    url: '../../model/update/upd_coche.php',
                                    type: 'POST',
                                    data: {
                                        matricula: jsonObj[i].col1,
                                        marca: arrInputs[0].value,
                                        modelo: arrInputs[1].value,
                                        año: arrInputs[2].value,
                                    },
                                    success: function(response) {
                                        alert(response);
                                    },
                                    error: function() {
                                        alert('No hay conexión');
                                    }
                               })
                            break;
                            case '.BRS-cliente':
                                $.ajax({
                                    url: '../../model/update/upd_particular.php',
                                    type: 'POST',
                                    data: {
                                        cod: jsonObj[i].col1,
                                        nombre: arrInputs[0].value,
                                        apellido: arrInputs[1].value,
                                        direccion: arrInputs[2].value,
                                        listanegra: arrInputs[3].value,
                                    },
                                    success: function(response) {
                                        alert(response);
                                    },
                                    error: function() {
                                        alert('No hay conexión');
                                    }
                               })
                            break;
                            case '.BRS-empresa':
                                $.ajax({
                                    url: '../../model/update/upd_empresa.php',
                                    type: 'POST',
                                    data: {
                                        cod: jsonObj[i].col1,
                                        listanegra: arrInputs[0].value,
                                        fantasia: arrInputs[1].value,
                                        razonsocial: arrInputs[2].value,
                                        direccion: arrInputs[3].value,
                                        correo: arrInputs[4].value,
                                        encargado: arrInputs[5].value,
                                        autorizado: arrInputs[6].value,
                                    },
                                    success: function(response) {
                                        alert(response);
                                    },
                                    error: function() {
                                        alert('No hay conexión');
                                    }
                               })
                            break;
                            case '.BRS-reserva':
                                $.ajax({
                                    url: '../../model/update/upd_reserva.php',
                                    type: 'POST',
                                    data: {
                                        cod: jsonObj[i].col14,
                                        nombre: arrInputs[0].value,
                                        apellido: arrInputs[1].value,
                                        monto: arrInputs[2].value,
                                        cliente: arrInputs[3].value,
                                        origen: arrInputs[4].value,
                                        destino: arrInputs[5].value,
                                        fecha: arrInputs[6].value,
                                        hora: arrInputs[7].value,
                                        comentario: arrInputs[8].value,
                                    },
                                    success: function(response) {
                                        if (response == true) {
                                            alert('Reserva modificada correctamente');
                                        } else {
                                            alert('Error al modificar reserva');
                                        }
                                    },
                                    error: function() {
                                        alert('No hay conexión');
                                    }
                               })
                            break;
                            case '.BRS-GDM':
                                $.ajax({
                                    url: '../../model/update/upd_mantenimiento.php',
                                    type: 'POST',
                                    data: {
                                        cod: jsonObj[i].col1,
                                        concepto: arrInputs[0].value,
                                        importe: arrInputs[1].value,
                                        fecha: arrInputs[2].value,
                                        taller: arrInputs[3].value,
                                        comentario: arrInputs[4].value,
                                    },
                                    success: function(response) {
                                        alert(response);
                                    },
                                    error: function() {
                                        alert('No hay conexión');
                                    }
                               })
                            break;
                        }                       
                    }
                }

        }

        let modificar = document.createElement('td');
            modificar.classList.add('modificarRegistro');
            modificar.title = "Modificar";
            let simb_modificar = document.createElement('i');
            modificar.appendChild(simb_modificar);
            simb_modificar.classList.add('fa-solid', 'fa-pen-to-square');

            let exception = [];
            modificar.onclick = function() {
                switch (parametro) {
                    case '.registro-operadores':
                        exception = [
                            'nombre-operador',
                            'contrasena-operador'
                        ];
                        modBlock('.conteiner-operador', '.BRS-operador', exception); 
                        break;

                    case '.registro-choferes':
                        exception = [
                            'tel-chofer',
                            'nombre-chofer', 
                            'apellido-chofer'  
                        ];
                        modBlock('.conteiner-chofer',  '.BRS-choferes', exception);
                        break;

                    case '.registro-coches':
                        exception = [
                            'marca-coche', 
                            'modelo-coche',
                            'año-coche'
                        ];
                        modBlock('.conteiner-coche',  '.BRS-coches', exception);
                        break;

                    case '.registro-cliente':
                        exception = [
                            'nombre-particular', 
                            'apellido-particular',
                            'direccion-particular',
                            'ln-particular'
                        ];
                        modBlock('.conteiner-cliente',  '.BRS-cliente', exception);
                        break;

                    case '.registro-empresa':
                        exception = [
                            'listanegra-empresa',
                            'fantasia-empresa', 
                            'razonsocial-empresa',
                            'direccion-empresa',
                            'correo-empresa',
                            'encargado-empresa',
                            'autorizado-empresa'
                        ];
                        modBlock('.conteiner-empresa',  '.BRS-empresa', exception);
                        break;

                    case '.registro-reserva':
                        exception = [
                            'nombre-servicio', 
                            'apellido-servicio',
                            'monto-servicio',
                            'cliente-reserva',
                            'origen-servicio',
                            'destino-servicio',
                            'fecha-servicio',
                            'hora-servicio',
                            'comentario-servicio'
                        ];
                        modBlock('.conteiner-reserva',  '.BRS-reserva', exception);
                        break;

                    case '.registro-GDM':
                        exception = [
                            'concepto-gdm',
                            'importe-gdm',
                            'fecha-gdm',
                            'taller-gdm',
                            'comentario-gdm'
                        ];
                        modBlock('.conteiner-GDM',  '.BRS-GDM', exception);
                }
            }

        let eliminar = document.createElement('td');
            eliminar.classList.add('eliminarRegistro');
            eliminar.title = "Eliminar";
            let simb_eliminar = document.createElement('i');
            eliminar.appendChild(simb_eliminar);
            simb_eliminar.classList.add('fa-solid', 'fa-trash');
            let rutaDelete = '../../model/del/del_';
            eliminar.onclick = function() {
                let alertConfirmDelete = confirm('¿Está seguro de eliminar este registro?');
                if (alertConfirmDelete == true) {
                    switch(parametro){
                        case '.registro-operadores':
                            deleteBlock(`${rutaDelete}operador.php`, jsonObj[i].col1, 'operador.php', '.registro-operadores');
                            break;

                        case '.registro-choferes':
                            deleteBlock(`${rutaDelete}chofer.php`, jsonObj[i].col4, 'chofer.php', '.registro-choferes')
                            break;

                        case '.registro-coches':
                            deleteBlock(`${rutaDelete}coche.php`, jsonObj[i].col1, 'coche.php', '.registro-coches');
                            break;

                        case '.registro-asignacion':
                            deleteBlock(`${rutaDelete}asignacion.php`, jsonObj[i].col1, 'asignacion.php', '.registro-asignacion')
                            break;

                        case '.registro-cliente':
                            deleteBlock(`${rutaDelete}particular.php`, jsonObj[i].col1, 'particular.php', '.registro-cliente')
                            break;
                        
                        case '.registro-empresa':
                            deleteBlock(`${rutaDelete}empresa.php`, jsonObj[i].col1, 'empresa.php', '.registro-empresa')
                            break;

                        case '.registro-reserva':
                            deleteBlock(`${rutaDelete}reserva.php`, jsonObj[i].col11, 'reserva.php', '.registro-reserva')
                            break;
                
                        case '.registro-GDM':
                            deleteBlock(`${rutaDelete}mantenimiento.php`, jsonObj[i].col1, 'mantenimiento.php', '.registro-GDM');
                            addBackRegister(jsonObj[i].col2);
                            break;
                    }
                }
            }

        switch(parametro){
            case '.registro-operadores':
            case '.registro-asignacion':
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

