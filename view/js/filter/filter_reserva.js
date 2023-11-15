export let reserva = {};
for (let i = 0; i < ex_filt.length; i++) {
    ex_filt[i].addEventListener('input', function(){
        let data = document.querySelectorAll('#reserva .ex-filt');
        reserva.cliente = data[0].value;
        reserva.nombre = data[1].value;
        reserva.apellido = data[2].value;
        reserva.origen = data[3].value;
        reserva.destino = data[4].value;
        reserva.chofer = data[5].value;
        reserva.cedulaChofer = data[6].value;
        reserva.fechaReserva = data[7].value;
        reserva.horaReserva = data[8].value;
        reserva.fechaServicio = data[9].value;
        reserva.horaServicio = data[10].value;
        reserva.comentario = data[11].value;
        reserva.monto = data[12].value;
        reserva.codServicio = data[13].value;
    })
}