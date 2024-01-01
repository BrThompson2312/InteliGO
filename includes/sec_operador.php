<section class="bloque" id="operador">
    <div class="conteiner-section conteiner-operador">
        <div class="titulo-section">
            <i class="fa-solid fa-bars navbar_block" onclick="nav_block()"></i>
            <i class="fa-solid fa-user navbar_icon"></i>
            <h2>OPERADORES</h2>
        </div>
        <div class="alert-filtrar">
            <div class="filter-block">
                <div>
                    <label>Cedula</label>
                    <input class="ex-filt" type="number">
                </div>
                <div>
                    <label>Nombre del Operador</label>
                    <input class="ex-filt" type="text">
                </div>
                <div>
                    <label>Fecha de Ingreso</label>
                    <input class="ex-filt" type="text" placeholder="<?php echo date("Y-m-d h:m:s")?>">
                </div>
            </div>
        </div>
        <form>
            <div class="inputs-busqueda">
                <button class="filtrar" type="button"> FILTRAR </button>
                <button class="agregar" onclick="ventanaSeccion('.conteiner-operador', '.BRS-operador', 'subir')" type="button">AÑADIR</button>
            </div>
        </form>
        <table>
            <thead>
                <tr class="indicadores">
                    <th> CEDULA </th>
                    <th> NOMBRE DEL OPERADOR </th>
                    <th> FECHA DE INGRESO </th>
                </tr>
            </thead>
            <tbody class="registro-operadores"></tbody>
        </table>
    </div>
    <div class="block_relative_section BRS-operador">
        <form class="alert_section">
            <label for="ci-operador">Cedula</label>
            <input 
                name="ci-operador" 
                type="text" 
                placeholder="12345678"
                maxlength="8">
            <label for="nombre-operador">Nombre de usuario</label>
            <input 
                name="nombre-operador" 
                type="text" 
                placeholder="John" 
                maxlength="70">
            <label for="contrasena-operador">Contraseña</label>
            <input 
                name="contrasena-operador" 
                type="password" 
                maxlength="16">
            <div class="buttons">
                <button class="cancel_button" type="button">Cancelar</button>   
                <button class="subir_datos" type="button">Agregar</button>
                <button class="modificar_datos" type="button">Modificar</button>
            </div>
        </form>
    </div>
</section>
