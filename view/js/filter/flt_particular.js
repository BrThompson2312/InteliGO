export let particular = {}

let data = document.querySelectorAll('#particular .ex-filt');
for (let i = 0; i < ex_filt.length; i++){
    ex_filt[i].addEventListener('input', function(){
        particular.cliente      = data[0].value,
        particular.telefono     = data[1].value,
        particular.nombre       = data[2].value,
        particular.apellido     = data[3].value,
        particular.direccion    = data[4].value
        particular.listanegra   = data[5].value
    })
}