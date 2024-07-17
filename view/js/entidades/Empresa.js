export class Empresa {
    constructor() {
        this.rut = $name('rut-empresa')
        this.razonsocial = $name('razonsocial-empresa')
        this.fantasia = $name('fantasia-empresa')
        this.listanegra = $name('listanegra-empresa')
        this.direccion = $name('direccion-empresa')
        this.telefono = $name('tel-empresa')
        this.correo = $name('correo-empresa')
        this.encargado = $name('encargado-empresa')
        this.autorizado = $name('autorizado-empresa')
    }
    condicion(){
        return this.rut == '' || this.razonsocial == '' || this.fantasia == '' || this.listanegra == '' || this.direccion == '' || this.telefono == '' || this.correo == '' || this.encargado == '' || this.autorizado == ''
    }
}