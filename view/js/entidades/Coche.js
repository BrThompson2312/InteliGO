export class Coche {
    constructor() {
        this.matricula = $name('matricula-coche')
        this.marca = $name('marca-coche')
        this.modelo = $name('modelo-coche')
        this.año = $name('año-coche')
    }
    condicion() {
        return this.matricula == '' || this.marca == '' || this.modelo == ''|| this.año == '';
    }
}