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
let alert_success       = document.querySelector('#alert-add');

export let rut_conexion = '../../model/add/add_';

export function alertSuccess(message) {
    alert_success.style.display = "block";
    switch(message){
        case 'success':
            alert_success.classList.remove('alert-warning');
            alert_success.classList.remove('alert-info');
            alert_success.classList.remove('alert-danger');
            alert_success.classList.add('alert-success');
            alert_success.innerHTML = '<i style="margin-right: 12px;" class="fa fa-info fa-1x"></i> Campos ingresados correctamente';
            break;
        case 'incompleted':
            alert_success.classList.remove('alert-success');
            alert_success.classList.remove('alert-warning');
            alert_success.classList.remove('alert-danger');
            alert_success.classList.add('alert-info');
            alert_success.innerHTML = '<i style="margin-right: 12px;" class="fa fa-info fa-1x"></i> Campos incompletos';
            break;
        case 'warning':
            alert_success.classList.remove('alert-success');
            alert_success.classList.remove('alert-danger');
            alert_success.classList.remove('alert-info');
            alert_success.classList.add('alert-warning');
            alert_success.innerHTML = '<i style="margin-right: 12px;" class="fa fa-info fa-1x"></i> Campos erroneos';
            break;
        case 'error':
            alert_success.classList.remove('alert-success');
            alert_success.classList.remove('alert-warning');
            alert_success.classList.remove('alert-info');
            alert_success.classList.add('alert-danger');
            alert_success.innerHTML = `<i style="margin-right: 12px;" class="fa fa-info fa-1x"></i> Error al ingresar datos`;
            break;
    }
    alert_success.style.animation = "alert 0.5s ease";
    alert_success.addEventListener("animationend",function(){
        setTimeout(function () {
            alert_success.style.animation = "des_alert 0.5s ease";
            setTimeout(function () {
                alert_success.style.display = "none";
            }, 500);
        }, 500);
    })
}

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