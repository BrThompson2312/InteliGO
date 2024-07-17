import {Operador}           from './entidades/Operador.js';
import {Chofer}             from './entidades/Chofer.js';
import {Coche}              from './entidades/Coche.js';
import {Asignacion}         from './entidades/Asignacion.js';
import {Particular}         from './entidades/Particular.js';
import {Empresa}            from './entidades/Empresa.js';
import {Reserva}            from './entidades/Reserva.js';
import {Mantenimiento}      from './entidades/Mantenimiento.js';

let cont_operador = $('.BRS-operador');
let cont_chofer = $('.BRS-choferes');
let cont_coche = $('.BRS-coches');
let cont_asignacion = $('.BRS-asignacion');
let cont_particular = $('.BRS-cliente');
let cont_empresa = $('.BRS-empresa');
let cont_reserva = $('.BRS-reserva');
let cont_mantenimiento = $('.BRS-GDM');

function upData(block) {
    return block.querySelector(".subir_datos")
}

function resetForm(block) {
    return block.querySelector(".alert_section").reset()
}

if(upData(cont_operador) != null ) {
    upData(cont_operador).onclick = function() {
        let obj = new Operador()
        addEntity(obj.condicion(), 'add_operador.php', obj)
        resetForm(cont_operador)
    };
}

cont_chofer.onclick = function(){
    let obj = new Chofer()
    addEntity(obj.condicion(), 'add_chofer.php', obj)
    resetForm(cont_chofer)
}

cont_coche.onclick = function(){
    let obj = new Coche()
    addEntity(obj.condicion(), 'add_coche.php', obj)
    resetForm(cont_coche)
}

cont_asignacion.onclick = function(){
    let obj = new Asignacion()
    addEntity(obj.condicion(), 'add_asignacion.php', obj)
    resetForm(cont_asignacion)
}

cont_particular.onclick = function(){
    let obj = new Particular()
    addEntity(obj.condicion(), 'add_particular.php', obj)
    resetForm(cont_particular)
}

cont_empresa.onclick = function(){
    let obj = new Empresa()
    addEntity(obj.condicion(), 'add_empresa.php', obj)
    resetForm(cont_empresa)
}

cont_reserva.onclick = function(){
    let obj = new Reserva()
    addEntity(obj.condicion(), 'add_reserva.php', obj)
    resetForm(cont_reserva)
}

cont_mantenimiento.onclick = function(){
    let obj = new Mantenimiento()
    addEntity(obj.condicion(), 'add_mantenimiento.php', obj)
    resetForm(cont_mantenimiento)
}

function addEntity(condicion, archivo, obj) {
    if (condicion){
        fetch(`./model/add/${archivo}`, { method: 'POST', body: JSON.stringify(obj) })
        .then(res => res.json())
        .then(res => alertSuccess('success'))
        .catch(rej => alertSuccess('error'))
    } else {
        console.log(condicion)
        alertSuccess('warning');
    }
}