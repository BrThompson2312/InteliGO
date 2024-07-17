export class Chofer {
    constructor() {
        this.telefono = $name("tel-chofer")
        this.nombre = $name('nombre-chofer')
        this.apellido = $name('apellido-chofer')
        this.cedula = $name('ci-chofer')
    }
    condicion() {
        return this.telefono == '' || this.nombre == '' || this.apellido == '' || this.cedula == '';   
    }
}