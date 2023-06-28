let inicio = document.querySelector('#inicio');
let admin = document.querySelector('#administradores');
let home = document.querySelector('#home');

let opciones_hilera = document.getElementsByClassName('opciones-hilera');

let main = document.querySelector('main');

inicio.style.display = "block"
opciones_hilera[0].style.backgroundColor = "#427C7C";

admin.style.display = "none"

function opcion_menu( parametro ) {
    switch( parametro ) {
        case 'home':
            for (let i = 0; i < opciones_hilera.length; i++) {
                opciones_hilera[i].style.backgroundColor = "none";
            }
            opciones_hilera[0].style.backgroundColor = "#427C7C";
            inicio.style.display = "block";
            admin.style.display = "none";
        break;
        case 'administradores':
            for (let i = 0; i < opciones_hilera.length; i++) {
                opciones_hilera[i].style.backgroundColor = "none";
            }
            opciones_hilera[1].style.backgroundColor = "#427C7C";
            inicio.style.display = "none";
            admin.style.display = "block";
        break;
    }
}

// function opcion_menu( parametro ) {
//     for (let i = 0; i < opciones_hilera.length; i++) {
//         opciones_hilera[i].style.backgroundColor = "none";
//     }
//         opciones_hilera[0].style.backgroundColor = "#427C7C";
//         inicio.style.display = "block";
//         admin.style.display = "none";
// }

// opcion_menu();