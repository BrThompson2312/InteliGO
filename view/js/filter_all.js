import {operador}       from './filter/flt_operador.js';
import {chofer}         from './filter/flt_chofer.js';
import {coche}          from './filter/flt_coche.js';
import {asignacion}     from './filter/flt_asignacion.js';
import {particular}     from './filter/flt_particular.js';
import {empresa}        from './filter/flt_empresa.js';
import {reserva}        from './filter/flt_reserva.js';
import {mantenimiento}  from './filter/flt_mantenimiento.js';

function filter_blocks(route, obj, register) {
    for (let i = 0; i < ex_filt.length; i++) {
        ex_filt[i].addEventListener('input', function(){
            fetch(`model/filter/${route}`, { method: 'POST', body: JSON.stringify(obj) })
            .then(res => res.json())
            .then(res => tableData(register, res))
            .catch(rej => alert("No hay conexión"))
        });
    }
}

let btn_filter = document.querySelectorAll('.inputs-busqueda .filtrar');
for (let i = 0; i < btn_filter.length; i++){
    btn_filter[i].textContent = 'BUSCADOR';
}

function filter_appear(block) {
    let alert_filtrar = document.querySelector(`${block} .alert-filtrar`);
    let btn_filter = document.querySelector(`${block} .inputs-busqueda .filtrar`);
        if (alert_filtrar.style.display == 'none') {
            alert_filtrar.style.display = 'flex';
            switch(block){
                case '#operador':
                    filter_blocks('filter_operador.php', operador, '.registro-operadores'); break;
                
                case '#chofer':
                    filter_blocks('filter_chofer.php', chofer, '.registro-choferes'); break;

                case '#coche':
                    filter_blocks('filter_coche.php', coche, '.registro-coches'); break;

                case '#asignacion':
                    filter_blocks('filter_asignacion.php', asignacion, '.registro-asignacion'); break;
                
                case '#particular':
                    filter_blocks('filter_particular.php', particular, '.registro-cliente'); break;

                case '#empresa':
                    filter_blocks('filter_empresa.php', empresa, '.registro-empresa'); break;

                case '#reserva':
                    filter_blocks('filter_reserva.php', reserva, '.registro-reserva'); break;

                case '#gastos-de-mantenimiento':
                    filter_blocks('filter_mantenimiento.php', mantenimiento, '.registro-GDM'); break;
            }

            btn_filter.innerHTML = 'CERRAR BUSCADOR';

        } else {
            alert_filtrar.style.display = 'none';
            btn_filter.innerHTML = 'BUSCADOR';
            for (let i = 0; i < ex_filt.length; i++){
                ex_filt[i].value = '';
            }
        }
}

function btn_filter_block(block) {
    if( document.querySelector(`${block}`)==null) return;
    let btn_filter = document.querySelector(`${block} .inputs-busqueda .filtrar`);
        btn_filter.onclick = function() {
            filter_appear(`${block}`);
        }
}

btn_filter_block('#operador');
btn_filter_block('#chofer');
btn_filter_block('#coche');
btn_filter_block('#asignacion');
btn_filter_block('#particular');
btn_filter_block('#empresa');
btn_filter_block('#reserva');
btn_filter_block('#gastos-de-mantenimiento');