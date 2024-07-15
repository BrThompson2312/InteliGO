export let asignacion = {}
for (let i = 0; i < ex_filt.length; i++){
    ex_filt[i].addEventListener('input', function(){
        let data = document.querySelectorAll('#asignacion .ex-filt');
        asignacion.cedula = data[0].value;
        asignacion.chofer = data[1].value;
        asignacion.coche = data[2].value;
    })
}