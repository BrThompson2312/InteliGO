export let reserva = {};

let data = document.querySelectorAll('#reserva .ex-filt');
for (let i = 0; i < ex_filt.length; i++) {
    ex_filt[i].addEventListener('input', function(){
        reserva.cliente         = data[0].value;
        reserva.nombre          = data[1].value;
        reserva.origen          = data[2].value;
        reserva.destino         = data[3].value;
        reserva.chofer          = data[4].value;
        reserva.cedulaChofer    = data[5].value;
        reserva.apellido        = data[6].value;
        reserva.fechaReserva    = data[7].value;
        reserva.horaReserva     = data[8].value;
        reserva.fechaServicio   = data[9].value;
        reserva.horaServicio    = data[10].value;
        reserva.comentario      = data[11].value;
        reserva.monto           = data[12].value;
        reserva.formaPago       = data[13].value;
        reserva.codServicio     = data[14].value;
    })
}