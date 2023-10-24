drop database IntelisoftBDD;
create database IntelisoftBDD;
use IntelisoftBDD;
show tables;

create table IF NOT EXISTS chofer(
	ci int,
	nombre varchar (10) NOT NULL,
    activo boolean,
	PRIMARY KEY (ci)
);
select * from chofer;
insert into chofer (`ci`, `nombre` ) values ('5474783' , 'Hernan');
insert into chofer (`ci`, `nombre` ) values ('5467466' , 'Fernando');
insert into chofer (`ci`, `nombre` ) values ('5566533' , 'Franco');
INSERT INTO chofer (`ci`, `nombre`) VALUES ('1234567', 'Juan');
INSERT INTO chofer (`ci`, `nombre`) VALUES ('9876543', 'Ana');
INSERT INTO chofer (`ci`, `nombre`) VALUES ('5678901', 'Pedro');
INSERT INTO chofer (`ci`, `nombre`) VALUES ('3456789', 'María');
INSERT INTO chofer (`ci`, `nombre`) VALUES ('8765432', 'Luis');
INSERT INTO chofer (`ci`, `nombre`) VALUES ('2345678', 'Laura');
INSERT INTO chofer (`ci`, `nombre`) VALUES ('7890123', 'Carlos');

create table IF NOT EXISTS tel_chofer(
	ci int,
	telefono varchar(12) NOT NULL,
	PRIMARY KEY (ci, telefono),
    FOREIGN KEY (ci) REFERENCES chofer (ci)
);
select * from tel_chofer;
insert into tel_chofer (`ci`, `telefono` ) values ('5474783' , '099223644');
insert into tel_chofer (`ci`, `telefono` ) values ('5467466' , '092456454');
insert into tel_chofer (`ci`, `telefono` ) values ('5566533' , '099476354');
INSERT INTO tel_chofer (`ci`, `telefono`) VALUES ('1234567', '099476354');
INSERT INTO tel_chofer (`ci`, `telefono`) VALUES ('9876543', '088765432');
INSERT INTO tel_chofer (`ci`, `telefono`) VALUES ('5678901', '091234567');
INSERT INTO tel_chofer (`ci`, `telefono`) VALUES ('3456789', '097654321');
INSERT INTO tel_chofer (`ci`, `telefono`) VALUES ('8765432', '094321678');
INSERT INTO tel_chofer (`ci`, `telefono`) VALUES ('2345678', '086543219');
INSERT INTO tel_chofer (`ci`, `telefono`) VALUES ('7890123', '090123456');

INSERT INTO chofer VALUES ('31232312', 'qweqw', 1);
INSERT INTO coches VALUES ('qweqwew', 'qweqwe','qweqwe','1233');
select * from chofer;

create table IF NOT EXISTS coches(
	matricula varchar (7),
	modelo varchar (20) NOT NULL,
	marca varchar (20) NOT NULL,
	año year NOT NULL,
	PRIMARY KEY (matricula)
);
select * from coches;
insert into coches (`matricula`, `marca` , `modelo` , `año` ) values ('SRE4565' , 'Nissan','Sentra', '2017');
insert into coches (`matricula`, `marca` , `modelo`, `año` ) values ('SRE6544' , 'Nissan','Sentra', '2018');
insert into coches (`matricula`, `marca`, `modelo` , `año` ) values ('SRE4334' , 'Nissan', 'Sentra', '2018');
INSERT INTO coches (`matricula`, `marca`, `modelo`, `año`) VALUES ('SRE1234', 'Toyota', 'Corolla', '2019');
INSERT INTO coches (`matricula`, `marca`, `modelo`, `año`) VALUES ('SRE5678', 'Nissan', 'Sentra', '2020');
INSERT INTO coches (`matricula`, `marca`, `modelo`, `año`) VALUES ('SRE4321', 'Toyota', 'Camry', '2021');
INSERT INTO coches (`matricula`, `marca`, `modelo`, `año`) VALUES ('SRE7890', 'Nissan', 'Altima', '2021');
INSERT INTO coches (`matricula`, `marca`, `modelo`, `año`) VALUES ('SRE6543', 'Toyota', 'RAV4', '2018');
INSERT INTO coches (`matricula`, `marca`, `modelo`, `año`) VALUES ('SRE9876', 'Nissan', 'Maxima', '2019');
INSERT INTO coches (`matricula`, `marca`, `modelo`, `año`) VALUES ('SRE3456', 'Toyota', 'Corolla', '2022');

create table IF NOT EXISTS mantenimiento(
	cod_mantenimiento int,
	tipo_mantenimiento varchar (20) NOT NULL,
	gastos_mantenimiento int NOT NULL,
	comentarios varchar (50),
	taller varchar (40) NOT NULL,
	activo boolean NOT NULL,
	primary key (cod_mantenimiento)
);
select * from mantenimiento;
insert into mantenimiento (`cod_mantenimiento` , `tipo_mantenimiento` , `gastos_mantenimiento`, `comentarios`, `taller` , `activo` ) values ('44543' , 'cambio de aceite', '500', 'cambiado con exito', 'Service Toyota' , '1' );
insert into mantenimiento (`cod_mantenimiento` , `tipo_mantenimiento` , `gastos_mantenimiento`, `comentarios` , `taller`, `activo`) values ('76544'  , 'pintura', '2000', 'pintura', 'Service Toyota' , '1'  );
insert into mantenimiento (`cod_mantenimiento` , `tipo_mantenimiento` , `gastos_mantenimiento`, `comentarios`, `taller`, `activo` ) values ('65455'  , 'aspiracion', '200', 'aspirado', 'Service Toyota' , '0'  );
INSERT INTO mantenimiento (`cod_mantenimiento`, `tipo_mantenimiento`, `gastos_mantenimiento`, `comentarios`, `taller`, `activo`) VALUES ('7654' , 'cambio de frenos', '800', 'frenos nuevos', 'Service Toyota' , '1' );
INSERT INTO mantenimiento (`cod_mantenimiento`, `tipo_mantenimiento`, `gastos_mantenimiento`, `comentarios`, `taller`, `activo`) VALUES ('65433' , 'reparación de motor', '1500', 'motor reparado', 'Service Toyota' , '1' );
INSERT INTO mantenimiento (`cod_mantenimiento`, `tipo_mantenimiento`, `gastos_mantenimiento`, `comentarios`, `taller`, `activo`) VALUES ('87654' , 'cambio de neumáticos', '600', 'neumáticos nuevos', 'Service Toyota' , '1' );
INSERT INTO mantenimiento (`cod_mantenimiento`, `tipo_mantenimiento`, `gastos_mantenimiento`, `comentarios`, `taller`, `activo`) VALUES ('65333' , 'lavado exterior', '50', 'auto lavado', 'Service Toyota' , '0' );
INSERT INTO mantenimiento (`cod_mantenimiento`, `tipo_mantenimiento`, `gastos_mantenimiento`, `comentarios`, `taller`, `activo`) VALUES ('245666' , 'alineacion', '120', 'alineado y balanceado', 'Service Toyota' , '1' );
INSERT INTO mantenimiento (`cod_mantenimiento`, `tipo_mantenimiento`, `gastos_mantenimiento`, `comentarios`, `taller`, `activo`) VALUES ('75444' , 'parabrisas', '400', 'parabrisas nuevo', 'Service Toyota' , '1' );
INSERT INTO mantenimiento (`cod_mantenimiento`, `tipo_mantenimiento`, `gastos_mantenimiento`, `comentarios`, `taller`, `activo`) VALUES ('64333' , 'revisión general', '300', 'revisión completa', 'Service Toyota' , '0' );

create table IF NOT EXISTS servicio(
	cod_servicio int auto_increment,
	origen varchar(20) NOT NULL,
	destino varchar(20) NOT NULL,
	fecha_servicio date  NOT NULL,
	hora_inicio time NOT NULL,
	hora_reserva time NOT NULL,
	distancia_recorrida varchar (10) NOT NULL,
	comentario varchar(100) NOT NULL,
	nombre_pasajero varchar(20) NOT NULL,
	apellido_pasajero varchar(20) NOT NULL,
	primary key (cod_servicio)
);
select * from servicio;
insert into servicio (`origen`, `destino`, `fecha_servicio`,`hora_inicio` ,`hora_reserva` , `distancia_recorrida` , `comentario`, `nombre_pasajero` , `apellido_pasajero`) values ('Carlos de la Vega', '18 de Julio', '2023-09-15','15:00:00' ,'14:00:00' , '200km', 'sc', 'Ruben', 'Gomez'  ); 
INSERT INTO servicio (`origen`, `destino`, `fecha_servicio`, `hora_inicio`,`hora_reserva`, `distancia_recorrida`, `comentario`, `nombre_pasajero`, `apellido_pasajero`) VALUES ('Avenida Libertad', 'Plaza Independencia', '2023-09-16', '14:30:00','15:00:00' , '15km', 'viaje de negocios', 'Laura', 'Fernández');
INSERT INTO servicio (`origen`, `destino`, `fecha_servicio`, `hora_inicio`,`hora_reserva` , `distancia_recorrida`, `comentario`, `nombre_pasajero`, `apellido_pasajero`) VALUES ('Estación Central', 'Terminal Tres Cruces', '2023-09-17', '12:00:00','15:00:00' , '8km', 'viaje de compras', 'Pablo', 'Martínez');
INSERT INTO servicio (`origen`, `destino`, `fecha_servicio`, `hora_inicio`, `hora_reserva` ,`distancia_recorrida`, `comentario`, `nombre_pasajero`, `apellido_pasajero`) VALUES ('Parque Rodó', 'Pocitos', '2023-09-18', '16:45:00','18:40:00' , '5km', 'paseo familiar', 'Ana', 'López');
INSERT INTO servicio (`origen`, `destino`, `fecha_servicio`, `hora_inicio`, `hora_reserva` ,`distancia_recorrida`, `comentario`, `nombre_pasajero`, `apellido_pasajero`) VALUES ('Carrasco', 'Canelones', '2023-09-19', '10:30:00','13:00:00' , '25km', 'viaje de vacaciones', 'Diego', 'Rodríguez');
INSERT INTO servicio (`origen`, `destino`, `fecha_servicio`, `hora_inicio`, `hora_reserva` ,`distancia_recorrida`, `comentario`, `nombre_pasajero`, `apellido_pasajero`) VALUES ('Palermo', 'Parque Batlle', '2023-09-20', '08:15:00','11:00:00' , '10km', 'cita médica', 'María', 'Pérez');
INSERT INTO servicio (`origen`, `destino`, `fecha_servicio`, `hora_inicio`, `hora_reserva` ,`distancia_recorrida`, `comentario`, `nombre_pasajero`, `apellido_pasajero`) VALUES ('Tres Cruces', 'Cerro', '2023-09-21', '11:20:00', '15:00:00' ,'12km', 'viaje de estudios', 'Javier', 'Hernández');
INSERT INTO servicio (`origen`, `destino`, `fecha_servicio`, `hora_inicio`, `hora_reserva` ,`distancia_recorrida`, `comentario`, `nombre_pasajero`, `apellido_pasajero`) VALUES ('Ciudad Vieja', 'Punta Carretas', '2023-09-22', '17:00:00', '20:00:00' ,'7km', 'paseo turístico', 'Elena', 'García');
INSERT INTO servicio (`origen`, `destino`, `fecha_servicio`, `hora_inicio`, `hora_reserva` ,`distancia_recorrida`, `comentario`, `nombre_pasajero`, `apellido_pasajero`) VALUES ('Buceo', 'Malvín', '2023-09-23', '13:40:00','19:40:00' , '9km', 'visita a amigos', 'Luis', 'Silva');
INSERT INTO servicio (`origen`, `destino`, `fecha_servicio`, `hora_inicio`, `hora_reserva` ,`distancia_recorrida`, `comentario`, `nombre_pasajero`, `apellido_pasajero`) VALUES ('Barrio Sur', 'La Comercial', '2023-09-24', '15:15:00','17:40:00' , '6km', 'compras', 'Carolina', 'Gutiérrez');

create table IF NOT EXISTS usuario (
	ci_usuario int,
	nombre_usuario varchar (10) NOT NULL,
	contraseña varchar (10) NOT NULL,
	rol_usuario ENUM('administrador', 'operador'),
	fecha_ingreso date,
    activo tinyint(1) NOT NULL DEFAULT '1',
	PRIMARY KEY (ci_usuario)
);
insert into usuario (ci_usuario, nombre_usuario, contraseña, rol_usuario, activo) VALUES (1, 'root', 'root', 'administrador', 1);
insert into usuario (ci_usuario, nombre_usuario, contraseña, rol_usuario, activo) VALUES (2, 'operador', 'operador', 'operador', 1);
insert into usuario (ci_usuario, nombre_usuario, contraseña, rol_usuario, activo) VALUES (3, 'prueba', 'prueba', 'operador', 0);
insert into usuario (`ci_usuario` , `nombre_usuario` , `contraseña`, `rol_usuario` , `fecha_ingreso` ) values ('5654855' , 'Enrique', 'Enriquee' , 'administrador', '2020-06-26');
insert into usuario (`ci_usuario` , `nombre_usuario` , `contraseña`, `rol_usuario` , `fecha_ingreso` ) values ('5466455' , 'Juan', 'juann' , 'operador', '2022-08-16');
insert into usuario (`ci_usuario` , `nombre_usuario` , `contraseña`, `rol_usuario` , `fecha_ingreso` ) values ('5655355' , 'Sebastian', 'seba' , 'administrador', '2021-11-12');
INSERT INTO usuario (`ci_usuario`, `nombre_usuario`, `contraseña`, `rol_usuario`, `fecha_ingreso`) VALUES ('5544566', 'Ana', 'ana123', 'operador', '2022-09-20');
INSERT INTO usuario (`ci_usuario`, `nombre_usuario`, `contraseña`, `rol_usuario`, `fecha_ingreso`) VALUES ('5666557', 'María', 'maria456', 'administrador', '2021-07-14');
INSERT INTO usuario (`ci_usuario`, `nombre_usuario`, `contraseña`, `rol_usuario`, `fecha_ingreso`) VALUES ('5657658', 'Pedro', 'pedro789', 'operador', '2023-05-30');
INSERT INTO usuario (`ci_usuario`, `nombre_usuario`, `contraseña`, `rol_usuario`, `fecha_ingreso`) VALUES ('5568459', 'Luis', 'luis2023', 'administrador', '2020-10-05');
INSERT INTO usuario (`ci_usuario`, `nombre_usuario`, `contraseña`, `rol_usuario`, `fecha_ingreso`) VALUES ('5687660', 'Carolina', 'caro456', 'operador', '2021-12-18');
INSERT INTO usuario (`ci_usuario`, `nombre_usuario`, `contraseña`, `rol_usuario`, `fecha_ingreso`) VALUES ('5654761', 'Manuel', 'manuel01', 'administrador', '2022-04-02');
INSERT INTO usuario (`ci_usuario`, `nombre_usuario`, `contraseña`, `rol_usuario`, `fecha_ingreso`) VALUES ('5678962', 'Marta', 'marta1234', 'operador', '2023-03-15');

create table IF NOT EXISTS cliente (
	cod_cliente int auto_increment,
	lista_negra boolean NOT NULL,
	direccion varchar(50) NOT NULL,
	PRIMARY KEY (cod_cliente)
);
select * from cliente;
insert into cliente (`lista_negra` , `direccion` ) values ('1', 'requena');
insert into cliente (`lista_negra` , `direccion` ) values ('0', 'agraciada');
insert into cliente (`lista_negra` , `direccion` ) values ('0', 'tres cruces');
insert into cliente (`lista_negra` , `direccion` ) values ('0', 'costa urbana');
insert into cliente (`lista_negra` , `direccion` ) values ('0', 'solymar');
insert into cliente (`lista_negra` , `direccion` ) values ('0', 'tres cruces');

-- INSERT INTO cliente (lista_negra, calle, esquina) VALUES (0, 'Calle A', 'Esquina 1');
-- INSERT INTO cliente (lista_negra, calle, esquina) VALUES (1, 'Calle B', 'Esquina 2');
-- INSERT INTO cliente (lista_negra, calle, esquina) VALUES (0, 'Calle C', 'Esquina 3');
-- INSERT INTO cliente (lista_negra, calle, esquina) VALUES (1, 'Calle D', 'Esquina 4');
-- INSERT INTO cliente (lista_negra, calle, esquina) VALUES (0, 'Calle E', 'Esquina 5');


create table IF NOT EXISTS telefono_cliente(
	cod_cliente int,
	telefono varchar(12) NOT NULL,
	PRIMARY KEY (cod_cliente, telefono),
    FOREIGN KEY (cod_cliente) REFERENCES cliente (cod_cliente)
);
select * from telefono_cliente;
-- insert into telefono_cliente (`telefono`) values ('099365858');
-- insert into telefono_cliente (`telefono`) values ('092476946');
-- insert into telefono_cliente (`telefono`) values ('091537596');
-- insert into telefono_cliente (`telefono`) values ('092467459');
-- insert into telefono_cliente (`telefono`) values ('099476946');
-- insert into telefono_cliente (`telefono`) values ('091587596');

create table IF NOT EXISTS empresa (
	cod_cliente int,
	rut varchar(12) NOT NULL,
	razon_social varchar(50) NOT NULL,
	nombre_fantasia varchar(50) NOT NULL,
	correo varchar(30) NOT NULL,
	encargado_de_pagos varchar(30),
	autorizado varchar(30),
    activo boolean,
	PRIMARY KEY (cod_cliente, rut),
    FOREIGN KEY (cod_cliente) REFERENCES cliente (cod_cliente)
);
-- insert into empresa (`rut`, `razon_social`, `nombre_fantasia`, `Email`, `encargado_de_pagos` , `autorizado`) values ('7564534' , 'Ac', 'BA', 'BA@gmail.com', 'Bruno', 'Petter');
-- insert into empresa (`rut`, `razon_social`, `nombre_fantasia`, `Email`, `encargado_de_pagos` , `autorizado`) values ('86756454' , 'BC', 'DE', 'DE@gmail.com', 'Fernando', 'Petter');
-- insert into empresa (`rut`, `razon_social`, `nombre_fantasia`, `Email` , `encargado_de_pagos` , `autorizado`) values ('34465577' , 'CW', 'HG', 'HG@gmail.com', 'Bruno', 'Petter');

create table IF NOT EXISTS particular(
	cod_cliente int,
	nombre varchar (20) NOT NULL,
	apellido varchar (20) NOT NULL,
	PRIMARY KEY (cod_cliente),
    FOREIGN KEY (cod_cliente) REFERENCES cliente (cod_cliente)
);
select * from particular;
-- insert into particular (`cod_cliente` , `nombre` , `apellido` ) values (cod_cliente , 'Hernan', 'Gomez');
-- insert into particular (`cod_cliente` , `nombre` , `apellido` ) values (cod_cliente, 'Dario', 'Hernandez');
-- insert into particular (`cod_cliente` , `nombre` , `apellido` ) values (cod_cliente , 'Natalia', 'Torres');

create table IF NOT EXISTS forma_pago(
	cod_pago int auto_increment,
	monto_viaje bigint NOT NULL,
	PRIMARY KEY (cod_pago)
);
select * from forma_pago;
insert into forma_pago (`monto_viaje`) values ('200');
insert into forma_pago (`monto_viaje`) values ('350');
insert into forma_pago (`monto_viaje`) values ('866');
insert into forma_pago (`monto_viaje`) values ('500');
insert into forma_pago (`monto_viaje`) values ('700');
insert into forma_pago (`monto_viaje`) values ('200');
insert into forma_pago (`monto_viaje`) values ('100');
insert into forma_pago (`monto_viaje`) values ('900');
insert into forma_pago (`monto_viaje`) values ('900');
insert into forma_pago (`monto_viaje`) values ('900');

create table IF NOT EXISTS cuenta_corriente(
	cod_pago int,
	numero_cuenta int NOT NULL,
	PRIMARY KEY (cod_pago),
    FOREIGN KEY (cod_pago) REFERENCES forma_pago (cod_pago)
);
select * from cuenta_corriente;
-- insert into cuenta_corriente (`numero_cuenta`) values ('6546474');
-- insert into cuenta_corriente (`numero_cuenta`) values ('6455555');
-- insert into cuenta_corriente (`numero_cuenta`) values ('57645455');

create table IF NOT EXISTS transferencia(
	cod_pago int,
	numero_transferencia int NOT NULL,
	PRIMARY KEY (cod_pago),
    FOREIGN KEY (cod_pago) REFERENCES forma_pago (cod_pago)
);
select * from transferencia;
-- insert into transferencia ( `numero_transferencia`  ) values ('545885');
-- insert into transferencia (`numero_transferencia`  ) values ('687563');
-- insert into transferencia (`numero_transferencia`  ) values ('566685');

create table IF NOT EXISTS tarjeta(
	cod_pago int,
	tipo_tarjeta ENUM('debito', 'credito'),
	PRIMARY KEY (cod_pago),
    FOREIGN KEY (cod_pago) REFERENCES forma_pago (cod_pago)
);
select * from tarjeta;
-- insert into tarjeta (`tipo_tarjeta`) values ('debito');
-- insert into tarjeta (`tipo_tarjeta`) values ('credito');

create table IF NOT EXISTS contado(
	cod_pago int,
	monto varchar(5) NOT NULL,
	PRIMARY KEY (cod_pago)
);
select * from contado;
-- insert into contado (`monto`) values ('200');
-- insert into contado (`monto`) values ('300');

create table IF NOT EXISTS maneja (
	ci int,
	matricula varchar(7),
    primary key (ci, matricula),
	foreign key (ci) references chofer (ci),
	foreign key (matricula) references coches (matricula)
);
select * from maneja;
insert into maneja (`ci` , `matricula`  ) values ('5474783' , 'SRE4565');
insert into maneja (`ci` , `matricula`  ) values ('5467466' , 'SRE6544');
insert into maneja (`ci` , `matricula`  ) values ('5566533' , 'SRE4334');
insert into maneja (`ci` , `matricula`  ) values ('1234567' , 'SRE1234');
insert into maneja (`ci` , `matricula`  ) values ('9876543' , 'SRE5678');
insert into maneja (`ci` , `matricula`  ) values ('5678901' , 'SRE4321');
insert into maneja (`ci` , `matricula`  ) values ('3456789' , 'SRE4334');
insert into maneja (`ci` , `matricula`  ) values ('7890123' , 'SRE3456');
insert into maneja (`ci` , `matricula`  ) values ('8765432' , 'SRE6543');
insert into maneja (`ci` , `matricula`  ) values ('3456789' , 'SRE7890');

create table IF NOT EXISTS necesitan (
	cod_mantenimiento int,
	matricula varchar(7),
	fecha date,
    PRIMARY KEY (cod_mantenimiento, matricula),
	foreign key (cod_mantenimiento) references mantenimiento (cod_mantenimiento),
	foreign key (matricula) references coches (matricula)
);
select * from necesitan;
-- insert into necesitan (`cod_mantenimiento` , `matricula` , `fecha` ) values ('1' , 'SRE4565', '2023-10-23');
-- insert into necesitan (`cod_mantenimiento` , `matricula`, `fecha`  ) values ('2' , 'SRE6544', '2023-11-12');
-- insert into necesitan (`cod_mantenimiento` , `matricula` , `fecha` ) values ('3', 'SRE4334', '2023-11-30');

create table IF NOT EXISTS realizan (
	cod_servicio int,
	ci int,
	matricula varchar(7),
    PRIMARY KEY (cod_servicio, ci, matricula),
	foreign key (cod_servicio) references servicio (cod_servicio),
	foreign key (ci) references maneja (ci),
	foreign key (matricula) references maneja (matricula)
);
select * from realizan;
-- insert into realizan (`ci` , `cod_servicio` , `matricula`  ) values ('5474783' , '1' , 'SRE4565');
-- insert into realizan (`ci` , `cod_servicio` , `matricula`  ) values ('5467466' , '2' , 'SRE6544');
-- insert into realizan (`ci` , `cod_servicio` , `matricula`  ) values ('5566533' , '3' , 'SRE4334');

create table IF NOT EXISTS reserva (
	cod_cliente int,
	cod_servicio int,
	fecha date,
    PRIMARY KEY (cod_cliente, cod_servicio),
	foreign key (cod_cliente) references cliente (cod_cliente),
	foreign key (cod_servicio) references servicio (cod_servicio)
);
select * from reserva;
-- insert into reserva (`cod_cliente` ,`cod_servicio` ,`fecha` ) values ('1' , '1', '2023-08-17');
-- insert into reserva (`cod_cliente` ,`cod_servicio` , `fecha` ) values ('2' , '2', '2023-09-25');
-- insert into reserva (`cod_cliente` ,`cod_servicio` ,  `fecha`  ) values ('3', '3', '2023-09-29');

create table IF NOT EXISTS pago_con (
	cod_servicio int,
	cod_pago int,
    PRIMARY KEY (cod_servicio, cod_pago),
	foreign key (cod_servicio) references servicio (cod_servicio),
	foreign key (cod_pago) references forma_pago (cod_pago)
);
select * from pago_con;
-- insert into pago_con (`cod_pago` , `cod_servicio`  ) values ('1' , '1');
-- insert into pago_con (`cod_pago` , `cod_servicio`  ) values ('2' , '2');
-- insert into pago_con (`cod_pago` , `cod_servicio`  ) values ('3' , '3');

create table IF NOT EXISTS tiene (
	cod_cliente int,
	cod_pago int,
    PRIMARY KEY (cod_cliente, cod_pago),
	foreign key (cod_cliente) references cliente (cod_cliente),
	foreign key (cod_pago) references cuenta_corriente (cod_pago)
);
select * from tiene;
-- insert into tiene (`cod_pago` , `cod_cliente`  ) values ('1' , '2');
-- insert into tiene (`cod_pago` , `cod_cliente`  ) values ('2' , '3');
-- insert into tiene (`cod_pago` , `cod_cliente`  ) values ('3' , '4');