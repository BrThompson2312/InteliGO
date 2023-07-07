let opciones_hilera = document.getElementsByClassName('opciones-hilera');
    opciones_hilera[0].classList.add('opciones-hileraActive');

let main = document.querySelector('main');
    let inicio = document.querySelector('#inicio');
        inicio.style.display = "block";

    let admin = document.querySelector('#administradores');
    let home = document.querySelector('#home');

admin.style.display = "none";

function opcion_menu( parametro ) {
    function classFor() {
    }
    switch( parametro ) {
        case 'home':
            inicio.style.display = "block";
            admin.style.display = "none";
        break;
        case 'administradores':
            opciones_hilera[0].classList.remove('opciones-hileraActive');
            inicio.style.display = "none";
            admin.style.display = "block";
        break;
    }
}