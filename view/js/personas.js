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
                    case '.registro-administradores':
                        alert(
                            'Cedula: ' + jsonObj[i].pk + '\n' + 
                            'Nombre: ' + jsonObj[i].nombre + '\n' +
                            'Rol de usuario: ' + jsonObj[i].rol + '\n' +
                            'Fecha de ingreso: ' + jsonObj[i].fechaing
                        );
                    break;
                    case '.registro-coches':
                        alert(
                            'Cedula: ' + jsonObj[i].pk + '\n' + 
                            'Nombre: ' + jsonObj[i].modelo + '\n' +
                            'Año: ' + jsonObj[i].año
                        );
                    break;
                    case '.registro-chofer':
                        alert(
                            'Cedula: ' + jsonObj[i].pk + '\n' + 
                            'Nombre: ' + jsonObj[i].nombre + '\n' +
                            'Identificador: ' + jsonObj[i].id
                        );
                    break;
                    case '.registro-empresa':
                        alert(
                            'Email: ' + '' + '\n' +
                            'Encargado de pagos: ' + '' + '\n' +
                            'Autorizado: ' + ''
                        );
                    break;
                    case '.registro-reserva':
                        alert(
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
                case '.registro-administradores':
                    pk.textContent = jsonObj[i].pk;
                    nombre.textContent = jsonObj[i].nombre;
                    let rol_user = document.createElement('td');
                        rol_user.classList.add('bg-td')
                    let fechaIng = document.createElement('td');
                        fechaIng.classList.add('bg-td');
                    rol_user.textContent = jsonObj[i].rol
                    fechaIng.textContent = jsonObj[i].fechaing
                    registro.appendChild(pk);
                    registro.appendChild(nombre);
                    registro.appendChild(fechaIng)
                break;
                case '.registro-coches':
                    pk.textContent = jsonObj[i].pk;
                    let marca_coche = document.createElement('td');
                        marca_coche.textContent = jsonObj[i].marca
                    let modelo = document.createElement('td');
                        modelo.classList.add('bg-td');
                        modelo.textContent = jsonObj[i].modelo;
                    let año = document.createElement('td');
                        año.textContent = jsonObj[i].año;
                        registro.appendChild(pk);
                        registro.appendChild(marca_coche);
                        registro.appendChild(modelo);
                        registro.appendChild(año)
                break;
                case '.registro-chofer':
                    pk.textContent = jsonObj[i].pk;
                    nombre.textContent = jsonObj[i].nombre
                    let telefono_chofer = document.createElement('td');
                        telefono_chofer.classList.add('bg-td');
                        registro.appendChild(pk);
                        registro.appendChild(nombre);
                        registro.appendChild(telefono_chofer);
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
                    let nombre_cliente = document.createElement('td');
                        nombre_cliente.classList.add('bg-td');
                        nombre_cliente.textContent = jsonObj[i].nombre;
                    let apellido_cliente = document.createElement('td');
                        apellido_cliente.textContent = jsonObj[i].apellido;
                    let direccion_cliente = document.createElement('td');
                        direccion_cliente.textContent = jsonObj[i].direccion;
                        direccion_cliente.classList.add('bg-td');
                    let lista_negra = document.createElement('td');
                    let lnspan = document.createElement('span');
                        lista_negra.appendChild(lnspan);
                        lnspan.textContent = jsonObj[i].lista_negra;
                    let telefono_cliente = document.createElement('td');
                        if (jsonObj[i].lista_negra == '0'){
                            lnspan.style.backgroundColor = "green";
                            lnspan.style.padding = "5px";
                            lnspan.style.borderRadius = "5px"
                            lnspan.style.color = "white";
                            lnspan.textContent = "NO"
                        } else {
                            lnspan.style.backgroundColor = "red";
                            lnspan.style.padding = "5px";
                            lnspan.style.borderRadius = "5px"
                            lnspan.style.color = "white";
                            lnspan.textContent = "SI"
                        }
                    registro.appendChild(pk);
                    registro.appendChild(lista_negra);
                    registro.appendChild(nombre_cliente)
                    registro.appendChild(apellido_cliente);
                    registro.appendChild(direccion_cliente);
                    registro.appendChild(telefono_cliente);
                break;
                case '.registro-empresa':
                    pk.textContent = jsonObj[i].rut;
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
                        nombre.textContent = jsonObj[i].razon_social;
                    let direccion_empresa = document.createElement('td');
                        direccion_empresa.classList.add('bg-td');
                        direccion_empresa.textContent = jsonObj[i].direccion
                    let telefono_empresa = document.createElement('td');
                        telefono_empresa.textContent = jsonObj[i].telefono;
                    let email_empresa = document.createElement('td');
                        email_empresa.classList.add('bg-td');
                        registro.appendChild(pk);
                        registro.appendChild(empresa_ln);
                        registro.appendChild(nombre_fantasia);
                        registro.appendChild(nombre)
                        registro.appendChild(direccion_empresa);
                        registro.appendChild(telefono_empresa);
                        registro.appendChild(consultar);
                break;
                case '.registro-reserva':
                    pk.textContent = jsonObj[i].pk;
                    let tipo_reserva = document.createElement('td');
                        lnstipo_pasajero = document.createElement('span');  
                        tipo_reserva.appendChild(lnstipo_pasajero);
                        lnstipo_pasajero.textContent = jsonObj[i].tipo;
                        if (jsonObj[i].tipo == 'PARTICULAR'){
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
                    let origen = document.createElement('td');
                        origen.textContent = jsonObj[i].origen;
                    let destino = document.createElement('td');
                        destino.classList.add('bg-td');
                        destino.textContent = jsonObj[i].destino;
                        registro.appendChild(pk);
                        registro.appendChild(tipo_reserva);
                        registro.appendChild(nombre_pasajero);
                        registro.appendChild(cedula_chofer);
                        registro.appendChild(telefono);
                        registro.appendChild(origen);
                        registro.appendChild(destino);
                        registro.appendChild(consultar)
                break;
                case '.registro-GDM':
                    pk.textContent = jsonObj[i].pk;
                    let tipo_mantenimiento = document.createElement('td');
                        tipo_mantenimiento.textContent = jsonObj[i].tipo_mantenimiento;
                    let gastos_mantenimiento = document.createElement('td');
                        gastos_mantenimiento.textContent = jsonObj[i].gastos_mantenimiento;
                        gastos_mantenimiento.classList.add('bg-td')
                    let comentarios = document.createElement('td');
                        comentarios.textContent = jsonObj[i].comentarios;
                        registro.appendChild(pk);
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