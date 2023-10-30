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

let rutaConsulta = '../../model/read/read_';
function llamado(rel){
    switch (rel) {
        case '#operador':
            consultas(`${rutaConsulta}operador.php`, '.registro-operadores');
        break;
        case '#chofer':
            consultas(`${rutaConsulta}chofer.php`, '.registro-choferes');
        break;
        case '#coche':
            consultas(`${rutaConsulta}coche.php`, '.registro-coches');
        break;
        case '#asignacion':
            consultas(`${rutaConsulta}asignacion.php`, '.registro-asignacion');
        break;
        case '#particular':
            consultas(`${rutaConsulta}particular.php`, '.registro-cliente');
        break;
        case '#empresa':
            consultas(`${rutaConsulta}empresa.php`, '.registro-empresa');
        break;
        case '#reserva':
            consultas(`${rutaConsulta}reserva.php`, '.registro-reserva');
        break;
        case '#gastos-de-mantenimiento':
            consultas(`${rutaConsulta}mantenimiento.php`, '.registro-GDM');
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

function labelInput(windowOpened){
    let label = document.querySelectorAll(`${windowOpened} label`);
    let input = document.querySelectorAll(`${windowOpened} input`);
    let select = document.querySelectorAll(`${windowOpened} select`);
    let textarea = document.querySelectorAll(`${windowOpened} textarea`);

    for (let i = 0; i < label.length; i++){
        label[i].style.display = "block";
    }
    for (let i = 0; i < input.length; i++){
        input[i].style.display = "block";
    }
    for (let i = 0; i < select.length; i++){
        select[i].style.display = "block";
    }
    for (let i = 0; i < textarea.length; i++){
        textarea[i].style.display = "block";
    }
}

function ventanaSeccion(containerSection, windowOpened, mode){
    document.querySelector(containerSection).style.display = 'none';
    document.querySelector(windowOpened).style.display = 'flex';

    let modificar_datos = document.querySelector(`${windowOpened} .modificar_datos`);
    let subir_datos     = document.querySelector(`${windowOpened} .subir_datos`);

    switch(mode) {
        case 'subir':
            modificar_datos.style.display = "none";
            subir_datos.style.display = "block";
            labelInput(windowOpened);
        break;

        case 'modificar':
            modificar_datos.style.display = "block";
            subir_datos.style.display = "none";
        break;
    }
    
    let wop = document.querySelector(windowOpened);
    wop.querySelector('.cancel_button').onclick = function() {
        document.querySelector(containerSection).style.display = 'block';
        document.querySelector(windowOpened).style.display = 'none';
        llamado(rel);
        wop.querySelector('.alert_section').reset();
    }
    navbar();
}

// Popup de confirmación de salida
    $('#logout').on('click',function(){
        $('#alert-salir').css('display','grid')
    })
    $('#xmark-salir').on('click',function(){
        $('#alert-salir').css('display','none');
    });


let nav = document.querySelector('nav');
    nav.style.left = '-200%';
let button_hilera = document.querySelector('.navbar_hilera');
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