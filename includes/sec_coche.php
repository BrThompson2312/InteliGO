<!-- Inicio COCHES -->
<section class="bloque" id="coche">
    <div class="conteiner-section conteiner-coche">
        <div class="titulo-section">
            <i class="fa-solid fa-bars navbar_block" onclick="nav_block()"></i>
            <i class="fi fi-ss-steering-wheel navbar_icon"></i>
            <h2>COCHES</h2>
        </div>
        <div class="alert-filtrar">
            <div class="filter-block">
                <div>
                    <label>Matrícula</label>
                    <input class="ex-filt" type="text">
                </div>
                <div>
                    <label>Marca</label>
                    <input class="ex-filt" type="text">
                </div>
                <div>
                    <label>Modelo</label>
                    <input class="ex-filt" type="text">
                </div>
                <div>
                    <label>Año</label>
                    <input class="ex-filt" type="number">
                </div>
            </div>
        </div>
        <form>
            <div class="inputs-busqueda">
                <button class="filtrar" type="button"> FILTRAR </button>
                <button class="agregar" onclick="ventanaSeccion('.conteiner-coche', '.BRS-coches','subir')" type="button">AÑADIR</button>
            </div>
        </form>
        <table>
            <thead>
                <tr class="indicadores">
                    <th>MATRICULA</th>
                    <th>MARCA</th>
                    <th>MODELO</th>
                    <th>AÑO</th>
                </tr>
            </thead>
            <tbody class="registro-coches"></tbody>
        </table>
    </div>
    <div class="block_relative_section BRS-coches">
        <form class="alert_section">
            <label for="matricula-coche">Matrícula</label>
            <input 
                name="matricula-coche" 
                type="text" 
                placeholder="SRC4040" 
                maxlength="7">
            <label for="marca-coche">Marca</label>
            <input 
                name="marca-coche"
                type="text"
                placeholder="Toyota"
                maxlength="20">
            <label for="modelo-coche">Modelo</label>
            <input 
                name="modelo-coche" 
                type="text" 
                placeholder="ToyotaOne"
                maxlength="20">     
            <label for="año-coche">Año</label>
            <input 
                name="año-coche" 
                type="text" 
                placeholder="2023"
                maxlength="4">
            <div class="buttons">
                <button class="cancel_button" type="button">Cancelar</button>   
                <button class="subir_datos" type="button">Agregar</button>
                <button class="modificar_datos" type="button">Modificar</button>
            </div>                  
        </form>
    </div>
</section>
<!-- Fin COCHES -->