<!-- Inicio CHOFERES -->
<section class="bloque" id="chofer">
    <div class="conteiner-section conteiner-chofer">
        <div class="titulo-section">
            <i class="fa-solid fa-bars navbar_block" onclick="nav_block()"></i>
            <i class="fi fi-ss-steering-wheel navbar_icon"></i>
            <h2>CHOFERES</h2>
        </div>
        <div class="alert-filtrar">
            <div class="filter-block">
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
                    <label>Cedula</label>
                    <input class="ex-filt" type="number">
                </div>
            </div>
        </div>
        <form>
            <div class="inputs-busqueda">
                <button class="filtrar" type="button"> FILTRAR </button>
                <button class="agregar" onclick="ventanaSeccion('.conteiner-chofer', '.BRS-choferes', 'subir')" type="button">AÑADIR</button>
            </div>
        </form>
        <table>
            <thead>
                <tr class="indicadores">
                    <th>TELEFONO</th>
                    <th>NOMBRE</th>
                    <th>APELLIDO</th>
                    <th>CEDULA</th>
                </tr>
            </thead>
            <tbody class="registro-choferes"></tbody>
        </table>
    </div>
    <div class="block_relative_section BRS-choferes">
        <form class="alert_section">
            <label for="tel-chofer">Teléfono</label>
            <input
                name="tel-chofer" 
                type="text" 
                placeholder=" 012345678 | +59812345678 | 012 345 678"
                maxlength="12">
            <label for="nombre-chofer">Nombre</label>
            <input 
                name="nombre-chofer" 
                type="text"
                placeholder="John" 
                maxlength="35">
            <label for="apellido-chofer">Apellido</label>
            <input 
                name="apellido-chofer" 
                type="text"
                placeholder="White" 
                maxlength="35">
            <label for="ci-chofer">Cedula</label>
            <input 
                name="ci-chofer" 
                type="text" 
                placeholder="12345678" 
                maxlength="8">
            <div class="buttons">
                <button class="cancel_button" type="button">Cancelar</button>   
                <button class="subir_datos" type="button">Agregar</button>
                <button class="modificar_datos" type="button">Modificar</button>
            </div>  
        </form>
    </div>
</section>
<!-- Fin CHOFERES -->