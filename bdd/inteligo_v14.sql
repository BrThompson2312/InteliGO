drop database IntelisoftBDD;
create database IntelisoftBDD;
use IntelisoftBDD;
show tables;

create table IF NOT EXISTS chofer(
	cedula INT,
	nombre VARCHAR(35) NOT NULL,
    apellido VARCHAR(35) NOT NULL,
    fecha_desactivacion DATETIME,
    activo BOOLEAN DEFAULT 1,
	PRIMARY KEY (cedula)
);
INSERT INTO chofer (cedula, nombre, apellido, activo) VALUES (12345678, 'Juan', 'Pérez', 1);
INSERT INTO chofer (cedula, nombre, apellido, activo) VALUES (23456789, 'Ana', 'Gómez', 1);
INSERT INTO chofer (cedula, nombre, apellido, activo) VALUES (34567890, 'Luis', 'Martínez', 1);
INSERT INTO chofer (cedula, nombre, apellido, activo) VALUES (45678901, 'María', 'López', 1);
INSERT INTO chofer (cedula, nombre, apellido, activo) VALUES (56789012, 'Carlos', 'Rodríguez', 1);
INSERT INTO chofer (cedula, nombre, apellido, activo) VALUES (67890123, 'Sofía', 'Hernández', 1);
INSERT INTO chofer (cedula, nombre, apellido, activo) VALUES (78901234, 'Pedro', 'Sánchez', 1);
INSERT INTO chofer (cedula, nombre, apellido, activo) VALUES (89012345, 'Laura', 'García', 1);
INSERT INTO chofer (cedula, nombre, apellido, activo) VALUES (90123456, 'Javier', 'Fernández', 1);
INSERT INTO chofer (cedula, nombre, apellido, activo) VALUES (12341234, 'Isabel', 'Díaz', 1);

create table IF NOT EXISTS tel_chofer(
	cedula INT,
	telefono VARCHAR(12) NOT NULL,
	PRIMARY KEY (cedula, telefono),
    FOREIGN KEY (cedula) REFERENCES chofer (cedula)
);
INSERT INTO tel_chofer VALUES ('12345678', '099223644');
INSERT INTO tel_chofer VALUES ('23456789', '092456454');
INSERT INTO tel_chofer VALUES ('34567890', '099476354');
INSERT INTO tel_chofer VALUES ('45678901', '099476354');
INSERT INTO tel_chofer VALUES ('56789012', '088765432');
INSERT INTO tel_chofer VALUES ('67890123', '091234567');
INSERT INTO tel_chofer VALUES ('78901234', '097654321');
INSERT INTO tel_chofer VALUES ('89012345', '094321678');
INSERT INTO tel_chofer VALUES ('90123456', '086543219');
INSERT INTO tel_chofer VALUES ('12341234', '090123456');

create table IF NOT EXISTS coches(
	matricula VARCHAR(7),
	modelo VARCHAR(70) NOT NULL,
	marca VARCHAR(70) NOT NULL,
	año YEAR NOT NULL,
    activo BOOLEAN DEFAULT 1,
	PRIMARY KEY (matricula)
);
INSERT INTO coches VALUES ('SRE4565' , 'Nissan','Sentra', '2017', 1);
INSERT INTO coches VALUES ('SRE6544' , 'Nissan','Sentra', '2018', 1);
INSERT INTO coches VALUES ('SRE4334' , 'Nissan', 'Sentra', '2018', 1);
INSERT INTO coches VALUES ('SRE1234', 'Toyota', 'Corolla', '2019', 1);
INSERT INTO coches VALUES ('SRE5678', 'Nissan', 'Sentra', '2020', 1);
INSERT INTO coches VALUES ('SRE4321', 'Toyota', 'Camry', '2021', 1);
INSERT INTO coches VALUES ('SRE7890', 'Nissan', 'Altima', '2021', 1);
INSERT INTO coches VALUES ('SRE6543', 'Toyota', 'RAV4', '2018', 1);
INSERT INTO coches VALUES ('SRE9876', 'Nissan', 'Maxima', '2019', 1);
INSERT INTO coches VALUES ('SRE3456', 'Toyota', 'Corolla', '2022', 1);
UPDATE coches SET activo = 0 WHERE matricula = 'SRE1234';
UPDATE coches SET activo = 0 WHERE matricula = 'SRE3456';
UPDATE coches SET activo = 0 WHERE matricula = 'SRE4321';
UPDATE coches SET activo = 0 WHERE matricula = 'SRE4334';
UPDATE coches SET activo = 0 WHERE matricula = 'SRE4565';
    
create table IF NOT EXISTS mantenimiento(
	cod_mantenimiento INT,
	tipo_mantenimiento VARCHAR(50) NOT NULL,
	gastos_mantenimiento INT NOT NULL,
	comentarios VARCHAR(100),
	taller VARCHAR(70) NOT NULL,
	activo BOOLEAN NOT NULL,
	PRIMARY KEY (cod_mantenimiento)
);
INSERT INTO mantenimiento VALUES (1, 'GasOil', '12', 'qwe', 'Service Toyota' , 1);
INSERT INTO mantenimiento VALUES (2, 'pintura', '2000', 'pintura', 'Service Toyota' , 1);
INSERT INTO mantenimiento VALUES (3, 'aspiracion', '200', 'aspirado', 'Service Toyota' , 1);
INSERT INTO mantenimiento VALUES (4, 'cambio de frenos', '800', 'frenos nuevos', 'Service Toyota' , 1);
INSERT INTO mantenimiento VALUES (5, 'reparación de motor', '1500', 'motor reparado', 'Service Toyota' , 1);
 
create table IF NOT EXISTS servicio (
	cod_servicio INT AUTO_INCREMENT,
	origen VARCHAR(70) NOT NULL,
	destino VARCHAR(70) NOT NULL,
	fecha DATE NOT NULL,
	hora TIME NOT NULL,
	comentario VARCHAR(100)NOT NULL,
	nombre_pasajero VARCHAR(35) NOT NULL,
	apellido_pasajero VARCHAR(35) NOT NULL,
    activo BOOLEAN DEFAULT 1,
    monto FLOAT NOT NULL, 
	PRIMARY KEY (cod_servicio)
);
INSERT INTO servicio VALUES (0, 'Carlos de la Vega', '18 de Julio', '2023-09-15','14:00:00','sc', 'Ruben', 'Gomez', 1, 200); 
INSERT INTO servicio VALUES (0, 'Avenida Libertad', 'Plaza Independencia', '2023-09-16', '15:00:00','viaje de negocios', 'Laura', 'Fernández', 1, 300);
INSERT INTO servicio VALUES (0, 'Estación Central', 'Terminal Tres Cruces', '2023-09-17', '15:00:00','viaje de compras', 'Pablo', 'Martínez', 1, 400);
INSERT INTO servicio VALUES (0, 'Parque Rodó', 'Pocitos', '2023-09-18',' 18:40:00','paseo familiar', 'Ana', 'López', 1, 500);
INSERT INTO servicio VALUES (0, 'Carrasco', 'Canelones', '2023-09-19', '13:00:00', 'viaje de vacaciones', 'Diego', 'Rodríguez', 1, 600);
INSERT INTO servicio VALUES (0, 'Palermo', 'Parque Batlle', '2023-09-20', '11:00:00', 'cita médica', 'María', 'Pérez', 1, 700);
INSERT INTO servicio VALUES (0, 'Tres Cruces', 'Cerro', '2023-09-21', '15:00:00','viaje de estudios', 'Javier', 'Hernández', 1, 800);
INSERT INTO servicio VALUES (0, 'Ciudad Vieja', 'Punta Carretas', '2023-09-22', '20:00:00','paseo turístico', 'Elena', 'García', 1, 900);
INSERT INTO servicio VALUES (0, 'Buceo', 'Malvín', '2023-09-23', '19:40:00', 'visita a amigos', 'Luis', 'Silva', 1, 1000);
INSERT INTO servicio VALUES (0, 'Barrio Sur', 'La Comercial', '2023-09-24', '17:40:00','compras', 'Carolina', 'Gutiérrez', 1, 1100);

create table IF NOT EXISTS usuario (
	cedula INT,
	nombre_usuario VARCHAR(70) NOT NULL,
	contrasena VARCHAR(16) NOT NULL,
	rol_usuario ENUM('administrador', 'operador'),
	fecha_ingreso DATETIME,
    activo boolean NOT NULL DEFAULT 1,
	PRIMARY KEY (cedula)
);
CREATE VIEW view_usuario AS SELECT cedula, contrasena, activo, rol_usuario, nombre_usuario FROM usuario;
insert into usuario (cedula, nombre_usuario, contrasena, rol_usuario, activo) VALUES 
(1, 'root', 'root', 'administrador', 1),
(2, 'operador', 'operador', 'operador', 1),
(3, 'prueba', 'prueba', 'operador', 0);
INSERT INTO usuario VALUES ('5654855' , 'Enrique', 'Enriquee' , 'administrador', '2020-06-26', 1);
INSERT INTO usuario VALUES ('5466455' , 'Juan', 'juann' , 'operador', '2022-08-16', 1);
INSERT INTO usuario VALUES ('5655355' , 'Sebastian', 'seba' , 'administrador', '2021-11-12', 1);
INSERT INTO usuario VALUES ('5544566', 'Ana', 'ana123', 'operador', '2022-09-20', 1);
INSERT INTO usuario VALUES ('5666557', 'María', 'maria456', 'administrador', '2021-07-14', 1);
INSERT INTO usuario VALUES ('5657658', 'Pedro', 'pedro789', 'operador', '2023-05-30', 1);
INSERT INTO usuario VALUES ('5568459', 'Luis', 'luis2023', 'administrador', '2020-10-05', 1);
INSERT INTO usuario VALUES ('5687660', 'Carolina', 'caro456', 'operador', '2021-12-18', 1);
INSERT INTO usuario VALUES ('5654761', 'Manuel', 'manuel01', 'administrador', '2022-04-02', 1);
INSERT INTO usuario VALUES ('5678962', 'Marta', 'marta1234', 'operador', '2023-03-15', 1);

create table IF NOT EXISTS cliente (
	cod_cliente INT AUTO_INCREMENT,
	lista_negra BOOLEAN NOT NULL,
	direccion VARCHAR(100) NOT NULL,
    activo BOOLEAN DEFAULT 1,
	PRIMARY KEY (cod_cliente)
);
INSERT INTO cliente (lista_negra, direccion) VALUES (0, 'Calle 123, Ciudad A');
INSERT INTO cliente (lista_negra, direccion) VALUES (1, 'Avenida Principal, Ciudad B');
INSERT INTO cliente (lista_negra, direccion) VALUES (0, 'Calle Central, Ciudad C');
INSERT INTO cliente (lista_negra, direccion) VALUES (1, 'Calle 456, Ciudad A');
INSERT INTO cliente (lista_negra, direccion) VALUES (0, 'Avenida Norte, Ciudad D');
INSERT INTO cliente (lista_negra, direccion) VALUES (1, 'Calle 789, Ciudad B');
INSERT INTO cliente (lista_negra, direccion) VALUES (0, 'Avenida Sur, Ciudad C');
INSERT INTO cliente (lista_negra, direccion) VALUES (0, 'Calle 1011, Ciudad A');
INSERT INTO cliente (lista_negra, direccion) VALUES (1, 'Avenida Oeste, Ciudad D');
INSERT INTO cliente (lista_negra, direccion) VALUES (0, 'Calle 1213, Ciudad B');

create table IF NOT EXISTS telefono_cliente(
	cod_cliente INT,
	telefono VARCHAR(12) NOT NULL,
	PRIMARY KEY (cod_cliente, telefono),
    FOREIGN KEY (cod_cliente) REFERENCES cliente (cod_cliente)
);
INSERT INTO telefono_cliente (cod_cliente, telefono) VALUES (1, CONCAT('0', LPAD(FLOOR(RAND() * 1000000000), 8, '0')));
INSERT INTO telefono_cliente (cod_cliente, telefono) VALUES (2, CONCAT('0', LPAD(FLOOR(RAND() * 1000000000), 8, '0')));
INSERT INTO telefono_cliente (cod_cliente, telefono) VALUES (3, CONCAT('0', LPAD(FLOOR(RAND() * 1000000000), 8, '0')));
INSERT INTO telefono_cliente (cod_cliente, telefono) VALUES (4, CONCAT('0', LPAD(FLOOR(RAND() * 1000000000), 8, '0')));
INSERT INTO telefono_cliente (cod_cliente, telefono) VALUES (5, CONCAT('0', LPAD(FLOOR(RAND() * 1000000000), 8, '0')));
INSERT INTO telefono_cliente (cod_cliente, telefono) VALUES (6, CONCAT('0', LPAD(FLOOR(RAND() * 1000000000), 8, '0')));
INSERT INTO telefono_cliente (cod_cliente, telefono) VALUES (7, CONCAT('0', LPAD(FLOOR(RAND() * 1000000000), 8, '0')));
INSERT INTO telefono_cliente (cod_cliente, telefono) VALUES (8, CONCAT('0', LPAD(FLOOR(RAND() * 1000000000), 8, '0')));
INSERT INTO telefono_cliente (cod_cliente, telefono) VALUES (9, CONCAT('0', LPAD(FLOOR(RAND() * 1000000000), 8, '0')));
INSERT INTO telefono_cliente (cod_cliente, telefono) VALUES (10, CONCAT('0', LPAD(FLOOR(RAND() * 1000000000), 8, '0')));

create table IF NOT EXISTS empresa (
	cod_empresa INT AUTO_INCREMENT,
    cod_cliente INT UNIQUE,
	rut VARCHAR(12) NOT NULL UNIQUE,
	razon_social VARCHAR(70) NOT NULL,
	nombre_fantasia VARCHAR(70) NOT NULL,
	correo varchar(125) NOT NULL,
	encargado_de_pagos VARCHAR(70) NOT NULL,
	autorizado VARCHAR(70) NOT NULL,
	PRIMARY KEY (cod_empresa),
    FOREIGN KEY (cod_cliente) REFERENCES cliente (cod_cliente)
);
INSERT INTO empresa (cod_cliente, rut, razon_social, nombre_fantasia, correo, encargado_de_pagos, autorizado) VALUES (6, '1234567890', 'Empresa A', 'Fantasía A', 'correoA@example.com', 'Encargado A', 'Autorizado A');
INSERT INTO empresa (cod_cliente, rut, razon_social, nombre_fantasia, correo, encargado_de_pagos, autorizado) VALUES (7, '2345678901', 'Empresa B', 'Fantasía B', 'correoB@example.com', 'Encargado B', 'Autorizado B');
INSERT INTO empresa (cod_cliente, rut, razon_social, nombre_fantasia, correo, encargado_de_pagos, autorizado) VALUES (8, '3456789012', 'Empresa C', 'Fantasía C', 'correoC@example.com', 'Encargado C', 'Autorizado C');
INSERT INTO empresa (cod_cliente, rut, razon_social, nombre_fantasia, correo, encargado_de_pagos, autorizado) VALUES (9, '4567890123', 'Empresa D', 'Fantasía D', 'correoD@example.com', 'Encargado D', 'Autorizado D');
INSERT INTO empresa (cod_cliente, rut, razon_social, nombre_fantasia, correo, encargado_de_pagos, autorizado) VALUES (10, '5678901234', 'Empresa E', 'Fantasía E', 'correoE@example.com', 'Encargado E', 'Autorizado E');

create table IF NOT EXISTS particular(
	cod_particular INT AUTO_INCREMENT,
	cod_cliente INT UNIQUE,
	nombre VARCHAR(70) NOT NULL,
	apellido VARCHAR(70) NOT NULL,
	PRIMARY KEY (cod_particular),
    FOREIGN KEY (cod_cliente) REFERENCES cliente (cod_cliente)
);
INSERT INTO particular VALUES (0, 1, 'Bruno', 'Gómez');
INSERT INTO particular VALUES (0, 2, 'Hernán', 'Hernández');
INSERT INTO particular VALUES (0, 3, 'Bruno', 'Portanova');
INSERT INTO particular VALUES (0, 4, 'Rubén', 'Borges');
INSERT INTO particular VALUES (0, 5, 'Natalia', 'Torres');

create table IF NOT EXISTS forma_pago (
	cod_pago INT AUTO_INCREMENT,
	monto FLOAT NOT NULL,
    tiempo TIME,
	PRIMARY KEY (cod_pago)
);
INSERT INTO forma_pago values (0, '200', NULL);
INSERT INTO forma_pago values (0, '350', NULL);
INSERT INTO forma_pago values (0, '866', NULL);
INSERT INTO forma_pago values (0, '500', NULL);
INSERT INTO forma_pago values (0, '700', NULL);
INSERT INTO forma_pago values (0, '200', NULL);
INSERT INTO forma_pago values (0, '100', NULL);
INSERT INTO forma_pago values (0, '900', NULL);
INSERT INTO forma_pago values (0, '900', NULL);
INSERT INTO forma_pago values (0, '9000.50', NULL);

create table IF NOT EXISTS cuenta_corriente (
	cod_pago INT,
	numero_cuenta INT NOT NULL,
	PRIMARY KEY (cod_pago),
    FOREIGN KEY (cod_pago) REFERENCES forma_pago (cod_pago)
);
-- Cuenta_corriente PARTICULARES
INSERT INTO cuenta_corriente VALUES (1, 12345);
INSERT INTO cuenta_corriente VALUES (2, 67890);
INSERT INTO cuenta_corriente VALUES (3, 77420);

-- Cuenta_corriente EMPRESA 
INSERT INTO cuenta_corriente VALUES (6, 35190);
INSERT INTO cuenta_corriente VALUES (7, 35190);
INSERT INTO cuenta_corriente VALUES (8, 35190);

create table IF NOT EXISTS transferencia (
	cod_pago INT,
	numero_transferencia INT NOT NULL,
	PRIMARY KEY (cod_pago),
    FOREIGN KEY (cod_pago) REFERENCES forma_pago (cod_pago)
);
INSERT INTO transferencia VALUES (3, 1000);
INSERT INTO transferencia VALUES (4, 1001);

create table IF NOT EXISTS tarjeta (
	cod_pago INT,
	tipo_tarjeta ENUM('debito', 'credito'),
	PRIMARY KEY (cod_pago),
    FOREIGN KEY (cod_pago) REFERENCES forma_pago (cod_pago)
);
INSERT INTO tarjeta VALUES (5, 'debito');
INSERT INTO tarjeta VALUES (6, 'credito');
INSERT INTO tarjeta VALUES (7, 'debito');

create table IF NOT EXISTS contado (
	cod_pago int,
	monto varchar(7) NOT NULL,
	PRIMARY KEY (cod_pago)
);
INSERT INTO contado VALUES (8, 250);
INSERT INTO contado VALUES (9, 500);
INSERT INTO contado VALUES (10, 750);

create table IF NOT EXISTS maneja (
	cedula INT,
	matricula VARCHAR(7),
    PRIMARY KEY (cedula),
	FOREIGN KEY (cedula) REFERENCES chofer (cedula),
	FOREIGN KEY (matricula) REFERENCES coches (matricula)
);
INSERT INTO maneja VALUES ('12341234' , 'SRE6544');
INSERT INTO maneja VALUES ('12345678' , 'SRE4334');
INSERT INTO maneja VALUES ('23456789' , 'SRE5678');
INSERT INTO maneja VALUES ('34567890' , 'SRE6543');
INSERT INTO maneja VALUES ('45678901' , 'SRE6543');

create table IF NOT EXISTS necesitan (
	cod_mantenimiento INT,
	matricula VARCHAR(7) UNIQUE,
	fecha DATETIME,
    PRIMARY KEY (cod_mantenimiento, matricula),
    FOREIGN KEY (cod_mantenimiento) REFERENCES mantenimiento (cod_mantenimiento),
	FOREIGN KEY (matricula) REFERENCES coches (matricula)
);
INSERT INTO necesitan VALUES (1, 'SRE1234', fecha);
INSERT INTO necesitan VALUES (2, 'SRE3456', fecha);
INSERT INTO necesitan VALUES (3, 'SRE4321', fecha);
INSERT INTO necesitan VALUES (4, 'SRE4334', fecha);
INSERT INTO necesitan VALUES (5, 'SRE4565', fecha);

create table IF NOT EXISTS realizan (
	cod_servicio INT,
	cedula INT,
    PRIMARY KEY (cod_servicio, cedula),
	FOREIGN KEY (cod_servicio) REFERENCES servicio (cod_servicio),
	FOREIGN KEY (cedula) REFERENCES maneja (cedula)
);
INSERT INTO realizan VALUES (1, 12341234);
INSERT INTO realizan VALUES (2, 12345678);
INSERT INTO realizan VALUES (3, 23456789);
INSERT INTO realizan VALUES (4, 34567890);
INSERT INTO realizan VALUES (5, 45678901);

create table IF NOT EXISTS reserva (
	cod_cliente INT,
	cod_servicio INT,
    hora TIME NOT NULL,
	fecha DATE,
    PRIMARY KEY (cod_servicio),
	FOREIGN KEY (cod_cliente) REFERENCES cliente (cod_cliente),
	FOREIGN KEY (cod_servicio) REFERENCES servicio (cod_servicio)
);
INSERT INTO reserva (cod_cliente, cod_servicio, hora, fecha) VALUES (1, 1, '09:30:00', '2023-01-05');
INSERT INTO reserva (cod_cliente, cod_servicio, hora, fecha) VALUES (2, 2, '10:00:00', '2023-02-10');
INSERT INTO reserva (cod_cliente, cod_servicio, hora, fecha) VALUES (3, 3, '11:15:00', '2023-03-15');
INSERT INTO reserva (cod_cliente, cod_servicio, hora, fecha) VALUES (4, 4, '13:45:00', '2023-04-20');
INSERT INTO reserva (cod_cliente, cod_servicio, hora, fecha) VALUES (5, 5, '14:30:00', '2023-05-25');
INSERT INTO reserva (cod_cliente, cod_servicio, hora, fecha) VALUES (6, 6, '15:20:00', '2023-06-30');
INSERT INTO reserva (cod_cliente, cod_servicio, hora, fecha) VALUES (7, 7, '16:10:00', '2023-07-05');
INSERT INTO reserva (cod_cliente, cod_servicio, hora, fecha) VALUES (8, 8, '17:30:00', '2023-08-10');
INSERT INTO reserva (cod_cliente, cod_servicio, hora, fecha) VALUES (9, 9, '18:45:00', '2023-09-15');
INSERT INTO reserva (cod_cliente, cod_servicio, hora, fecha) VALUES (10, 10, '19:15:00', '2023-10-20');

create table IF NOT EXISTS pago_con (
	cod_servicio INT,
	cod_pago INT,
    PRIMARY KEY (cod_pago),
	FOREIGN KEY (cod_servicio) REFERENCES servicio (cod_servicio),
	FOREIGN KEY (cod_pago) REFERENCES forma_pago (cod_pago)
);
INSERT INTO pago_con VALUES (1, 1);
INSERT INTO pago_con VALUES (2, 2);
INSERT INTO pago_con VALUES (3, 3);
INSERT INTO pago_con VALUES (4, 4);
INSERT INTO pago_con VALUES (5, 5);
INSERT INTO pago_con VALUES (6, 6);
INSERT INTO pago_con VALUES (7, 7);
INSERT INTO pago_con VALUES (8, 8);
INSERT INTO pago_con VALUES (9, 9);
INSERT INTO pago_con VALUES (10, 10);

create table IF NOT EXISTS tiene (
	cod_cliente INT,
	cod_pago INT,
    PRIMARY KEY (cod_pago),
	FOREIGN KEY (cod_cliente) REFERENCES cliente (cod_cliente),
	FOREIGN KEY (cod_pago) REFERENCES cuenta_corriente (cod_pago)
);
INSERT INTO tiene VALUES (1, 1);
INSERT INTO tiene VALUES (2, 2);
INSERT INTO tiene VALUES (3, 3);
INSERT INTO tiene VALUES (6, 6);
INSERT INTO tiene VALUES (7, 7);
INSERT INTO tiene VALUES (8, 8);

create table IF NOT EXISTS administra (
	cedula INT,
    cod_servicio INT,
    PRIMARY KEY (cedula, cod_servicio),
    FOREIGN KEY (cedula) REFERENCES usuario (cedula),
    FOREIGN KEY (cod_servicio) REFERENCES servicio (cod_servicio)
);

-- ======================================== Consultas WEB ======================================================
-- Operadores:
SELECT * FROM usuario 
WHERE activo = 1;
    
    -- Filtro Operador: 
    SELECT cedula, nombre_usuario, fecha_ingreso FROM usuario
	WHERE rol_usuario = 'operador' 
    AND activo 
    AND cedula LIKE '$cedula'
    AND nombre_usuario LIKE '$nombre'
    AND fecha_ingreso LIKE '$fechaing';

-- Choferes:
SELECT 
	chofer.cedula, 
	nombre, 
	apellido, 
	telefono 
FROM chofer
JOIN tel_chofer ON tel_chofer.cedula = chofer.cedula
WHERE activo = 1;
    
    -- Filtro Chofer:
    SELECT 
		telefono, 
		nombre, 
        apellido, 
        chofer.cedula 
	FROM chofer 
	JOIN tel_chofer ON tel_chofer.cedula = chofer.cedula 
    WHERE activo = 1
    AND telefono LIKE '$telefono%'
    AND nombre LIKE '$nombre%'
    AND apellido LIKE '$apellido'
    AND chofer.cedula LIKE '$cedula';
    
-- Coches:
SELECT 
	matricula, 
	modelo, 
	marca, 
	año 
FROM coches 
WHERE activo = 1;
    
    -- Filtro Coche:
    SELECT matricula, marca, modelo, año FROM coches 
    WHERE activo = 1
    AND matricula LIKE '$matricula'
    AND marca LIKE '$marca'
    AND modelo LIKE '$modelo'
    AND año LIKE '$año';

-- Asignaciones:
SELECT 
	c.nombre AS chofer_nombre, 
	co.matricula, 
	c.cedula
FROM chofer c 
JOIN maneja m ON m.cedula = c.cedula
JOIN coches co ON co.matricula = m.matricula
JOIN tel_chofer t ON t.cedula = c.cedula;
    
    -- Filtro Asignación:
    SELECT 
		maneja.cedula, 
        nombre, 
        matricula 
	FROM maneja
	JOIN chofer ON chofer.cedula = maneja.cedula
	WHERE maneja.cedula LIKE '$cedula%'
    AND nombre LIKE '$chofer%'
    AND matricula LIKE '$matricula%';

-- Particulares: 
SELECT 
	particular.cod_cliente AS nro_particular, 
	telefono, 
	nombre, 
	apellido, 
	direccion, 
	lista_negra 
FROM particular
JOIN cliente on cliente.cod_cliente = particular.cod_cliente
JOIN telefono_cliente on telefono_cliente.cod_cliente = particular.cod_cliente
WHERE activo = 1;

	-- Filtro Particular:
    SELECT 
		particular.cod_cliente as nro_particular, 
		telefono, 
        nombre, 
        apellido, 
        direccion, 
        lista_negra 
	FROM particular
	JOIN cliente on cliente.cod_cliente = particular.cod_cliente
	JOIN telefono_cliente on telefono_cliente.cod_cliente = particular.cod_cliente
	WHERE activo = 1
    AND particular.cod_cliente LIKE '$cliente'
    AND telefono LIKE '$telefono'
    AND nombre LIKE '$nombre'
    AND apellido LIKE '$apellido'
    AND direccion LIKE '$direccion';

-- Empresas:
SELECT 
	empresa.cod_cliente, 
	telefono, 
	empresa.cod_cliente AS nro_empresa, 
	rut, razon_social, 
	nombre_fantasia, 
	correo, 
	encargado_de_pagos, 
	autorizado, 
	activo, 
	direccion, 
	lista_negra 
FROM empresa
JOIN cliente ON cliente.cod_cliente = empresa.cod_cliente
JOIN telefono_cliente ON telefono_cliente.cod_cliente = empresa.cod_cliente
WHERE activo = 1;

	-- Filtro Empresa
    SELECT 
		empresa.cod_cliente, 
        telefono, 
        empresa.cod_cliente as nro_empresa, 
        rut, 
        razon_social, 
        nombre_fantasia, 
        correo, 
        encargado_de_pagos, 
        autorizado, 
        activo, 
        direccion, 
        lista_negra 
	FROM empresa
	JOIN cliente on cliente.cod_cliente = empresa.cod_cliente
	JOIN telefono_cliente on telefono_cliente.cod_cliente = empresa.cod_cliente
	WHERE activo = 1
    AND empresa.cod_cliente LIKE '$cliente%'
    AND rut LIKE '$rut%'
    AND nombre_fantasia LIKE '$nombre%'
    AND correo LIKE '$correo%'
    AND direccion LIKE '$direccion%'
    AND razon_social LIKE '$razonsocial%'
    AND encargado_de_pagos LIKE '$encargado%'
    AND autorizado LIKE '$autorizado%'
    AND telefono LIKE '$telefono%'
    AND lista_negra = 0 or 1;

-- Reservas:
SELECT 
	Re.cod_servicio AS cod_servicio,
	Re.cod_cliente AS cod_cliente, 
	Rea.cedula AS cedula_chofer, 
	Ch.nombre AS chofer_nombre, origen, 
	Se.fecha AS fecha_viaje, 
	Re.fecha AS fecha_reserva, destino, 
	Re.hora AS hora_reserva, 
	Se.hora AS hora_servicio, 
	comentario, 
	nombre_pasajero, 
	apellido_pasajero, 
	F.monto, 
	F.cod_pago 
FROM servicio Se
JOIN reserva Re ON Re.cod_servicio = Se.cod_servicio
JOIN cliente Cli ON Cli.cod_cliente = Re.cod_cliente
JOIN realizan Rea ON Rea.cod_servicio = Se.cod_servicio
JOIN chofer Ch ON Ch.cedula = Rea.cedula
JOIN pago_con Pc ON Pc.cod_servicio = Se.cod_servicio
JOIN forma_pago F ON F.cod_pago = Pc.cod_pago
WHERE Se.activo = 1;

	-- Filtro Reserva:
    SELECT 
		Re.cod_servicio AS cod_servicio,
		Re.cod_cliente AS cod_cliente, 
		Rea.cedula AS cedula_chofer, 
		Ch.nombre AS chofer_nombre, origen, 
		Se.fecha AS fecha_viaje, 
		Re.fecha AS fecha_reserva, destino, 
		Re.hora AS hora_reserva, 
		Se.hora AS hora_servicio, 
		comentario, 
        nombre_pasajero, 
        apellido_pasajero, 
        Se.monto, 
        F.cod_pago 
	FROM servicio Se
	JOIN reserva Re ON Re.cod_servicio = Se.cod_servicio
	JOIN cliente Cli ON Cli.cod_cliente = Re.cod_cliente
	JOIN realizan Rea ON Rea.cod_servicio = Se.cod_servicio
	JOIN chofer Ch ON Ch.cedula = Rea.cedula
	JOIN pago_con Pc ON Pc.cod_servicio = Se.cod_servicio
	JOIN forma_pago F ON F.cod_pago = Pc.cod_pago
	WHERE Se.activo = 1
    AND Re.cod_cliente LIKE '$cliente%'
    AND nombre_pasajero LIKE '$nombre%'
    AND apellido_pasajero LIKE '$apellido%'
    AND origen LIKE '$origen%'
    AND destino LIKE '$destino%'
    AND Rea.cedula LIKE '$cedulaChofe%'
    AND Ch.nombre LIKE '$chofer%'
    AND Re.fecha LIKE '$fechaReserva%'
    AND Re.hora LIKE '$horaReserva%'
    AND comentario LIKE '$comentario%'
    AND Se.monto LIKE '$monto%'
    AND Re.cod_servicio LIKE '$codServicio%';

-- Mantenimiento:
SELECT 
	mantenimiento.cod_mantenimiento, 
	matricula, 
	tipo_mantenimiento, 
	gastos_mantenimiento, 
	comentarios, 
	taller, 
	fecha 
FROM mantenimiento
JOIN necesitan ON necesitan.cod_mantenimiento = mantenimiento.cod_mantenimiento
WHERE activo = 1;

	-- Filtro Mantenimiento:
    SELECT 
		mantenimiento.cod_mantenimiento, 
        matricula, 
        tipo_mantenimiento, 
        gastos_mantenimiento, 
        comentarios, 
        taller, 
        fecha 
	FROM mantenimiento
	JOIN necesitan ON necesitan.cod_mantenimiento = mantenimiento.cod_mantenimiento 
    WHERE activo = 1
    AND mantenimiento.cod_mantenimiento LIKE '$codigo%'
    AND matricula LIKE '$matricula%'
    AND tipo_mantenimiento LIKE '$concepto%'
    AND comentarios LIKE '$comentario%'
    AND taller LIKE '$taller%'
    AND fecha LIKE '$fecha%';

-- ======================================== SEGUNDA ENTREGA ======================================================
-- 1) Facturación por auto:
SELECT 
	Ma.matricula, 
	SUM(Se.monto) AS facturacionCoche 
FROM servicio Se
JOIN realizan Re ON Re.cod_servicio = Se.cod_servicio
JOIN maneja Ma ON Ma.cedula = Re.cedula
JOIN coches Co ON Co.matricula = Ma.matricula
GROUP BY Ma.matricula;

-- 2) Facturación por chofer
SELECT 
	Ch.nombre, 
	SUM(Se.monto) AS facturacionCoche 
FROM servicio Se
JOIN realizan Re ON Re.cod_servicio = Se.cod_servicio
JOIN maneja Ma ON Ma.cedula = Re.cedula
JOIN chofer Ch ON Ch.cedula = Ma.cedula
GROUP BY Ch.nombre;

-- 3) Datos de los viajes de un cliente determinado
SELECT * FROM servicio s
JOIN reserva r ON r.cod_servicio = s.cod_servicio
JOIN cliente c ON c.cod_cliente = r.cod_cliente 
WHERE c.cod_cliente = '3';

-- 4) Datos de un viaje determinado
SELECT * FROM servicio s
WHERE s.cod_servicio = '3';

-- 5)  Datos de los últimos 5 viajes realizados
SELECT * FROM servicio
ORDER BY fecha DESC
LIMIT 5;

-- 6) Búsqueda de viajes por fecha
SELECT * FROM servicio
WHERE fecha = '2023-09-24';

-- 7) Consultas realizadas para hacer un login efectivo
SELECT * FROM usuario
WHERE nombre_usuario = 'root' AND contrasena = 'root';

-- 8) Total de facturación diario, mensual y anual. 
	-- Diario : 
	SELECT SUM(s.monto) FROM servicio s 
	WHERE fecha = 'Fecha que deseo ver';

	-- Mensual :
	SELECT SUM(s.monto) FROM servicio s 
	WHERE MONTH(fecha) = 'Mes que deseo ver'
	GROUP BY MONTH(Fecha);

	-- Anual : 
	SELECT SUM(s.monto) FROM servicio s 
	WHERE YEAR(fecha) = 'Año que deseo ver'
	GROUP BY YEAR(Fecha);

-- 9) Cantidad de viajes realizados por cada chofer entre dos fechas.
SELECT 
	c.cedula, 
	COUNT(s.cod_servicio) 
FROM servicio s
JOIN realizan r ON r.cod_servicio = s.cod_servicio
JOIN maneja m ON m.cedula = r.cedula
JOIN chofer c ON c.cedula = m.cedula
WHERE s.fecha BETWEEN '2023-09-24' AND '2023-12-30'
GROUP BY c.cedula;

-- ============================================= TERCER ENTREGA =======================================================
-- Una vista a elección debidamente fundamentada.
CREATE VIEW vistaMantenimiento AS 
SELECT
	c.matricula,
	c. modelo, 
	m. cod_mantenimiento,
	m. gastos_mantenimiento,
	m.activo AS mantenimiento_activo,
	c.activo AS coche_activo 
FROM coches c
JOIN mantenimiento m ON c.matricula; 

-- Una subconsulta que obtenga información pertinente a la trazabilidad de los viajes de un cliente determinado.
SELECT * FROM servicio
WHERE nombre_pasajero = ( SELECT nombre_pasajero FROM servicio WHERE nombre_pasajero = 'Ruben' group by nombre_pasajero);

--  Una subconsulta que obtenga información pertinente a la trazabilidad de los viajes de un chofer determinado.
SELECT 
	s.cod_servicio,
	s.origen,
	s.destino,
	s.fecha,
	s.hora,
	s.comentario,
	s.nombre_chofer,
	s.nombre_pasajero,
	s.apellido_pasajero, 
	s.activo 
FROM servicio s
WHERE nombre_chofer = ( SELECT nombre_chofer FROM servicio WHERE nombre_chofer = 'Bruno' group by nombre_chofer);