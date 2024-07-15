<section class="bloque" id="gastos-de-mantenimiento">
    <div class="conteiner-section conteiner-GDM">
        <div class="titulo-section">
            <i class="fa-solid fa-bars navbar_block" onclick="nav_block()" ></i>
            <i class="fa-solid fa-wrench navbar_icon"></i>
            <h2>MANTENIMIENTO</h2>
        </div>
        <div class="alert-filtrar">
            <div class="filter-block">
                <div>
                    <label>Cod-factura</label>
                    <input class="ex-filt" type="number">
                </div>
                <div>
                    <label>Matrícula</label>
                    <input class="ex-filt" type="text">
                </div>
                <div>
                    <label>Concepto</label>
                    <select class="ex-filt">
                        <option value="">--Por favor elija una opción</option>
                        <option value="Gasoil">Gasoil</option>
                        <option value="Cambio de aceite">Cambio de aceite</option>
                        <option value="Electricista">Electricista</option>
                        <option value="Alineacion balanceo">Alineación y balanceo</option>
                        <option value="Gomeria">Gomería</option>
                        <option value="Cambio correa">Cambio de correa</option>
                        <option value="Frenos">Frenos</option>
                        <option value="Embrague">Embrague</option>
                        <option value="Chapista">Chapista</option>
                        <option value="Otros">Otros</option>
                    </select>
                </div>
                <div>
                    <label>Comentario</label>
                    <input class="ex-filt" type="text">
                </div>
                <div>
                    <label>Importe total</label>
                    <input class="ex-filt" type="number">
                </div>
                <div>
                    <label>Taller</label>
                    <input class="ex-filt" type="text">
                </div>
                <div>
                    <label>Fecha</label>
                    <input class="ex-filt" type="text">
                </div>
            </div>
        </div>
        <form>
            <div class="inputs-busqueda">
                <button class="filtrar" type="button">FILTRAR</button>
                <button class="agregar" onclick="ventanaSeccion('.conteiner-GDM', '.BRS-GDM', 'subir')" type="button">AÑADIR</button>
            </div>
        </form>
        <table>
            <thead>
                <tr class="indicadores">
                    <th>COD-FACTURA</th>
                    <th>MATRÍCULA</th>
                    <th>CONCEPTO</th>
                    <th>COMENTARIOS</th>
                    <th>IMPORTE TOTAL</th>
                </tr>
            </thead>
            <tbody class="registro-GDM"></tbody>
        </table>
    </div>
    <div class="block_relative_section BRS-GDM">
        <form class="alert_section">
            <div class="conteiner_form">
                <div>
                    <label for="codigo-gdm">Cod-factura</label>
                    <input 
                        name="codigo-gdm" 
                        type="number"
                        placeholder="0000">
                </div>
                <div>
                    <label for="matricula-gdm">Coche</label>
                    <input 
                        list="matricula-gdm"
                        name="matricula-gdm"
                        type="text"
                        placeholder="Ingrese o Seleccione Coche">
                    <datalist id="matricula-gdm"></datalist>
                </div>
            </div>
            <div class="conteiner_form">
                <div> 
                    <label for="importe-gdm">Importe</label>
                    <input 
                        name="importe-gdm"
                        type="number"
                        placeholder="Ingrese Importe">
                </div>     
                <div>
                    <label for="taller-gdm">Taller</label>
                    <input 
                        name="taller-gdm" 
                        type="text"
                        placeholder="Taller"
                        maxlength="70">
                </div>
            </div>
            <label for="concepto-gdm">Concepto</label>
            <select name="concepto-gdm">
                <option value="">--Por favor elija una opción</option>
                <option value="Gasoil">Gasoil</option>
                <option value="Cambio de aceite">Cambio de aceite</option>
                <option value="Electricista">Electricista</option>
                <option value="Alineacion balanceo">Alineación y balanceo</option>
                <option value="Gomeria">Gomería</option>
                <option value="Cambio correa">Cambio de correa</option>
                <option value="Frenos">Frenos</option>
                <option value="Embrague">Embrague</option>
                <option value="Chapista">Chapista</option>
                <option value="Otros">Otros</option>
            </select>  
            <label for="comentario-gdm">Comentario</label>
            <textarea 
                name="comentario-gdm"
                type="text"
                placeholder="Comentario"
                maxlength="100">
            </textarea>
            <div class="buttons">
                <button class="cancel_button" type="button">Cancelar</button>   
                <button class="subir_datos" type="button">Agregar</button>
                <button class="modificar_datos" type="button">Modificar</button>
            </div>                             
        </form>
    </div>
</section>