export let coche = {}
for (let i = 0; i < ex_filt.length; i++){
    ex_filt[i].addEventListener('input', function(){
        let data = document.querySelectorAll('#coche .ex-filt');
        coche.matricula = data[0].value;
        coche.marca = data[1].value;
        coche.modelo = data[2].value;
        coche.año = data[3].value;
    })
}