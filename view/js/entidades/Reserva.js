class Reserva {
    constructor() {
        this.origen = $name('origen-servicio')
        this.destino = $name('destino-servicio')
        this.fecha = $name('fecha-servicio')
        this.hora = $name('hora-servicio')
        this.comentario = $name('comentario-servicio')
        this.nombre = $name('nombre-servicio')
        this.apellido = $name('apellido-servicio')
        this.formaPago = $name('forma-de-pago')
        this.monto = $name('monto-servicio')
        this.chofer = $name('chofer-realizan')
        this.cliente = $name('cliente-reserva')
    }
    condicion() {
        return this.origen == '' || this.destino == '' || this.fecha == '' || this.hora == '' || this.comentario == '' || this.nombre == '' || this.apellido == '' || this.formaPago == '' || this.monto == '' || this.chofer == '' || this.cliente == '';
    }
}