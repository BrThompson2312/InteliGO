class Asignacion {
    constructor() {
        this.cedula = $name('ci-asignacion')
        this.matricula = $name('matricula-asignacion')
    }
    condicion() {
        return this.cedula == '' || this.matricula == ''
    }
}