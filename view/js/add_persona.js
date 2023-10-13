class Persona {
    constructor(cedula, nombre){
        this.cedula = cedula;
        this.nombre = nombre;
    }
}

class Operador extends Persona {
    constructor(cedula, nombre, pass, fecha){
        super(cedula, nombre)
        this.cedula = cedula;
        this.nombre = nombre;
        this.pass = pass;
        this.fecha = fecha;
    }
}

class Chofer extends Persona {
    constructor(cedula, nombre, telefono, matricula, modelo, marca, año){
        super(cedula, nombre);
        this.cedula = cedula;
        this.nombre = nombre;
        this.telefono = telefono;
        this.matricula = matricula;
        this.modelo = modelo;
        this.marca = marca;
        this.año = año;
    }
}

class Particular extends Persona {
    constructor(cedula, nombre, apellido, direccion, telefono, lista_negra){
        super(cedula, nombre);
        this.cedula = cedula;
        this.nombre = nombre;
        this.apellido = apellido;
        this.direccion = direccion;
        this.telefono = telefono;
        this.lista_negra = lista_negra;
    }
}

class Empresa {
    constructor(rut, lista_negra, nombre, razon_social, direccion, telefono, correo){
        this.rut = rut;
        this.lista_negra = lista_negra;
        this.nombre = nombre;
        this.razon_social = razon_social;
        this.direccion = direccion;
        this.telefono = telefono;
        this.correo = correo;
    }
}

class Reserva {
    constructor(tipo_reserva, pasajero, chofer, fecha_viaje, hora, telefono, origen, fecha_reserva, distancia, destino, comentario){
        this.tipo_reserva = tipo_reserva;
        this.pasajero = pasajero;
        this.chofer = chofer;
        this.fecha_viaje = fecha_viaje;
        this.hora = hora;
        this.telefono = telefono;
        this.origen = origen;
        this.fecha_reserva = fecha_reserva;
        this.distancia = distancia;
        this.destino = destino;
        this.comentario = comentario;
    }
}

class Mantenimiento {
    constructor(fecha, concepto, importe, comentario){
        this.fecha = fecha;
        this.concepto = concepto;
        this.importe = importe;
        this.comentario = comentario;
    }
}

function btn_switch(cont){
    switch (cont){
        case 'operador':
            cont_operador();
        break;
        case 'chofer':
            cont_chofer();
        break;
        case 'particular':
            cont_particular();
        break;
        case 'empresa':
            cont_empresa();
        break; 
        case 'reserva':
            cont_reserva();
        break;
        case 'mantenimiento':
            cont_mantenimiento();
        break;
    }
}
        
function cont_operador(){
    let cedula = document.querySelector('[name="ci-operador"]').value;
    let nombre = document.querySelector('[name="nombre-operador"]').value;
    let pass = document.querySelector('[name="contrasena-operador"]').value;
    let fecha = document.querySelector('[name="fecha-operador"]').value;

    let operador = new Operador(cedula, nombre, pass, fecha);

    if (cedula == '' || nombre == '' || pass == '' || fecha == ''){
        alert('Llene todos los campos');
    } else {
        $.ajax({
            url: '../model/agregar/a_operadores.php',
            type: 'POST',
            data: {
                cedula: operador.cedula,
                nombre: operador.nombre,
                pass: operador.pass,
                fecha: operador.fecha,
            },
            success: function(response){
                alert(response);
            },
            error: function(reject){
                alert(reject);
            }
        })
    }    
}

function cont_chofer(){
    let cedula = document.querySelector('[name="ci-chofer"]').value;
    let nombre = document.querySelector('[name="nombre-chofer"]').value;
    let telefono = document.querySelector('[name="tel-chofer"').value;
    let matricula = document.querySelector('[name="matricula-veh"]').value;
    let modelo = document.querySelector('[name="modelo-veh"]').value;
    let marca = document.querySelector('[name="marca-veh"]').value;
    let año = document.querySelector('[name="año-veh"]').value;

    let chofer = new Chofer(cedula, nombre, telefono, matricula, modelo, marca, año);

    if (nombre == '' || cedula == '' || telefono == '' || matricula == '' || modelo == '' || marca == '' || año == ''){
        alert('Llene todos los campos');
    } else {
        $.ajax({
            url: '../model/agregar/a_choferes.php',
            type: 'POST',
            data: {
                cedula: chofer.cedula,
                nombre: chofer.nombre,
                telefono: chofer.telefono,
                matricula: chofer.matricula,
                modelo: chofer.modelo,
                marca: chofer.marca,
                año: chofer.año,
            },
            success: function(response){
                alert(response);
            },
            error: function(reject){
                alert(reject);
            }
        })
    }    
}

function cont_particular(){
    let cedula = document.querySelector('[name="ci-particular"]').value;
    let nombre = document.querySelector('[name="nombre-particular"]').value;
    let apellido = document.querySelector('[name="apellido-particular"').value;
    let direccion = document.querySelector('[name="direccion-particular"]').value;
    let telefono = document.querySelector('[name="tel-particular"]').value;
    let lista_negra = document.querySelector('[name="ln-particular"]').value;

    let particular = new Particular(cedula, nombre, apellido, direccion, telefono, lista_negra);

    if (nombre == '' || cedula == '' || apellido == '' || direccion == '' || telefono == '' || lista_negra == ''){
        alert('Llene todos los campos');
    } else {
        $.ajax({
            url: '../model/agregar/a_particulares.php',
            type: 'POST',
            data: {
                cedula: particular.cedula,
                nombre: particular.nombre,
                apellido: particular.apellido,
                direccion: particular.direccion,
                telefono: particular.telefono,
                lista_negra: particular.lista_negra,
            },
            success: function(response){
                alert(response);
            },
            error: function(reject){
                alert(reject);
            }
        })
    }    
}

function cont_empresa(){
    let rut = document.querySelector('[name="rut-empresa"]').value;
    let lista_negra = document.querySelector('[name="ln-empresa"]').value;
    let nombre = document.querySelector('[name="nombre-empresa"').value;
    let direccion = document.querySelector('[name="direccion-empresa"]').value;
    let telefono = document.querySelector('[name="telefono-empresa"]').value;
    let correo = document.querySelector('[name="correo-empresa"]').value;

    let chofer = new Empresa(rut, lista_negra, nombre, direccion, telefono, correo);

    if (rut == '' || lista_negra == '' || nombre == '' || direccion == '' || telefono == '' || correo == ''){
        alert('Llene todos los campos');
    } else {
        $.ajax({
            url: '../model/agregar/a_empresas.php',
            type: 'POST',
            data: {
                cont: 3,
                rut: chofer.rut,
                lista_negra: chofer.lista_negra,
                nombre: chofer.nombre,
                direccion: chofer.direccion,
                telefono: chofer.telefono,
                correo: chofer.correo,
            },
            success: function(response){
                alert(response);
            },
            error: function(reject){
                alert(reject);
            }
        })
    }    
}

function cont_reserva(){
    let tipo_reserva = document.querySelector('[name="tipo-reserva"]').value;
    let lista_negra = document.querySelector('[name="pasajero-reserva"]').value;
    let nombre = document.querySelector('[name="chofer-reserva"').value;
    let fecha_viaje = document.querySelector('[name="fecha_viaje-reserva"]').value;
    let hora = document.querySelector('[name="hora-reserva"]').value;
    let telefono = document.querySelector('[name="tel-reserva]').value;
    let origen = document.querySelector('[name="origen-reserva]').value;
    let fecha_reserva = document.querySelector('[name="fecha_reserva-reserva]').value;
    let distancia = document.querySelector('[name="distancia-reserva]').value;
    let destino = document.querySelector('[name="destino-reserva]').value;
    let comentario = document.querySelector('[name="comentario-reserva]').value;

    let chofer = new Reserva(tipo_reserva, lista_negra, nombre, fecha_viaje, hora, telefono, origen, fecha_reserva, distancia, destino, comentario);

    if (tipo_reserva == '' || lista_negra == '' || nombre == '' || fecha_viaje == '' || hora == '' || telefono == '' || origen == '' || fecha_reserva == '' || distancia == '' || destino == '' || comentario == ''){
        alert('Llene todos los campos');
    } else {
        $.ajax({
            url: '../model/agregar/a_reservas.php',
            type: 'POST',
            data: {
                cont: 4,
                tipo_reserva: chofer.tipo_reserva,
                lista_negra: chofer.lista_negra,
                nombre: chofer.nombre,
                fecha_viaje: chofer.fecha_viaje,
                hora: chofer.hora,
                telefono: chofer.telefono,
                origen: chofer.origen,
                fecha_reserva: chofer.fecha_reserva,
                distancia: chofer.distancia,
                destino: chofer.destino,
                comentario: chofer.comentario,
            },
            success: function(response){
                alert(response);
            },
            error: function(reject){
                alert(reject);
            }
        })
    }    
}

function cont_mantenimiento(){
    let fecha = document.querySelector('[name="fecha-gdm"]').value;
    let concepto = document.querySelector('[name="concepto-gdm"]').value;
    let importe = document.querySelector('[name="importe-gdm"').value;
    let comentario = document.querySelector('[name="comentario-gdm"]').value;

    let chofer = new Mantenimiento(fecha, concepto, importe, comentario);

    if (fecha == '' || concepto == '' || importe == '' || comentario == ''){
        alert('Llene todos los campos');
    } else {
        $.ajax({
            url: '../model/agregar/a_mantenimiento.php',
            type: 'POST',
            data: {
                cont: 5,
                fecha: chofer.fecha,
                concepto: chofer.concepto,
                importe: chofer.importe,
                comentario: chofer.comentario,
            },
            success: function(response){
                alert(response);
            },
            error: function(reject){
                alert(reject);
            }
        })
    }    
}