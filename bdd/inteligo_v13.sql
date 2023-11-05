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
	PRIMARY KEY (cod_servicio)
);
INSERT INTO servicio VALUES (0, 'Carlos de la Vega', '18 de Julio', '2023-09-15','14:00:00','sc', 'Ruben', 'Gomez', 1); 
INSERT INTO servicio VALUES (0, 'Avenida Libertad', 'Plaza Independencia', '2023-09-16', '15:00:00','viaje de negocios', 'Laura', 'Fernández', 1);
INSERT INTO servicio VALUES (0, 'Estación Central', 'Terminal Tres Cruces', '2023-09-17', '15:00:00','viaje de compras', 'Pablo', 'Martínez', 1);
INSERT INTO servicio VALUES (0, 'Parque Rodó', 'Pocitos', '2023-09-18',' 18:40:00','paseo familiar', 'Ana', 'López', 1);
INSERT INTO servicio VALUES (0, 'Carrasco', 'Canelones', '2023-09-19', '13:00:00', 'viaje de vacaciones', 'Diego', 'Rodríguez', 1);
INSERT INTO servicio VALUES (0, 'Palermo', 'Parque Batlle', '2023-09-20', '11:00:00', 'cita médica', 'María', 'Pérez', 1);
INSERT INTO servicio VALUES (0, 'Tres Cruces', 'Cerro', '2023-09-21', '15:00:00','viaje de estudios', 'Javier', 'Hernández', 1);
INSERT INTO servicio VALUES (0, 'Ciudad Vieja', 'Punta Carretas', '2023-09-22', '20:00:00','paseo turístico', 'Elena', 'García', 1);
INSERT INTO servicio VALUES (0, 'Buceo', 'Malvín', '2023-09-23', '19:40:00', 'visita a amigos', 'Luis', 'Silva', 1);
INSERT INTO servicio VALUES (0, 'Barrio Sur', 'La Comercial', '2023-09-24', '17:40:00','compras', 'Carolina', 'Gutiérrez', 1);

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
insert into forma_pago values (0, '200', NULL);
insert into forma_pago values (0, '350', NULL);
insert into forma_pago values (0, '866', NULL);
insert into forma_pago values (0, '500', NULL);
insert into forma_pago values (0, '700', NULL);
insert into forma_pago values (0, '200', NULL);
insert into forma_pago values (0, '100', NULL);
insert into forma_pago values (0, '900', NULL);
insert into forma_pago values (0, '900', NULL);
insert into forma_pago values (0, '9000.50', NULL);

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
insert into maneja VALUES ('12341234' , 'SRE6544');
insert into maneja VALUES ('12345678' , 'SRE4334');
insert into maneja VALUES ('23456789' , 'SRE5678');
insert into maneja VALUES ('34567890' , 'SRE6543');
insert into maneja VALUES ('45678901' , 'SRE6543');

create table IF NOT EXISTS necesitan (
	cod_mantenimiento INT,
	matricula VARCHAR(7) UNIQUE,
	fecha DATE,
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