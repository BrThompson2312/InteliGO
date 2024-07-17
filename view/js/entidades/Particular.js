export class Particular {
    constructor() {
        this.telefono = $name('tel-particular')
        this.nombre = $name('nombre-particular')
        this.apellido = $name('apellido-particular')
        this.direccion = $name('direccion-particular')
    }
    condicion() {
        return this.telefono == '' || this.nombre == '' || this.apellido == '' || this.direccion == ''
    }
}