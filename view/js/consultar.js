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
        case '#particular':
            consultas(`${rutaConsulta}particular.php`, '.registro-cliente');
        break;
        case '#empresa':
            consultas(`${rutaConsulta}empresa.php`, '.registro-empresa');
        break;
        case '#reserva':
            consultas(`${rutaConsulta}empresa.php`, '.registro-reserva');
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

function ventanaSeccion(containerSection, windowOpened){
    document.querySelector(containerSection).style.display = 'none';
    document.querySelector(windowOpened).style.display = 'flex';
    let wop = document.querySelector(windowOpened);
    wop.querySelector('.cancel_button').onclick = function() {
        document.querySelector(containerSection).style.display = 'block';
        document.querySelector(windowOpened).style.display = 'none';
        llamado(rel);
        wop.querySelector('.alert_section').reset();
    }
    navbar();
}

// function ventanaSeccionEliminados(openWindowDelete, objDeleter) {
//     consultas(`../../model/read_deleted/deleted_operador.php`, openWindowDelete);
//     let dd = objDeleter.innerHTML = 'VOLVER';
//     objDeleter.classList.add('back');
//     disappearObjects();
//     console.log(dd);
// }

// function disappearObjects() {
//     document.querySelector('.inputs-busqueda .filtrar').style.display = 'none';
//     document.querySelector('.inputs-busqueda .agregar').style.display = 'none';
// }

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