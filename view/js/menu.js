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

bloque[0].style.display = "none";
bloque[1].style.display = "block";

function opcion_menu( ObjHtml ) {
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
}

function probandoAgr(conteinerSection, BRS, closeWindow){
    alert(conteinerSection);
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