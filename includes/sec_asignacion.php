<section class="bloque" id="asignacion">
    <div class="conteiner-section conteiner-asignacion">

        <div class="titulo-section">
            <i class="fa-solid fa-bars navbar_block" onclick="nav_block()"></i>
            <i class="fa-solid fa-clipboard-list navbar_icon"></i>
            <h2>ASIGNACIONES</h2>
        </div>
        
        <form class="alert-filtrar">
            <div class="filter-block">
                <label>Cedula <input class="ex-filt" type="number"></label>
                <label>Chofer <input class="ex-filt" type="text"></label>
                <label>Coche <input class="ex-filt" type="text"></label>
            </div>
        </form>
        
        <form>
            <div class="inputs-busqueda">
                <button class="filtrar" type="button"></button>
                <button 
                    class="agregar" 
                    onclick="ventanaSeccion('.conteiner-asignacion', '.BRS-asignacion', 'subir')" 
                    type="button">AGREGAR</button>
            </div>
        </form>
        
        <table>
            <thead>
                <tr class="indicadores">
                    <th>CEDULA</th>
                    <th>CHOFER</th>
                    <th>COCHE</th>
                </tr>
            </thead>
            <tbody class="registro-asignacion"></tbody>
        </table>

    </div>
    <div class="block_relative_section BRS-asignacion">
        <form class="alert_section">

            <label for="ci-asignacion">Cedula</label>
            <input 
                name="ci-asignacion"
                list="ci-asignacion"
                type="text"
                placeholder="00000000"
                maxlength="8">
            <datalist id="ci-asignacion"></datalist> 
            <label for="matricula-asignacion">Matrícula</label>
            <input 
                name="matricula-asignacion"
                list="matricula-asignacion"
                type="text"
                placeholder="SRE0000"
                maxlength="7">
            <datalist id="matricula-asignacion"></datalist>
            <div class="buttons">
                <button class="cancel_button" type="button">Atras</button>   
                <button class="subir_datos" type="button" onclick="btn_switch('chofer')">Agregar</button> 
                <button class="modificar_datos" type="button">Modificar</button>
            </div>

        </form>
    </div>
</section>