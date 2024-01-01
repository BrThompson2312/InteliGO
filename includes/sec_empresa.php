<section class="bloque" id="empresa">
    <div class="conteiner-section conteiner-empresa">
        <div class="titulo-section">
            <i class="fa-solid fa-bars navbar_block" onclick="nav_block()"></i>
            <i class="fa-solid fa-building navbar_icon"></i>
            <h2>EMPRESAS</h2>
        </div>
        <div class="alert-filtrar">
            <div class="filter-block">
                <div>
                    <label>Nro_cliente</label>
                    <input class="ex-filt" type="number">
                </div>
                <div>
                    <label>RUT</label>
                    <input class="ex-filt" type="number">
                </div>
                <div>
                    <label>Nombre</label>
                    <input class="ex-filt" type="text">
                </div>
                <div>
                    <label>Correo</label>
                    <input class="ex-filt" type="text">
                </div>
                <div>
                    <label>Direccion</label>
                    <input class="ex-filt" type="text">
                </div>
                <div>
                    <label>Razón social</label>
                    <input class="ex-filt" type="text">
                </div>
                <div>
                    <label>Encargado de pagos</label>
                    <input class="ex-filt" type="text">
                </div>
                <div>
                    <label>Autorizado</label>
                    <input class="ex-filt" type="text">
                </div>
                <div>
                    <label>Teléfono</label>
                    <input class="ex-filt" type="number">
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
                <button class="agregar" onclick="ventanaSeccion('.conteiner-empresa', '.BRS-empresa', 'subir')" type="button">AÑADIR</button>
            </div>
        </form>
        <table>
            <thead>
                <tr class="indicadores">
                    <th>NRO_CLIENTE</th>
                    <th>RUT</th>
                    <th>NOMBRE</th>
                    <th>CORREO</th>
                    <th>DIRECCIÓN</th>
                </tr>
            </thead>
            <tbody class="registro-empresa"></tbody>
        </table>
    </div>
    <div class="block_relative_section BRS-empresa">
        <form class="alert_section">
            <label for="rut-empresa">RUT</label>
            <input 
                name="rut-empresa" 
                type="text"  
                placeholder="210000000000"
                maxlength="12">
            <div class="conteiner_form">
                <div>
                    <label for="direccion-empresa">Dirección</label>
                    <input 
                        name="direccion-empresa"
                        type="text"
                        maxlength="100"
                        placeholder="Carlos de la Vega 0000">

                    <label for="tel-empresa">Teléfono</label>
                    <input 
                        name="tel-empresa" 
                        type="text" 
                        placeholder="12345678 | +59812345678 | 012 345 678"
                        maxlength="12">
                    <label for="correo-empresa">Correo</label>
                    <input 
                        name="correo-empresa" 
                        type="email"
                        maxlength="125"
                        placeholder="correo@correo.com">
                    <label for="listanegra-empresa">Lista negra</label>
                    <select name="listanegra-empresa">
                        <option value="" selected>--Seleccione opción</option>
                        <option value="1">SI</option>
                        <option value="0">NO</option>
                    </select>
                </div>
                <div>
                    <label for="fantasia-empresa">Nombre fantasía</label>
                    <input 
                        name="fantasia-empresa" 
                        type="text"
                        maxlength="70"
                        placeholder="McDonald's">
                    <label for="razonsocial-empresa">Razón social</label>
                    <input 
                        name="razonsocial-empresa" 
                        type="text"
                        maxlength="70"
                        placeholder="Restaurantes McDonald's S.A.">
                    <label for="encargado-empresa">Encargado de pagos</label>
                    <input 
                        name="encargado-empresa" 
                        type="text"
                        maxlength="70"
                        placeholder=""> 
                    <label for="autorizado-empresa">Autorizado</label>
                    <input 
                        name="autorizado-empresa" 
                        type="text"
                        maxlength="70"
                        placeholder="">
                </div>
            </div>
            <div class="buttons">
                <button class="cancel_button" type="button">Cancelar</button>   
                <button class="subir_datos" type="button">Agregar</button>   
                <button class="modificar_datos" type="button">Modificar</button>
            </div>                             
        </form>
    </div>
</section>