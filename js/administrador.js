let inicio = document.querySelector('#inicio');
let home = document.querySelector('#home');
let admin = document.querySelector('#administradores');

let main = document.querySelector('main');

inicio.style.display = "none"

function opcion_menu( parametro ) {
    switch(parametro) {
        case 'home':
            inicio.style.display = "unset";
            admin.style.display = "none";
        break;
        case 'administradores':
            inicio.style.display = "none";
            admin.style.display = "unset";
        break;
    }
}