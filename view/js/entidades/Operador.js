export class Operador {
    constructor() {
        this.cedula = $name('ci-operador')
        this.nombre = $name('nombre-operador')
        this.pass = $name('contrasena-operador')
    }
    condicion() {
        return this.cedula !== '' && this.nombre !== '' && this.pass !== '';
    }
}