export let chofer = {}

let data = document.querySelectorAll('#chofer .ex-filt');
for (let i = 0; i < ex_filt.length; i++) {
    ex_filt[i].addEventListener('input', function(){
        chofer.telefono = data[0].value;
        chofer.nombre   = data[1].value;
        chofer.apellido = data[2].value,
        chofer.cedula   = data[3].value;
    })
}