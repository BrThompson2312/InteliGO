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
                            'Marca: ' + jsonObj[i].col6 + '\n' +
                            'Año: ' + jsonObj[i].col7
                        );
                    break;
                    case '.registro-cliente':
                        alert(
                            'Teléfono: ' + jsonObj[i].col1
                        );
                    break;
                    case '.registro-empresa':
                        alert(
                            'Teléfono: ' + jsonObj[i].col1 + '\n' +
                            'Email: ' + jsonObj[i].col2 + '\n' +
                            'Encargado de pagos: ' + '' + '\n' +
                            'Autorizado: ' + ''
                        );
                    break;
                    case '.registro-reserva':
                        alert(
                            'Origen: ' + jsonObj[i].col1 + '\n' +
                            'Destino: ' + jsonObj[i].col2 + '\n' + 
                            'Fecha del viaje: ' + jsonObj[i].col3 + '\n' +
                            'Fecha de reserva: ' + jsonObj[i].col4 + '\n' +
                            'Hora: ' + jsonObj[i].col5 + '\n' +
                            'Distancia recorrida: ' + jsonObj[i].col6 + '\n' +
                            'Comentario: ' + jsonObj[i].col7
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

            function data(parametro){
                if(parametro != '.registro-operadores'){
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
                } else {
                    col1.textContent = jsonObj[i].col1;
                    col2.textContent = jsonObj[i].col2;
                    col3.textContent = jsonObj[i].col3;
                    registro.appendChild(col1);
                    registro.appendChild(col2);
                    registro.appendChild(col3);
                }
            }

            data(parametro);
            
            registro.appendChild(consultar);
            registro.appendChild(modificar);
            registro.appendChild(eliminar);
    }
}

let opciones_hilera = document.getElementsByClassName('opciones-hilera');
for (let i = 0; i < opciones_hilera.length; i++){
    opciones_hilera[i].classList.add('opciones-hilera-activeHover');
}
opciones_hilera[0].classList.add('opciones-hilera-active');
opciones_hilera[0].classList.remove('opciones-hilera-activeHover');
function hileraRecorrido() {
    for (let i = 0; i < opciones_hilera.length; i++){
        opciones_hilera[i].classList.remove('opciones-hilera-active');
        opciones_hilera[i].classList.add('opciones-hilera-activeHover');
    }
}
let bloque = document.getElementsByClassName('bloque');
for (let i = 0; i < bloque.length; i++){
    bloque[i].style.display = "none";
}
bloque[0].style.display = "block";

function consultas(url, registro){
    $.ajax({
        url: url,
        type: 'POST',
        success: function(response){
            let block = JSON.parse(response);
            tableData(registro, block);
        }
    })
}

function llamado(rel){
    switch (rel) {
        case '#operador':
            consultas('../model/listado/listado_operadores.php', '.registro-operadores');
        break;
        case '#chofer':
            consultas('../model/listado/listado_choferes.php', '.registro-choferes');
        break;
        case '#particular':
            consultas('../model/listado/listado_particulares.php', '.registro-cliente');
        break;
        case '#empresa':
            consultas('../model/listado/listado_empresas.php', '.registro-empresa');
        break;
        case '#coches':
            consultas('../model/listado/listado_coches.php', '.registro-chofer');
        break;
        case '#reserva':
            consultas('../model/listado/listado_reservas.php', '.registro-reserva');
        break;
        case '#gastos-de-mantenimiento':
            consultas('../model/listado/listado_mantenimiento.php', '.registro-GDM');
        break;
    }
}

let rel;
function opcion_menu(ObjHtml) {
    rel = ObjHtml.getAttribute("rel");
    for (let i = 0; i < opciones_hilera.length; i++){
        if(opciones_hilera[i].getAttribute('rel')==rel) {
            opciones_hilera[i].classList.add('opciones-hilera-active');
            opciones_hilera[i].classList.remove('opciones-hilera-activeHover');
        } else {
            opciones_hilera[i].classList.remove('opciones-hilera-active');
            opciones_hilera[i].classList.add('opciones-hilera-activeHover');
        }
    }
    navbar();
    bloque[0].style.display = "block";
    for (let i = 0; i < bloque.length; i++){
        bloque[i].style.display = "none";
    }
    let block = document.querySelector(rel);
        if(rel == '#acercaDe'){
            block.style.display = "flex";
        } else {
            block.style.display = "block";
        }
        
    
    llamado(rel);
}

function ventanaSeccion(conteiner_section, BRS, closeWindow){
    $(conteiner_section).css('display','none');
    $(BRS).css('display','flex');
    $(closeWindow).on('click',function(event){
        event.preventDefault();
        $(conteiner_section).css('display','block');
        $(BRS).css('display','none');
        llamado(rel);
    });
    navbar();
}

$('#logout').on('click',function(){
   $('#alert-salir').css('display','grid')
})

$('#xmark-salir').on('click',function(){
    $('#alert-salir').css('display','none');
});

let nav = document.querySelector('nav');
    nav.style.left = '-200%';

var button_hilera = document.querySelector('.navbar_hilera');
    button_hilera.onclick = function(){   
        navbar();
    }
function nav_block(){
    if (nav.style.left === '-200%'){
        nav.style.left = '0%';
        nav.style.animation = 'ani_nav 0.5s ease';
    }
}
function navbar(){
    if (nav.style.left === '0%'){
        nav.style.animation = 'desani_nav 0.5s ease';
        nav.style.left = '-200%';
    }
}