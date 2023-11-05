import {add_operador}       from './add/add_operador.js';
import {add_chofer}         from './add/add_chofer.js';
import {add_coche}          from './add/add_coche.js';
import {add_asignacion}     from './add/add_asignacion.js';
import {add_particular}     from './add/add_particular.js';
import {add_empresa}        from './add/add_empresa.js';
import {add_reserva}        from './add/add_reserva.js';
import {add_mantenimiento}  from './add/add_mantenimiento.js';

let cont_operador       = document.querySelector('.BRS-operador .subir_datos');
let cont_chofer         = document.querySelector('.BRS-choferes .subir_datos');
let cont_coche          = document.querySelector('.BRS-coches .subir_datos');
let cont_asignacion     = document.querySelector('.BRS-asignacion .subir_datos');
let cont_particular     = document.querySelector('.BRS-cliente .subir_datos');
let cont_empresa        = document.querySelector('.BRS-empresa .subir_datos');
let cont_reserva        = document.querySelector('.BRS-reserva .subir_datos');
let cont_mantenimiento  = document.querySelector('.BRS-GDM .subir_datos');

if( cont_operador!=null) {
    cont_operador.addEventListener('click', function(){
        add_operador('.BRS-operador');
    });
}

cont_chofer.onclick = function(){
    add_chofer('.BRS-choferes');
}

cont_coche.onclick = function(){
    add_coche('.BRS-coches');
}

cont_asignacion.onclick = function(){
    add_asignacion('.BRS-asignacion');
}

cont_particular.onclick = function(){
    add_particular('.BRS-cliente');
}

cont_empresa.onclick = function(){
    add_empresa('.BRS-empresa');
}

cont_reserva.onclick = function(){
    add_reserva('.BRS-reserva');
}

cont_mantenimiento.onclick = function(){
    add_mantenimiento('.BRS-GDM');
}