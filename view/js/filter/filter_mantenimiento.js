export let mantenimiento = {}
for (let i = 0; i < ex_filt.length; i++){
    ex_filt[i].addEventListener('input', function(){
        let data = document.querySelectorAll('#gastos-de-mantenimiento .ex-filt');
        mantenimiento.codigo = data[0].value;
        mantenimiento.matricula = data[1].value;
        mantenimiento.concepto = data[2].value;
        mantenimiento.comentario = data[3].value;
        mantenimiento.importe = data[4].value;
        mantenimiento.taller = data[5].value;
        mantenimiento.fecha = data[6].value;
    })
}