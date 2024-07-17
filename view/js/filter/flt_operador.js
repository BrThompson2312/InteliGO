export let operador = {}

let data = document.querySelectorAll('#operador .ex-filt');
for (let i = 0; i < ex_filt.length; i++){
    ex_filt[i].addEventListener('input', function(){
        operador.cedula     = data[0].value;
        operador.nombre     = data[1].value;
        operador.fechaing   = data[2].value;
    })
}


