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
function opcion_menu(ObjHtml) {
    let rel = ObjHtml.getAttribute("rel");
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
        block.style.display = "block";
    switch (rel) {
        case '#operador':
            $.ajax({
                url: '../model/listado/listado_operadores.php',
                type: 'POST',
                success: function(response){
                    let operadores = JSON.parse(response);
                    tableData('.registro-operadores', operadores);
                }
            })
        break;
        case '#chofer':
            $.ajax({
                url: '../model/listado/listado_choferes.php',
                type: 'POST',
                success: function(response){
                    let choferes = JSON.parse(response);
                    tableData('.registro-choferes', choferes);
                }
            })
        break;
        case '#particular':
            $.ajax({
                url: '../model/listado/listado_particulares.php',
                type: 'POST',
                success: function(response){
                    let clientes = JSON.parse(response);
                    tableData('.registro-cliente', clientes);
                }
            })
        break;
        case '#empresa':
            $.ajax({
                url: '../model/listado/listado_empresas.php',
                type: 'POST',
                success: function(response){
                    let empresas = JSON.parse(response);
                    tableData('.registro-empresa', empresas);
                }
            })
        break;
        case '#coches':
            $.ajax({
                url: '../model/listado/listado_coches.php',
                type: 'POST',
                success: function(response){
                    let coches = JSON.parse(response);
                    tableData('.registro-coches', coches);
                }
            })
        break;
        case '#lista-negra':
            $.ajax({
                url: '../model/listado/listado_listaln.php',
                type: 'POST',
                success: function(response){
                    let lista_negra = JSON.parse(response);
                    tableData('.registro-LN', lista_negra);
                }
            })
        break;
        case '#reserva':
            $.ajax({
                url: '../model/listado/listado_reservas.php',
                type: 'POST',
                success: function(response){
                    let reservas = JSON.parse(response);
                    tableData('.registro-reserva', reservas);
                }
            })
        break;
        case '#gastos-de-mantenimiento':
            $.ajax({
                url: '../model/listado/listado_mantenimiento.php',
                type: 'POST',
                success: function(response){
                    let gastos_mantenimiento = JSON.parse(response);
                    tableData('.registro-GDM', gastos_mantenimiento);
                }
            })
        break;
    }
}
function ventanaSeccion(conteiner_section, BRS, closeWindow){
    $(conteiner_section).css('display','none');
    $(BRS).css('display','flex');
    $(closeWindow).on('click',function(){
        $(conteiner_section).css('display','block');
        $(BRS).css('display','none');
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
    nav.style.left = '0%';

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