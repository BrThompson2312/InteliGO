<!-- Inicio RESERVA -->
<section class="bloque" id="reserva">
    <div class="conteiner-section conteiner-reserva">
        <div class="titulo-section">
            <i class="fa-solid fa-bars navbar_block" onclick="nav_block()"></i>
            <i class="fa-solid fa-calendar-days navbar_icon"></i>
            <h2>RESERVAS</h2>
        </div>
        <div class="alert-filtrar">
            <div class="filter-block">
                <div>
                    <label>Cliente</label>
                    <input class="ex-filt" type="number">
                </div>
                <div>
                    <label>Nombre pasajero</label>
                    <input class="ex-filt" type="text">
                </div>
                <div>
                    <label>Origen</label>
                    <input class="ex-filt" type="text">
                </div>
                <div>
                    <label>Destino</label>
                    <input class="ex-filt" type="text">
                </div>
                <div>
                    <label>Chofer</label>
                    <input class="ex-filt" type="text">
                </div>
                <div>
                    <label>Cedula Chofer</label>
                    <input class="ex-filt" type="number">
                </div>
                <div>
                    <label>Apellido pasajero</label>
                    <input class="ex-filt" type="text">
                </div>
                <div>
                    <label>Fecha de reserva</label>
                    <input class="ex-filt" type="text">
                </div>
                <div>
                    <label>Hora de reserva</label>
                    <input class="ex-filt" type="number">
                </div>
                <div>
                    <label>Fecha de servicio</label>
                    <input class="ex-filt" type="text">
                </div>
                <div>
                    <label>Hora de servicio</label>
                    <input class="ex-filt" type="number">
                </div>
                <div>
                    <label>Comentario</label>
                    <input class="ex-filt" type="text">
                </div>
                <div>
                    <label>Forma_de_pago</label>
                    <select class="ex-filt">
                        <option value="">Mostrar Todos</option>
                        <option value="contado">Contado</option>
                        <option value="tarjeta">Debito</option>
                        <option value="credito">Crédito</option>
                    </select>
                </div>
                <div>
                    <label>Monto</label>
                    <input class="ex-filt" type="number">
                </div>
                <div>
                    <label>Cod Servicio</label>
                    <input class="ex-filt" type="number">
                </div>
            </div>
        </div>
        <form>
            <div class="inputs-busqueda">
                <button class="filtrar" type="button"></button>
                <button class="agregar" onclick="ventanaSeccion('.conteiner-reserva', '.BRS-reserva', 'subir')" type="button">AÑADIR</button>
            </div>
        </form>
        <table>
            <thead>
                <tr class="indicadores">
                    <th>CLIENTE</th>
                    <th>NOMBRE</th>
                    <th>ORIGEN</th>
                    <th>DESTINO</th>
                    <th>CHOFER</th>
                </tr>
            </thead>
            <tbody class="registro-reserva"></tbody>
        </table>
    </div>
    <div class="block_relative_section BRS-reserva">
        <form class="alert_section">
            <div class="conteiner_form">
                <div>
                    <label for="nombre-servicio">Nombre del pasajero</label>
                    <input 
                        name="nombre-servicio"
                        type="text"
                        placeholder="John"
                        maxlength="70">
                    <label for="forma-de-pago">Forma de pago</label>
                    <select name="forma-de-pago">
                        <option>--Seleccione Forma de Pago</option>
                        <option value="contado">Contado</option>
                        <option value="tarjeta">Debito</option>
                        <option value="credito">Crédito</option>
                    </select>
                </div>
                <div>
                    <label for="apellido-servicio">Apellido del pasajero</label>
                    <input 
                        name="apellido-servicio" 
                        type="text"
                        placeholder="White"
                        maxlength="70">
                    <label for="monto-servicio">Monto</label>
                    <input 
                        name="monto-servicio" 
                        type="number">
                </div>
            </div>
            <div class="conteiner_form">
                <div>
                    <label for="cliente-reserva">Cliente</label>
                    <input 
                        list="cliente-reserva"
                        name="cliente-reserva"
                        type="text"
                        placeholder="Ingrese o Seleccione Cliente">
                    <datalist id="cliente-reserva"></datalist>
                    <label for="origen-servicio">Origen</label>
                    <input 
                        name="origen-servicio" 
                        type="text"
                        placeholder="Carlos de la Vega 5348"
                        maxlength="70">
                </div>
                <div>              
                    <label for="fecha-servicio">Fecha del viaje</label>
                    <input 
                        name="fecha-servicio" 
                        type="text"
                        placeholder="YY-MM-DD | <?php echo date("Y-m-d")?>"
                        value="<?php echo date("Y-m-d")?>">

                    <label for="hora-servicio">Hora del viaje</label>
                    <input 
                        name="hora-servicio"
                        type="text"
                        placeholder="HH:MM | <?php echo date("H:i")?> "
                        value="<?php echo date("H:i")?>">
                </div>
            </div>
            <div class="conteiner_form">
                <div>
                    <label for="destino-servicio">Destino</label>
                    <input 
                        name="destino-servicio" 
                        type="text"
                        placeholder="18 de Julio"
                        maxlength="70">
                </div>
                <div>
                    <label for="chofer-realizan">Chofer</label>
                    <input
                        list="chofer-realizan"
                        name="chofer-realizan" 
                        type="text"
                        placeholder="Ingrese o Seleccione Chofer">
                    <datalist id="chofer-realizan"></datalist>
                </div>
            </div>
            <label for="comentario-servicio">Comentario</label>
            <textarea name="comentario-servicio" maxlength="100"></textarea>
            <div class="buttons">
                <button class="cancel_button" type="button">Cancelar</button>   
                <button class="subir_datos" type="button">Agregar</button>
                <button class="modificar_datos" type="button">Modificar</button>
            </div>                          
        </form>
    </div>
</section>