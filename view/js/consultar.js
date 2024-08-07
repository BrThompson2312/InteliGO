let optsColumna = document.querySelectorAll('.opciones-hilera');

let bloque = document.querySelectorAll('.bloque');

function consultas(url, registro){
    fetch(`model/read/read_${url}`, { method: "POST" })
    .then(res => res.json())
    .then(res => tableData(registro, res))
}

function llamado(rel){
    switch (rel) {
        case '#operador':
            consultas(`operador.php`, '.registro-operadores'); break;
        case '#chofer':
            consultas(`chofer.php`, '.registro-choferes'); break;
        case '#coche':
            consultas(`coche.php`, '.registro-coches'); break;
        case '#asignacion':
            consultas(`asignacion.php`, '.registro-asignacion'); break;
        case '#particular':
            consultas(`particular.php`, '.registro-cliente'); break;
        case '#empresa':
            consultas(`empresa.php`, '.registro-empresa'); break;
        case '#reserva':
            consultas(`reserva.php`, '.registro-reserva'); break;
        case '#gastos-de-mantenimiento':
            consultas(`mantenimiento.php`, '.registro-GDM'); break;
    }
}

let rel;
function opcion_menu(ObjHtml) {
    
    rel = ObjHtml.getAttribute("rel");

    optsColumna.forEach(col => {
        if (col.getAttribute('rel') == rel) {
            col.style.backgroundColor = "red";
        } else {
            col.style.backgroundColor = "black";
        }
    })

    bloque.forEach(blq => blq.style.display = "none")
    
    let block = document.querySelector(rel);
    if (rel == '#acercaDe') block.style.display = "flex"; else block.style.display = "block";
    
    llamado(rel);
    navbar();
}

function disappearBlq(elements) {
    elements.forEach(blq => blq.style.display = "block")
}
function labelInput(windowOpened){
    let $all = container => document.querySelectorAll(`${windowOpened} ${container}`)

    disappearBlq($all("label"))
    disappearBlq($all("input"))
    disappearBlq($all("select"))
    disappearBlq($all("textarea"))
}

function ventanaSeccion(containerSection, windowOpened, mode){
    document.querySelector(containerSection).style.display = 'none';
    document.querySelector(windowOpened).style.display = 'flex';
    let modificar_datos = document.querySelector(`${windowOpened} .modificar_datos`);
    let subir_datos = document.querySelector(`${windowOpened} .subir_datos`);
    switch(mode) {
        case 'subir':
            modificar_datos.style.display = "none";
            subir_datos.style.display = "block";
            labelInput(windowOpened);
            data_matricula('#matricula-asignacion');
            data_matricula('#matricula-gdm');
            data_codCliente('#cliente-reserva');
            data_cedula('#ci-asignacion');
            data_cedula('#chofer-realizan');
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

let alertSalir = document.querySelector("#alert-salir")
document.querySelector("#logout").onclick = function() {
    alertSalir.style.display = "grid";
}
document.querySelector("#xmark-salir").onclick = function() {
    alertSalir.style.display = "none";
}

let nav = document.querySelector('nav');
    nav.style.left = '-200%';
    
let button_hilera = document.querySelector('.navbar_hilera');
    button_hilera.onclick = () => navbar()

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