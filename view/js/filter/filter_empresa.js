export let empresa = {}
for (let i = 0; i < ex_filt.length; i++){
    ex_filt[i].addEventListener('input', function(){
        let data = document.querySelectorAll('#empresa .ex-filt');
        empresa.cliente = data[0].value;
        empresa.rut = data[1].value;
        empresa.nombre = data[2].value;
        empresa.correo = data[3].value;
        empresa.direccion = data[4].value;
        empresa.razonsocial = data[5].value;
        empresa.encargado = data[6].value;
        empresa.autorizado = data[7].value;
        empresa.telefono = data[8].value;
    })
}