class System {
    constructor() {

    }

    tableData(block, obj) {
        let registro_seccion = document.querySelector(block);      
        registro_seccion.innerHTML = ''
        for (let i = 0; i < obj.length; i++){
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
                    switch(block){
                        case '.registro-operadores':
                            alert(
                                'Cedula: ' + obj[i].col1 + '\n' + 
                                'Nombre: ' + obj[i].col2 + '\n' +
                                'Fecha de ingreso: ' + obj[i].col3
                            );
                            break;
                        case '.registro-choferes':
                            alert(
                                'Teléfono: ' + obj[i].col1 + '\n' +
                                'Nombre: ' + obj[i].col2 + '\n' +
                                'Cedula: ' + obj[i].col3  + '\n' +
                                'Coche: ' + obj[i].col4
                            );
                            break;
                        case '.registro-coches':
                            alert(
                                'matricula: ' + obj[i].col1 + '\n' +
                                'Modelo: ' + obj[i].col2 + '\n' +
                                'Marca: ' + obj[i].col3 + '\n' +
                                'Año: ' + obj[i].col4
                            )
                            break;
                        case '.registro-asignacion':
                            alert(
                                'Cedula: ' + obj[i].col1 + '\n' +
                                'Chofer: ' + obj[i].col2 + '\n' +
                                'Coche ' + obj[i].col3
                            );                                  
                            break;
                        case '.registro-cliente':
                            alert(
                                'Cliente: ' + obj[i].col1 + '\n' +
                                'Teléfono: ' + obj[i].col2 + '\n' +
                                'Nombre: ' + obj[i].col3 + '\n' +
                                'Apellido: ' + obj[i].col4 + '\n' +
                                'Dirección: ' + obj[i].col5 + '\n' +
                                'Lista Negra: ' + obj[i].col6
                            )
                            break;
                        case '.registro-empresa':
                            alert(
                                'Nro_cliente: ' + obj[i].col1 + '\n' +
                                'RUT: ' + obj[i].col2 + '\n' +
                                'Nombre fantasia: ' + obj[i].col3 + '\n' +
                                'Correo: ' + obj[i].col4 + '\n' +
                                'Direccion: ' + obj[i].col5 + '\n' +
                                'Razon social: ' + obj[i].col6 + '\n' +
                                'Encargado de pagos: ' + obj[i].col7 + '\n' +
                                'Autorizado: ' + obj[i].col8 + '\n' +
                                'Telefono: ' + obj[i].col9 + '\n' +
                                'Lista negra: ' + obj[i].col10
                            );
                            break;
                        case '.registro-reserva':
                            alert(
                                'Cliente: ' + obj[i].col1 + '\n' +
                                'Pasajero: ' + obj[i].col2 + '\n' +
                                'Origen: ' + obj[i].col3 + '\n' +
                                'Destino: ' + obj[i].col4 + '\n' +
                                'Chofer: ' + obj[i].col5 + '\n' +
                                'Identificación Chofer: ' + obj[i].col6 + '\n' +
                                'Apellido Pasajero: ' + obj[i].col7 + '\n' +
                                'Fecha_reserva: ' + obj[i].col8 + '\n' +
                                'Hora de Reserva: ' + obj[i].col9 + '\n' +
                                'Fecha de Servicio: ' + obj[i].col10 + '\n' +
                                'Hora de Servicio: ' + obj[i].col11 + '\n' +
                                'Comentario: ' + obj[i].col12 + '\n' +
                                'Monto: ' + obj[i].col13 + '\n' +
                                'COD SERVICIO: ' + obj[i].col14
                            );
                            break;
                        case '.registro-GDM':
                            alert(
                                'COD-FACTURA: ' + obj[i].col1 + '\n' +
                                'Matrícula: ' + obj[i].col2 + '\n' +
                                'Concepto: ' + obj[i].col3 + '\n' +
                                'Comentarios: ' + obj[i].col4 + '\n' +
                                'Importe total: ' + obj[i].col5 + '\n' +
                                'Taller: ' + obj[i].col6 + '\n' +
                                'Fecha: ' + obj[i].col7
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
                    inputException = document.querySelector(`input[name="${exception[i]}"]`);
                    if(inputException == null) {
                        inputException = document.querySelector(`select[name="${exception[i]}"]`);
                    }
                    if(inputException == null) {
                        inputException = document.querySelector(`textarea[name="${exception[i]}"]`);
                    }   
                    inputException.style.display = "block";
                    arrInputs.push(inputException);
                    labelException = document.querySelector(`label[for="${exception[i]}"]`);
                    labelException.style.display = "block";
                }
                let modificar_datos = document.querySelector(`${block} .modificar_datos`);
                    modificar_datos.onclick = function() {
                        let errores = false;
                        for (let i = 0; i < arrInputs.length; i++) {
                            if (arrInputs[i].value == '') {
                                errores = true;
                                break;
                            }
                        }
                        function upd_block(url, obj, rel) {
                            $.ajax({
                                url: `model/update/upd_${url}`,
                                type: 'POST',
                                data: JSON.stringify(obj), 
                                success: function(response) {
                                    if (response == true) {
                                        alertSuccess('modify');
                                        document.querySelector(container).style.display = 'block';
                                        document.querySelector(block).style.display = 'none';
                                        llamado(rel);
                                        document.querySelector(`${block} .alert_section`).reset();
                                    } else {
                                        alertSuccess('error');
                                    }
                                },
                                error: function() {
                                    alert('Error');
                                }
                        })
                        }

                        if(errores) {
                            alertSuccess('incompleted');
                        } else {
                            switch (block) {
                                case '.BRS-operador':
                                    const operador = {
                                        cedula: obj[i].col1,
                                        nombre: arrInputs[0].value,
                                        contrasena: arrInputs[1].value,
                                    }
                                    upd_block('operador.php', operador, '#operador');
                                break;
                                case '.BRS-choferes':
                                    const chofer = {
                                        telefono: arrInputs[0].value,
                                        nombre: arrInputs[1].value,
                                        apellido: arrInputs[2].value,
                                        cedula: obj[i].col4,
                                    }
                                    upd_block('chofer.php', chofer, '#chofer');
                                break;
                                case '.BRS-coches':
                                    const coche = {
                                        matricula: obj[i].col1,
                                        marca: arrInputs[0].value,
                                        modelo: arrInputs[1].value,
                                        año: arrInputs[2].value,
                                    }
                                    upd_block('coche.php', coche, '#coche');
                                break;
                                case '.BRS-asignacion':
                                    const asignacion = {
                                        cedula: obj[i].col1,
                                        coche: arrInputs[0].value,
                                    }
                                    upd_block('asignacion.php', asignacion, '#asignacion');
                                break;
                                case '.BRS-cliente':
                                    const cliente = {
                                        cod: obj[i].col1,
                                        telefono: arrInputs[0].value,
                                        nombre: arrInputs[1].value,
                                        apellido: arrInputs[2].value,
                                        direccion: arrInputs[3].value,
                                        listanegra: arrInputs[4].value,
                                    }
                                    upd_block('particular.php', cliente, '#particular');
                                break;
                                case '.BRS-empresa':
                                    const empresa = {
                                        cod: obj[i].col10,
                                        listanegra: arrInputs[0].value,
                                        fantasia: arrInputs[1].value,
                                        razonsocial: arrInputs[2].value,
                                        direccion: arrInputs[3].value,
                                        telefono: arrInputs[4].value,
                                        correo: arrInputs[5].value,
                                        encargado: arrInputs[6].value,
                                        autorizado: arrInputs[7].value,
                                    }
                                    upd_block('empresa.php', empresa, '#empresa');
                                break;
                                case '.BRS-reserva':
                                    const reserva = {
                                        cod: obj[i].col14,
                                        nombre: arrInputs[0].value,
                                        forma_pago: arrInputs[1].value,
                                        apellido: arrInputs[2].value,
                                        monto: arrInputs[3].value,
                                        cliente: arrInputs[4].value,
                                        origen: arrInputs[5].value,
                                        destino: arrInputs[6].value,
                                        chofer: arrInputs[7].value,
                                        fecha: arrInputs[8].value,
                                        hora: arrInputs[9].value,
                                        comentario: arrInputs[10].value,
                                    }
                                    upd_block('reserva.php', reserva, '#reserva');
                                break;
                                case '.BRS-GDM':
                                    const gdm = {
                                        cod: obj[i].col1,
                                        concepto: arrInputs[0].value,
                                        importe: arrInputs[1].value,
                                        taller: arrInputs[2].value,
                                        comentario: arrInputs[3].value,
                                    }
                                    upd_block('mantenimiento.php', gdm, '#gastos-de-mantenimiento');
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
                    data_matricula('#matricula-asignacion');
                    data_matricula('#matricula-gdm');
                    data_codCliente('#cliente-reserva');
                    data_cedula('#ci-asignacion');
                    data_cedula('#chofer-realizan');
                    switch (block) {
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

                        case '.registro-asignacion':
                            exception = [
                                'matricula-asignacion'
                            ];
                            modBlock('.conteiner-asignacion',  '.BRS-asignacion', exception);
                            break;

                        case '.registro-cliente':
                            exception = [
                                'tel-particular',
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
                                'tel-empresa',
                                'correo-empresa',
                                'encargado-empresa',
                                'autorizado-empresa'
                            ];
                            modBlock('.conteiner-empresa',  '.BRS-empresa', exception);
                            break;

                        case '.registro-reserva':
                            exception = [
                                'nombre-servicio',
                                'forma-de-pago',
                                'apellido-servicio',
                                'monto-servicio',
                                'cliente-reserva',
                                'origen-servicio',
                                'destino-servicio',
                                'chofer-realizan',
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
                                'taller-gdm',
                                'comentario-gdm'
                            ];
                            modBlock('.conteiner-GDM', '.BRS-GDM', exception);
                    }
                }

            let eliminar = document.createElement('td');
                eliminar.classList.add('eliminarRegistro');
                eliminar.title = "Eliminar";
                let simb_eliminar = document.createElement('i');
                eliminar.appendChild(simb_eliminar);
                simb_eliminar.classList.add('fa-solid', 'fa-trash');
                let rutaDelete = 'model/del/del_';
                eliminar.onclick = function() {
                    let alertConfirmDelete = confirm('¿Está seguro de eliminar este registro?');
                    if (alertConfirmDelete == true) {
                        switch(block){
                            case '.registro-operadores':
                                deleteBlock(`${rutaDelete}operador.php`, obj[i].col1, 'operador.php', '.registro-operadores');
                                break;

                            case '.registro-choferes':
                                deleteBlock(`${rutaDelete}chofer.php`, obj[i].col4, 'chofer.php', '.registro-choferes')
                                break;

                            case '.registro-coches':
                                deleteBlock(`${rutaDelete}coche.php`, obj[i].col1, 'coche.php', '.registro-coches');
                                break;

                            case '.registro-asignacion':
                                if (confirm('Si elimina este registro posiblemente esté eliminando una reserva, desea continuar?')) {
                                    deleteBlock(`${rutaDelete}asignacion.php`, obj[i].col1, 'asignacion.php', '.registro-asignacion')
                                }
                                break;

                            case '.registro-cliente':
                                deleteBlock(`${rutaDelete}particular.php`, obj[i].col1, 'particular.php', '.registro-cliente')
                                break;
                            
                            case '.registro-empresa':
                                deleteBlock(`${rutaDelete}empresa.php`, obj[i].col1, 'empresa.php', '.registro-empresa')
                                break;

                            case '.registro-reserva':
                                deleteBlock(`${rutaDelete}reserva.php`, obj[i].col14, 'reserva.php', '.registro-reserva')
                                break;
                    
                            case '.registro-GDM':
                                deleteBlock(`${rutaDelete}mantenimiento.php`, obj[i].col1, 'mantenimiento.php', '.registro-GDM');
                                addBackRegister(obj[i].col2);
                                break;
                        }
                    }
                }

            switch(block){
                case '.registro-operadores':
                case '.registro-asignacion':
                    col1.textContent = obj[i].col1;
                    col2.textContent = obj[i].col2;
                    col3.textContent = obj[i].col3;
                    registro.appendChild(col1);
                    registro.appendChild(col2);
                    registro.appendChild(col3);
                    break;

                case '.registro-choferes':
                case '.registro-coches':
                    col1.textContent = obj[i].col1;
                    col2.textContent = obj[i].col2;
                    col3.textContent = obj[i].col3;
                    col4.textContent = obj[i].col4;
                    registro.appendChild(col1);
                    registro.appendChild(col2);
                    registro.appendChild(col3);
                    registro.appendChild(col4);
                    break;

                default:
                    col1.textContent = obj[i].col1;
                    col2.textContent = obj[i].col2;
                    col3.textContent = obj[i].col3;
                    col4.textContent = obj[i].col4;
                    col5.textContent = obj[i].col5;
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
}