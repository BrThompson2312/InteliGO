let inicio = document.querySelector('#inicio');
let admin = document.querySelector('#administradores');
let home = document.querySelector('#home');

let opciones_hilera = document.getElementsByClassName('opciones-hilera');

let main = document.querySelector('main');

inicio.style.display = "block"

opciones_hilera[0].style.background = "linear-gradient(0deg, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5))"

admin.style.display = "none"

function opcion_menu( parametro ) {
    switch( parametro ) {
        case 'home':
            for (let i = 0; i < opciones_hilera.length; i++) {
                opciones_hilera[i].style.backgroundColor = "none";
                // opciones_hilera[i].style.backgroundColor = "#282828";
                // opciones[i].classList.add('opciones-hilera');
            }
            opciones_hilera[0].style.background = "linear-gradient(0deg, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5))"
            inicio.style.display = "block";
            admin.style.display = "none";
        break;
        case 'administradores':
            for (let i = 0; i < opciones_hilera.length; i++) {
                opciones_hilera[0].style.background = "none"
                // opciones_hilera[i].style.backgroundColor = "#282828";
                // opciones[i].classList.add('opciones-hilera');
            }
            opciones_hilera[1].style.background = "linear-gradient(0deg, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5))"
            // opciones_hilera[0].classList.add('opciones-hilera:hover');
            inicio.style.display = "none";
            admin.style.display = "block";
        break;
    }
}

// function opcion_menu( parametro ) {
//     for (let i = 0; i < opciones_hilera.length; i++) {
//         opciones_hilera[i].classList.add('opciones-hilera');
//     }
//         opciones_hilera[i].style.display = 'block';
// }

// opcion_menu();