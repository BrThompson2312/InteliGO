function tableData(parametro, jsonObj){
    let registro_seccion = document.querySelector(parametro);      
    registro_seccion.innerHTML='';
    for (let i = 0; i < jsonObj.length; i++){

        let registro = document.createElement('tr');
        registro.classList.add('datos-admin');
        registro_seccion.appendChild(registro);
        
        let pk = document.createElement('td');
    
        let nombre = document.createElement('td');

        let consultar = document.createElement('td');
            consultar.classList.add('consultaRegistro');
            let simb_consultar = document.createElement('i');
            consultar.appendChild(simb_consultar);
            consultar.title = "Mas información";
            simb_consultar.classList.add('fa-solid','fa-eye');
            consultar.onclick = function(){
                switch(parametro){
                    case '.registro-operadores':
                        alert(
                            'Cedula: ' + jsonObj[i].pk + '\n' + 
                            'Nombre: ' + jsonObj[i].nombre + '\n' +
                            'Rol de usuario: ' + jsonObj[i].rol + '\n' +
                            'Fecha de ingreso: ' + jsonObj[i].fechaing
                        );
                    break;
                    case '.registro-choferes':
                        alert(
                            'Cedula del chofer: ' + jsonObj[i].pk + '\n' +
                            'Teléfono del chofer: ' + jsonObj[i].telefono
                        );
                    break;
                    case '.registro-cliente':
                        alert(
                            'Teléfono: ' + jsonObj[i].telefono
                        );
                    break;
                    case '.registro-empresa':
                        alert(
                            'Teléfono: ' + jsonObj[i].telefono + '\n' +
                            'Email: ' + jsonObj[i].correo + '\n' +
                            'Encargado de pagos: ' + '' + '\n' +
                            'Autorizado: ' + ''
                        );
                    break;
                    case '.registro-reserva':
                        alert(
                            'Origen: ' + jsonObj[i].origen + '\n' +
                            'Destino: ' + jsonObj[i].destino + '\n' + 
                            'Fecha del viaje: ' + jsonObj[i].fecha_servicio + '\n' +
                            'Fecha de reserva: ' + jsonObj[i].fecha_reserva + '\n' +
                            'Hora: ' + jsonObj[i].hora_inicio + '\n' +
                            'Distancia recorrida: ' + jsonObj[i].distancia_recorrida + '\n' +
                            'Comentario: ' + jsonObj[i].comentario
                        );
                    break;
                }
            }

    
        let modificar = document.createElement('td');
            modificar.classList.add('modificarRegistro');
            modificar.title = "Modificar";
            let simb_modificar = document.createElement('i');
            modificar.appendChild(simb_modificar);
            simb_modificar.classList.add('fa-solid', 'fa-gear');
            modificar.onclick = function() {
                alert('modificar' + [i]);
            }
            
        let eliminar = document.createElement('td');
            eliminar.classList.add('eliminarRegistro');
            eliminar.title = "Eliminar";
            let simb_eliminar = document.createElement('i');
            eliminar.appendChild(simb_eliminar);
            simb_eliminar.classList.add('fa-solid', 'fa-arrow-right-from-bracket');
            eliminar.onclick = function() {
                alert('eliminar' + [i]);
            }

            switch(parametro){
                case '.registro-operadores':
                    pk.textContent = jsonObj[i].pk;
                    nombre.textContent = jsonObj[i].nombre;
                    let rol_user = document.createElement('td');
                        rol_user.classList.add('bg-td')
                    let fechaIng = document.createElement('td');
                        fechaIng.classList.add('bg-td');
                    fechaIng.textContent = jsonObj[i].fechaing_operador
                    registro.appendChild(pk);
                    registro.appendChild(nombre);
                    registro.appendChild(fechaIng);
                break;
                case '.registro-choferes':
                    pk.textContent = jsonObj[i].pk;
                    nombre.textContent = jsonObj[i].nombre
                    let telefono_chofer = document.createElement('td');
                        telefono_chofer.classList.add('bg-td');
                        telefono_chofer.textContent = jsonObj[i].telefono;
                    let matricula = document.createElement('td');
                        matricula.textContent = jsonObj[i].matricula;
                    let modelo = document.createElement('td');
                        modelo.classList.add('bg-td');
                        modelo.textContent = jsonObj[i].modelo;
                    let marca = document.createElement('td');
                        marca.textContent = jsonObj[i].marca;
                    let año = document.createElement('td');
                        año.classList.add('bg-td');
                        año.textContent = jsonObj[i].año;
                        registro.appendChild(matricula);
                        registro.appendChild(nombre);
                        registro.appendChild(modelo);
                        registro.appendChild(marca);
                        registro.appendChild(año);
                        registro.appendChild(consultar)
                break;
                case '.registro-LN':
                    pk.textContent = jsonObj[i].pk;
                    let direccion = document.createElement('td');
                        direccion.textContent = jsonObj[i].direccion;
                    registro.appendChild(pk);
                    registro.appendChild(direccion);
                break;
                case '.registro-cliente':
                    pk.textContent = jsonObj[i].pk;
                    let lista_negra = document.createElement('td');
                    let lnspan = document.createElement('span');
                        lista_negra.appendChild(lnspan);
                        lnspan.style.padding = "5px";
                        lnspan.style.borderRadius = "5px"
                        lnspan.style.color = "white";
                        lnspan.textContent = jsonObj[i].lista_negra;
                        if (jsonObj[i].lista_negra == '0'){
                            lnspan.style.backgroundColor = "green";
                            lnspan.textContent = "NO"
                        } else {
                            lnspan.style.backgroundColor = "red";
                            lnspan.textContent = "SI"
                        }
                    let nombre_cliente = document.createElement('td');
                        nombre_cliente.classList.add('bg-td');
                        nombre_cliente.textContent = jsonObj[i].nombre;
                    let apellido_cliente = document.createElement('td');
                        apellido_cliente.textContent = jsonObj[i].apellido;
                    let direccion_cliente = document.createElement('td');
                        direccion_cliente.textContent = jsonObj[i].direccion;
                        direccion_cliente.classList.add('bg-td');
                    registro.appendChild(pk);
                    registro.appendChild(lista_negra);
                    registro.appendChild(nombre_cliente)
                    registro.appendChild(apellido_cliente);
                    registro.appendChild(direccion_cliente);
                    registro.appendChild(consultar);
                break;
                case '.registro-empresa':
                    pk.textContent = jsonObj[i].pk;
                    let empresa_ln = document.createElement('td');
                        lnempresa = document.createElement('span');
                        lnempresa.textContent = jsonObj[i].lista_negra;
                        empresa_ln.appendChild(lnempresa);
                        if(jsonObj[i].lista_negra == '1'){
                            lnempresa.style.backgroundColor = "red";
                            lnempresa.style.padding = "5px";
                            lnempresa.style.borderRadius = "5px"
                            lnempresa.style.color = "white";
                            lnempresa.textContent = "SI"
                        } else {
                            lnempresa.style.backgroundColor = "green";
                            lnempresa.style.padding = "5px";
                            lnempresa.style.borderRadius = "5px"
                            lnempresa.style.color = "white";
                            lnempresa.textContent = "NO"
                        }  
                    let nombre_fantasia = document.createElement('td');
                        nombre_fantasia.classList.add('bg-td');
                        nombre_fantasia.textContent = jsonObj[i].nombre_fantasia;
                    let razon_social = document.createElement('td');
                        razon_social.textContent = jsonObj[i].razon_social;
                    let direccion_empresa = document.createElement('td');
                        direccion_empresa.classList.add('bg-td');
                        direccion_empresa.textContent = jsonObj[i].direccion
                    let email_empresa = document.createElement('td');
                        email_empresa.classList.add('bg-td');
                        registro.appendChild(pk);
                        registro.appendChild(empresa_ln);
                        registro.appendChild(nombre_fantasia);
                        registro.appendChild(razon_social)
                        registro.appendChild(direccion_empresa);
                        registro.appendChild(consultar);
                break;
                case '.registro-reserva':
                    pk.textContent = jsonObj[i].pk;
                    let tipo_reserva = document.createElement('td');
                        lnstipo_pasajero = document.createElement('span');  
                        tipo_reserva.appendChild(lnstipo_pasajero);
                        lnstipo_pasajero.textContent = jsonObj[i].tipo;
                        if (jsonObj[i].tipo == "PARTICULAR"){
                            lnstipo_pasajero.style.backgroundColor = "red";
                        } else {
                            lnstipo_pasajero.style.backgroundColor = "orange";
                        }
                        lnstipo_pasajero.style.padding = "5px";
                        lnstipo_pasajero.style.borderRadius = "5px";
                        lnstipo_pasajero.style.color = "white";
                    let nombre_pasajero = document.createElement('td');                        
                        nombre_pasajero.classList.add('bg-td');
                        nombre_pasajero.textContent = jsonObj[i].nombre;
                    let cedula_chofer = document.createElement('td');
                        cedula_chofer.textContent = jsonObj[i].cedula_chofer;
                    let telefono = document.createElement('td');
                        telefono.classList.add('bg-td');
                        telefono.textContent = jsonObj[i].telefono;
                        registro.appendChild(pk);
                        registro.appendChild(tipo_reserva);
                        registro.appendChild(nombre_pasajero);
                        registro.appendChild(cedula_chofer);
                        registro.appendChild(telefono);
                        registro.appendChild(consultar)
                break;
                case '.registro-GDM':
                    pk.textContent = jsonObj[i].pk;
                    let fecha = document.createElement('td');
                    let tipo_mantenimiento = document.createElement('td');
                        tipo_mantenimiento.classList.add('bg-td')
                        tipo_mantenimiento.textContent = jsonObj[i].tipo_mantenimiento;
                    let gastos_mantenimiento = document.createElement('td');
                        gastos_mantenimiento.textContent = jsonObj[i].gastos_mantenimiento;
                    let comentarios = document.createElement('td');
                        comentarios.classList.add('bg-td')
                        comentarios.textContent = jsonObj[i].comentarios;
                        registro.appendChild(pk);
                        registro.appendChild(fecha);
                        registro.appendChild(tipo_mantenimiento);
                        registro.appendChild(gastos_mantenimiento);
                        registro.appendChild(comentarios);
                break;
                default:
                    registro.appendChild(consultar);
                break;
            }

            registro.appendChild(modificar);
            registro.appendChild(eliminar);
    }
}