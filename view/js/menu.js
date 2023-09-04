let opciones_hilera = document.getElementsByClassName('opciones-hilera');

    for (i = 0; i < opciones_hilera.length; i++){
        opciones_hilera[i].classList.add('opciones-hilera-activeHover');
    }

    opciones_hilera[0].classList.add('opciones-hilera-active');
    opciones_hilera[0].classList.remove('opciones-hilera-activeHover');

    function hileraRecorrido() {
        for (i = 0; i < opciones_hilera.length; i++){
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
    for (i = 0; i < opciones_hilera.length; i++){
        if(opciones_hilera[i].getAttribute('rel')==rel) {
            opciones_hilera[i].classList.add('opciones-hilera-active');
            opciones_hilera[i].classList.remove('opciones-hilera-activeHover');
        } else {
            opciones_hilera[i].classList.remove('opciones-hilera-active');
            opciones_hilera[i].classList.add('opciones-hilera-activeHover');
        }
    }

    bloque[0].style.display = "block";
    for (let i = 0; i < bloque.length; i++){
        bloque[i].style.display = "none";
    }
    let block = document.querySelector(rel);
        block.style.display = "block";

    switch (rel) {
        case '#operador':
            $.ajax({
                url: 'controller/listado/listado_operadores.php',
                type: 'POST',
                success: function(response){
                    let administradores = JSON.parse(response);
                    tableData('.registro-administradores', administradores);
                }
            })
        break;
        case '#eliminados':
        break;
        case '#coches':
            $.ajax({
                url: 'controller/listado/listado_coches.php',
                type: 'POST',
                success: function(response){
                    let coches = JSON.parse(response);
                    tableData('.registro-coches', coches);
                }
            })
        break;
        case '#chofer':
            $.ajax({
                url: 'controller/listado/listado_choferes.php',
                type: 'POST',
                success: function(response){
                    let choferes = JSON.parse(response);
                    tableData('.registro-chofer', choferes);
                }
            })
        break;
        case '#lista-negra':
            $.ajax({
                url: 'controller/listado/listado_listaLN.php',
                type: 'POST',
                success: function(response){
                    let lista_negra = JSON.parse(response);
                    tableData('.registro-LN', lista_negra);
                }
            })
        break;
        case '#particular':
            $.ajax({
                url: 'controller/listado/listado_particulares.php',
                type: 'POST',
                success: function(response){
                    let clientes = JSON.parse(response);
                    tableData('.registro-cliente', clientes);
                }
            })
        break;
        case '#empresa':
            $.ajax({
                url: 'controller/listado/listado_empresas.php',
                type: 'POST',
                success: function(response){
                    let empresas = JSON.parse(response);
                    tableData('.registro-empresa', empresas);
                }
            })
        break;
        case '#reserva':
            $.ajax({
                url: 'controller/listado/listado_reservas.php',
                type: 'POST',
                success: function(response){
                    let reservas = JSON.parse(response);
                    tableData('.registro-reserva', reservas);
                }
            })
        break;
        case '#gastos-de-mantenimiento':
            $.ajax({
                url: 'controller/listado/listado_mantenimiento.php',
                type: 'POST',
                success: function(response){
                    let gastos_mantenimiento = JSON.parse(response);
                    tableData('.registro-GDM', gastos_mantenimiento);
                }
            })
        break;
    }
}

function ventanaSeccion(conteinerSection, BRS, closeWindow){
    $(conteinerSection).css('display','none');
    $(BRS).css('display','flex');
    $(closeWindow).css('display','block');
    $(closeWindow).on('click',function(){
        $(conteinerSection).css('display','block');
        $(BRS).css('display','none');
        $(closeWindow).css('display','none');
    })
}

$('#logout').on('click',function(){
   $('#alert-salir').css('display','grid')
})

$('#xmark-salir').on('click',function(){
    $('#alert-salir').css('display','none');
});

