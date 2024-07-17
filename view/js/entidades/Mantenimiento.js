export class Mantenimiento {
    constructor() {
        this.codigo = $name('codigo-gdm')
        this.matricula = $name('matricula-gdm')
        this.concepto = $name('concepto-gdm')
        this.importe = $name('importe-gdm')
        this.taller = $name('taller-gdm')
        this.comentario = $name('comentario-gdm')
    }
    condicion() {
        return this.codigo !== '' && this.matricula !== '' && this.concepto !== '' && this.importe !== '' && this.taller !== ''&& this.comentario !== '';
    }
}