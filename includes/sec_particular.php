<section class="bloque" id="particular">
    <div class="conteiner-section conteiner-cliente">
        <div class="titulo-section">
            <i class="fa-solid fa-bars navbar_block" onclick="nav_block()"></i>
            <i class="fa-solid fa-person navbar_icon"></i>
            <h2>PARTICULARES</h2>
        </div>
        <div class="alert-filtrar">
            <div class="filter-block">
                <div>
                    <label>Nro_cliente</label>
                    <input class="ex-filt" type="number">
                </div>
                <div>
                    <label>Teléfono</label>
                    <input class="ex-filt" type="number">
                </div>
                <div>
                    <label>Nombre</label>
                    <input class="ex-filt" type="text">
                </div>
                <div>
                    <label>Apellido</label>
                    <input class="ex-filt" type="text">
                </div>
                <div>
                    <label>Dirección</label>
                    <input class="ex-filt" type="text">
                </div>
                <div>
                    <label>Lista negra</label>
                    <select class="ex-filt">
                        <option value="2" selected>Mostrar Todos</option>
                        <option value="1">SI</option>
                        <option value="0">NO</option>
                    </select>
                </div>
            </div>
        </div>
        <form>
            <div class="inputs-busqueda">
                <button class="filtrar" type="button"></button>
                <button class="agregar" onclick="ventanaSeccion('.conteiner-cliente', '.BRS-cliente', 'subir')" type="button">AÑADIR</button>
            </div>
        </form>
        <table>
            <thead>
                <tr class="indicadores">
                    <th>NRO_CLIENTE</th>
                    <th>TELEFONO</th>
                    <th>NOMBRE</th>
                    <th>APELLIDO</th>
                    <th>DIRECCIÓN</th>
                </tr>
            </thead>
            <tbody class="registro-cliente"></tbody>
        </table>
    </div>
    <div class="block_relative_section BRS-cliente">
        <form class="alert_section">
            <label for="tel-particular">Teléfono</label>
            <input 
                name="tel-particular" 
                type="text"
                maxlength="12"
                placeholder="012345678 | +59812345678 | 012 345 678">
            <label for="nombre-particular">Nombre</label>
            <input 
                name="nombre-particular" 
                type="text" 
                maxlength="70"
                placeholder="White">
            <label for="apellido-particular">Apellido</label>
            <input 
                name="apellido-particular" 
                type="text" 
                placeholder="White"
                maxlength="70">
            <label for="direccion-particular">Dirección</label>
            <input 
                name="direccion-particular" 
                type="text"
                maxlength="50"
                placeholder="Carlos de la Vega Yugoeslavia 0000">
            <label for="ln-particular">Lista negra</label>
            <select name="ln-particular" >
                <option value="">-- Seleccione opción</option>
                <option value="1">SI</option>
                <option value="0" selected>NO</option>
            </select>
            <div class="buttons">
                <button class="cancel_button" type="button">Cancelar</button>
                <button class="subir_datos" type="button">Agregar</button>
                <button class="modificar_datos" type="button">Modificar</button>
            </div>                      
        </form>
    </div>
</section>