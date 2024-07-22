function tableData(parametro, jsonObj){
    let registro_seccion = document.querySelector(parametro);    
        registro_seccion.innerHTML = "";

    let new_consultar = ` 
    <td title="Mas informacion" class="consultaRegistro" style="display: table-cell">
        <i class="fa-solid fa-eye"></i>
    </td>`

    let new_eliminar = `
    <td title="Eliminar" class="eliminarRegistro">
        <i class="fa-solid fa-trash"></i>
    </td>`;

    let new_modificar = `
    <td title="Modificar" class="modificarRegistro">
        <i class="fa-solid fa-pen-to-square"></i>
    </td>`;

    for (let i = 0; i < jsonObj.length; i++){
                
        let cols_op = `
            ${new_consultar}
            ${new_modificar}
            ${new_eliminar}`

        let row = `
            <tr class="datos-admin">
                <td>${jsonObj[i].col1}</td>
                <td>${jsonObj[i].col2}</td>
                <td>${jsonObj[i].col3}</td>`

        switch(parametro){
            case '.registro-choferes': case '.registro-coches':
                row += `<td>${jsonObj[i].col4}</td>`; break;
        }

        row += cols_op
        registro_seccion.innerHTML += row;

        let btn_consultar = document.querySelectorAll(".consultaRegistro")
        for (let k = 0; k < btn_consultar.length; k++) {
            btn_consultar[k].onclick = function() {
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
                    case '.registro-asignacion':
                        alert(
                            'Cedula: ' + jsonObj[i].col1 + '\n' +
                            'Chofer: ' + jsonObj[i].col2 + '\n' +
                            'Coche ' + jsonObj[i].col3
                        );                                  
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
                            'Nro_cliente: ' + jsonObj[i].col1 + '\n' +
                            'RUT: ' + jsonObj[i].col2 + '\n' +
                            'Nombre fantasia: ' + jsonObj[i].col3 + '\n' +
                            'Correo: ' + jsonObj[i].col4 + '\n' +
                            'Direccion: ' + jsonObj[i].col5 + '\n' +
                            'Razon social: ' + jsonObj[i].col6 + '\n' +
                            'Encargado de pagos: ' + jsonObj[i].col7 + '\n' +
                            'Autorizado: ' + jsonObj[i].col8 + '\n' +
                            'Telefono: ' + jsonObj[i].col9 + '\n' +
                            'Lista negra: ' + jsonObj[i].col10
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
            };
        }

        // Modificar 
        let btn_modificar = document.querySelectorAll(".modificarRegistro")
        for (let k = 0; k < btn_modificar.length; k++) {
            btn_modificar[k].onclick = function() {
                alert("")
                data_matricula('#matricula-asignacion');
                data_matricula('#matricula-gdm');
                data_codCliente('#cliente-reserva');
                data_cedula('#ci-asignacion');
                data_cedula('#chofer-realizan');
                switch (parametro) {
                    case '.registro-operadores':
                        exception = [
                            'nombre-operador',
                            'contrasena-operador'
                        ];
                        modBlock('.conteiner-operador', '.BRS-operador', exception); break;
                    case '.registro-choferes':
                        exception = [
                            'tel-chofer',
                            'nombre-chofer', 
                            'apellido-chofer'  
                        ];
                        modBlock('.conteiner-chofer',  '.BRS-choferes', exception); break;

                    case '.registro-coches':
                        exception = [
                            'marca-coche', 
                            'modelo-coche',
                            'año-coche'
                        ];
                        modBlock('.conteiner-coche',  '.BRS-coches', exception); break;

                    case '.registro-asignacion':
                        exception = [
                            'matricula-asignacion'
                        ];
                        modBlock('.conteiner-asignacion',  '.BRS-asignacion', exception); break;

                    case '.registro-cliente':
                        exception = [
                            'tel-particular',
                            'nombre-particular', 
                            'apellido-particular',
                            'direccion-particular',
                            'ln-particular'
                        ];
                        modBlock('.conteiner-cliente',  '.BRS-cliente', exception); break;

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
                        modBlock('.conteiner-empresa',  '.BRS-empresa', exception); break;

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
                        modBlock('.conteiner-reserva',  '.BRS-reserva', exception); break;

                    case '.registro-GDM':
                        exception = [
                            'concepto-gdm',
                            'importe-gdm',
                            'taller-gdm',
                            'comentario-gdm'
                        ];
                        modBlock('.conteiner-GDM', '.BRS-GDM', exception); break;
                }
            }
        }

        // Eliminar
        let btn_eliminar = document.querySelectorAll(".eliminarRegistro")
        let rutaDelete = 'model/del/del_';
        for (let k = 0; k < btn_eliminar.length; k++) {
            btn_eliminar[k].onclick = function() {
                let alertConfirmDelete = confirm('¿Está seguro de eliminar este registro?');
                if (alertConfirmDelete == true) {
                    switch(parametro){
                        case '.registro-operadores':
                            deleteBlock(`${rutaDelete}operador.php`, jsonObj[i].col1, 'operador.php', '.registro-operadores'); break;

                        case '.registro-choferes':
                            deleteBlock(`${rutaDelete}chofer.php`, jsonObj[i].col4, 'chofer.php', '.registro-choferes'); break;

                        case '.registro-coches':
                            deleteBlock(`${rutaDelete}coche.php`, jsonObj[i].col1, 'coche.php', '.registro-coches'); break;

                        case '.registro-asignacion':
                            if (confirm('Si elimina este registro posiblemente esté eliminando una reserva, desea continuar?')) {
                                deleteBlock(`${rutaDelete}asignacion.php`, jsonObj[i].col1, 'asignacion.php', '.registro-asignacion')
                            } break;

                        case '.registro-cliente':
                            deleteBlock(`${rutaDelete}particular.php`, jsonObj[i].col1, 'particular.php', '.registro-cliente'); break;
                        
                        case '.registro-empresa':
                            deleteBlock(`${rutaDelete}empresa.php`, jsonObj[i].col1, 'empresa.php', '.registro-empresa'); break;

                        case '.registro-reserva':
                            deleteBlock(`${rutaDelete}reserva.php`, jsonObj[i].col14, 'reserva.php', '.registro-reserva'); break;
                
                        case '.registro-GDM':
                            deleteBlock(`${rutaDelete}mantenimiento.php`, jsonObj[i].col1, 'mantenimiento.php', '.registro-GDM');
                            addBackRegister(jsonObj[i].col2); break;
                    }
                }
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

            let arrInputs = [];
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

                    let obj;
                    if(errores) {
                        alertSuccess('incompleted');
                    } else {
                        switch (block) {
                            case '.BRS-operador':
                                obj = new Operador();
                                obj.cedula = jsonObj[i].col1;
                                upd_block('operador.php', obj, '#operador'); break;

                            case '.BRS-choferes':
                                obj = new Chofer();
                                obj.cedula = jsonObj[i].col4
                                upd_block('chofer.php', obj, '#chofer'); break;

                            case '.BRS-coches':
                                obj = new Coche();
                                obj.matricula = jsonObj[i].col1;
                                upd_block('coche.php', obj, '#coche'); break;

                            case '.BRS-asignacion':
                                obj = new Asignacion();
                                obj.cedula = jsonObj[i].col1
                                upd_block('asignacion.php', obj, '#asignacion'); break;

                            case '.BRS-cliente':
                                obj = new Particular();
                                obj.cod = jsonObj[i].col1;
                                upd_block('particular.php', obj, '#particular'); break;

                            case '.BRS-empresa':
                                obj = new Empresa();
                                obj.cod = jsonObj[i].col10
                                upd_block('empresa.php', obj, '#empresa'); break;

                            case '.BRS-reserva':
                                obj = new Reserva();
                                obj.cod = jsonObj[i].col14;
                                upd_block('reserva.php', obj, '#reserva'); break;

                            case '.BRS-GDM':
                                obj = new Mantenimiento();
                                obj.cod.jsonObj[i].col1;
                                upd_block('mantenimiento.php', obj, '#gastos-de-mantenimiento'); break;
                        }                       
                    }
                }
        }
        let exception = [];
    }
}

function upd_block(url, obj, rel) {
    fetch(`model/update/upd_${url}`, { method: 'POST', body: JSON.stringify(obj) })
    .then(res => res.json())
    .then(res => {
     if (res == true) {
         alertSuccess('modify');
         document.querySelector(container).style.display = 'block';
         document.querySelector(block).style.display = 'none';
         llamado(rel);
         document.querySelector(`${block} .alert_section`).reset();
     } else {
         alertSuccess('error');
     }
    })
    .catch(rej => alert(rej))
}

function deleteBlock (url, send, read_block, block) {
    fetch(url, {method: 'POST', body: JSON.stringify( {send: send} )})
    .then(res => res.json())
    .then(res => {
        if (res == 1) alertSuccess('trashed'); else alertSuccess('error')
        consultas(read_block, block)
    })
    .catch(rej => alert(rej))
}

function addBackRegister(matricula) {
    fetch("model/add/add_cocheMan.php", {method: 'POST', body: JSON.stringify( {matricula: matricula} )})
    .then(res => res.json())
    .then(res => {
        if (response == true) alert("Coche agregado correctamente"); else alert("Error al agregar coche")
    })
    .catch(rej => alert(rej))
}

const rut_conexion = 'model/add/add_';

function data_matricula(datalist) {
    let data_matricula = document.querySelector(datalist)
        data_matricula.innerHTML = '';
    fetch("model/read/matriculaCoche.php", {method: 'POST'})
    .then(res => res.json())
    .then(res => {
        let matricula = JSON.parse(res);
        for (let i = 0; i < matricula.length; i++) {
            let option = document.createElement('option');
            option.value = matricula[i].matricula;
            option.textContent = `${matricula[i].marca} ${matricula[i].modelo}`;
            data_matricula.appendChild(option);
        }
    })
    .catch(rej => alert(rej))
}

function data_cedula(datalist) {
    let data_cedula = document.querySelector(datalist);
        data_cedula.innerHTML = '';
    fetch("model/read/cedulaChofer.php", {method: 'POST'})
    .then(res => res.json())
    .then(res => {
        let cedula = JSON.parse(res);
            data_cedula.innerHTML = '';
            for (let i = 0; i < cedula.length; i++) {
                let option = document.createElement('option');
                option.value = cedula[i].cedula;
                option.textContent = `${cedula[i].nombre} ${cedula[i].apellido}`;
                data_cedula.appendChild(option);
            }
    })
    .catch(rej => alert(rej))
}

function data_codCliente(datalist) {
    let cod = document.querySelector(datalist);
        cod.innerHTML = '';

    fetch("model/read/codCliente.php", { method: 'POST'})
    .then(res => res.json())
    .then(res => {
        let cod_cliente = JSON.parse(res);
        for (let i = 0; i < cod_cliente.length; i++) {
            let option = document.createElement('option');
            option.value = cod_cliente[i].cod_cliente;
            option.textContent = `${cod_cliente[i].col1} ${cod_cliente[i].col2}`;
            cod.appendChild(option);
        }
    })
    .catch(rej => alert(rej))
}

let ex_filt = document.querySelectorAll('.ex-filt');

let $ = container => document.querySelector(container);
let $name = container => document.getElementsByName(container)[0].value;