create database IntelisoftBDD;
use IntelisoftBDD;
show tables;


create table IF NOT EXISTS chofer(
ci integer,
nombre varchar (20) NOT NULL,
primary key (ci)
);
select * from chofer;
insert into chofer (`ci` , `nombre` ) values ('5474783' , 'Hernan');
insert into chofer (`ci` , `nombre` ) values ('5467466' , 'Fernando');
insert into chofer (`ci` , `nombre` ) values ('5566533' , 'Franco');

create table IF NOT EXISTS tel_chofer(
ci integer,
telefono int NOT NULL,
primary key (ci)
);
select * from tel_chofer;
insert into tel_chofer (`ci` , `telefono` ) values ('5474783' , '099223644');
insert into tel_chofer (`ci` , `telefono` ) values ('5467466' , '092456454');
insert into tel_chofer (`ci` , `telefono` ) values ('5566533' , '099476354');

create table IF NOT EXISTS coches(
matricula varchar (20),
modelo varchar (20) NOT NULL,
marca varchar (20) NOT NULL,
año int  NOT NULL,
primary key (matricula)
);
select * from coches;
insert into coches (`matricula` , `marca` , `modelo` , `año` ) values ('SRE4565' , 'Nissan','Sentra', '2017');
insert into coches (`matricula` , `marca` , `modelo`, `año` ) values ('SRE6544' , 'Nissan','Sentra', '2018');
insert into coches (`matricula` , `marca`, `modelo` , `año` ) values ('SRE4334' , 'Nissan', 'Sentra', '2018');


create table IF NOT EXISTS mantenimiento(
cod_mantenimiento integer,
tipo_mantenimiento varchar (20) NOT NULL,
gastos_mantenimiento int  NOT NULL,
comentarios varchar (50) NOT NULL,
primary key (cod_mantenimiento)
);
select * from mantenimiento;
insert into mantenimiento (`cod_mantenimiento` , `tipo_mantenimiento` , `gastos_mantenimiento`, `comentarios` ) values ('564533' , 'cambio de aceite', '500', 'cambiado con exito' );
insert into mantenimiento (`cod_mantenimiento` , `tipo_mantenimiento` , `gastos_mantenimiento`, `comentarios` ) values ('676454' , 'pintura', '2000', 'pintura' );
insert into mantenimiento (`cod_mantenimiento` , `tipo_mantenimiento` , `gastos_mantenimiento`, `comentarios` ) values ('86756' , 'aspiracion', '200', 'aspirado' );


create table IF NOT EXISTS servicio(
cod_servicio integer,
origen varchar (20) NOT NULL,
destino varchar (20) NOT NULL,
fecha date  NOT NULL,
hora_inicio time NOT NULL,
distancia_recorrida varchar (10) NOT NULL,
comentario varchar (20) NOT NULL,
nombre_pasajero varchar (20) NOT NULL,
apellido_pasajero varchar (20) NOT NULL,
primary key (cod_servicio)
);
insert into servicio (`cod_servicio` , `origen` , `destino`, `fecha` , `hora_inicio`  , `distancia_recorrida` , `comentario` , `nombre_pasajero` , `apellido_pasajero` ) values ('677443' , 'Maldonado', 'Requena', '2013-07-23' , '15:00:00' ,  '5km' , 'sc', 'Fernando', 'Castro' );
insert into servicio (`cod_servicio` , `origen` , `destino`, `fecha` , `hora_inicio`  , `distancia_recorrida` , `comentario`, `nombre_pasajero`, `apellido_pasajero` ) values ('645566' , 'Maldonado', 'Requena', '2023-08-24' , '17:00:00' ,  '5km' , 'sc' , 'Facundo' , 'Martinez' );
insert into servicio (`cod_servicio` , `origen` , `destino`, `fecha` , `hora_inicio`  , `distancia_recorrida` , `comentario` , `nombre_pasajero`, `apellido_pasajero` ) values ('786756' , 'Maldonado', 'Requena', '2023-09-27' , '18:00:00' ,  '5km' , 'sc' , 'Gabriel', 'Perez' );


create table IF NOT EXISTS usuario(
ci_usuario integer,
nombre_usuario varchar (20) NOT NULL,
contraseña varchar (20)  NOT NULL,
rol_usuario ENUM('administrador', 'operador'),
fecha_ingreso date,
primary key (ci_usuario)
);

select * from usuario;
insert into usuario (`ci_usuario` , `nombre_usuario` , `contraseña`, `rol_usuario` , `fecha_ingreso` ) values ('5654855' , 'Enrique', 'Enriquee' , 'administrador', '2020-06-26');
insert into usuario (`ci_usuario` , `nombre_usuario` , `contraseña`, `rol_usuario` , `fecha_ingreso` ) values ('5466455' , 'Juan', 'juann' , 'operador', '2022-08-16');
insert into usuario (`ci_usuario` , `nombre_usuario` , `contraseña`, `rol_usuario` , `fecha_ingreso` ) values ('5655355' , 'Sebastian', 'seba' , 'administrador', '2021-11-12');


create table IF NOT EXISTS cliente(
cod_cliente integer,
lista_negra boolean NOT NULL,
direccion varchar (20)  NOT NULL,
primary key (cod_cliente)
);
select * from cliente;
insert into cliente (`cod_cliente` , `lista_negra` , `direccion` ) values ('675645' , '1', 'requena');
insert into cliente (`cod_cliente` , `lista_negra` , `direccion` ) values ('867564' , '0', 'agraciada');
insert into cliente (`cod_cliente` , `lista_negra` , `direccion` ) values ('897867' , '0', 'tres cruces');
insert into cliente (`cod_cliente` , `lista_negra` , `direccion` ) values ('756446' , '0', 'costa urbana');
insert into cliente (`cod_cliente` , `lista_negra` , `direccion` ) values ('534656' , '0', 'solymar');
insert into cliente (`cod_cliente` , `lista_negra` , `direccion` ) values ('765646' , '0', 'tres cruces');

create table IF NOT EXISTS telefono_cliente(
cod_cliente integer,
telefono int NOT NULL,
primary key (cod_cliente)
);
select * from telefono_cliente;
insert into telefono_cliente (`cod_cliente` , `telefono`  ) values ('675645' , '099365858');
insert into telefono_cliente (`cod_cliente` , `telefono`  ) values ('867564' , '092476946');
insert into telefono_cliente (`cod_cliente` , `telefono`  ) values ('897867' , '091537596');

create table IF NOT EXISTS empresa(
cod_cliente integer,
rut int NOT NULL,
razon_social varchar (20) NOT NULL,
nombre_fantasia varchar (20) NOT NULL,
Email varchar (20) NOT NULL,
primary key (cod_cliente)
);
select * from empresa;
insert into empresa (`cod_cliente` , `rut` , `razon_social`, `nombre_fantasia`, `Email`  ) values ('675645' , '7564534' , 'Ac', 'BA', 'BA@gmail.com');
insert into empresa (`cod_cliente` , `rut` , `razon_social`, `nombre_fantasia`, `Email`  ) values ('867564' , '86756454' , 'BC', 'DE', 'DE@gmail.com');
insert into empresa (`cod_cliente` , `rut`, `razon_social`, `nombre_fantasia`, `Email`  ) values ('897867' , '34465577' , 'CW', 'HG', 'HG@gmail.com');

create table IF NOT EXISTS particular(
cod_cliente integer auto_increment,
nombre varchar (20) NOT NULL,
apellido varchar (20) NOT NULL,
primary key (cod_cliente)
);
select * from particular;
insert into particular (`cod_cliente` , `nombre` , `apellido` ) values ('756446' , 'Hernan', 'Gomez');
insert into particular (`cod_cliente` , `nombre` , `apellido` ) values ('534656' , 'Dario', 'Hernandez');
insert into particular (`cod_cliente` , `nombre` , `apellido` ) values ('765646' , 'Natalia', 'Torres');

create table IF NOT EXISTS tel_particular(
cod_cliente integer auto_increment,
telefono int NOT NULL,
primary key (cod_cliente)
);
select * from tel_particular;
insert into tel_particular (`cod_cliente` , `telefono` ) values ('756446' , '099582584');
insert into tel_particular (`cod_cliente` , `telefono` ) values ('534656' , '092154796');
insert into tel_particular (`cod_cliente` , `telefono` ) values ('765646' , '0996258225');

create table IF NOT EXISTS forma_pago(
cod_pago integer,
monto_viaje int NOT NULL,
primary key (cod_pago)
);
select * from forma_pago;
insert into forma_pago (`cod_pago` , `monto_viaje`  ) values ('46565' , '200');
insert into forma_pago (`cod_pago` , `monto_viaje`  ) values ('46577' , '350');
insert into forma_pago (`cod_pago` , `monto_viaje`  ) values ('98784' , '866');
insert into forma_pago (`cod_pago` , `monto_viaje`  ) values ('54466' , '500');
insert into forma_pago (`cod_pago` , `monto_viaje`  ) values ('34553' , '700');
insert into forma_pago (`cod_pago` , `monto_viaje`  ) values ('24354' , '200');
insert into forma_pago (`cod_pago` , `monto_viaje`  ) values ('86756' , '100');
insert into forma_pago (`cod_pago` , `monto_viaje`  ) values ('97867' , '900');
insert into forma_pago (`cod_pago` , `monto_viaje`  ) values ('75644' , '900');
insert into forma_pago (`cod_pago` , `monto_viaje`  ) values ('67565' , '900');

create table IF NOT EXISTS cuenta_corriente(
cod_pago integer,
numero_cuenta int NOT NULL,
primary key (cod_pago)
);
select * from cuenta_corriente;
insert into cuenta_corriente (`cod_pago` , `numero_cuenta`  ) values ('46565' , '6546474');
insert into cuenta_corriente (`cod_pago` , `numero_cuenta`  ) values ('46577' , '6455555');
insert into cuenta_corriente (`cod_pago` , `numero_cuenta`  ) values ('98784' , '57645455');

create table IF NOT EXISTS transferencia(
cod_pago integer,
numero_transferencia int NOT NULL,
primary key (cod_pago)
);
select * from transferencia;
insert into transferencia (`cod_pago` , `numero_transferencia`  ) values ('54466' , '545885');
insert into transferencia (`cod_pago` , `numero_transferencia`  ) values ('34553' , '687563');
insert into transferencia (`cod_pago` , `numero_transferencia`  ) values ('24354' , '566685');

create table IF NOT EXISTS tarjeta(
cod_pago integer,
tipo_tarjeta ENUM('debito', 'credito'),
primary key (cod_pago)
);
select * from tarjeta;
insert into tarjeta (`cod_pago` , `tipo_tarjeta`  ) values ('86756' , 'debito');
insert into tarjeta (`cod_pago` , `tipo_tarjeta`  ) values ('97867' , 'credito');

create table IF NOT EXISTS contado(
cod_pago integer,
monto int,
primary key (cod_pago)
);
select * from contado;
insert into contado (`cod_pago`  ) values ('75644');
insert into contado (`cod_pago`  ) values ('67565');

create table IF NOT EXISTS maneja (
ci integer,
matricula varchar (20),
foreign key (ci) references
chofer (ci),
foreign key (matricula) references
coches (matricula),
primary key (ci, matricula)
);
select * from maneja;
insert into maneja (`ci` , `matricula`  ) values ('5474783' , 'SRE4565');
insert into maneja (`ci` , `matricula`  ) values ('5467466' , 'SRE6544');
insert into maneja (`ci` , `matricula`  ) values ('5566533' , 'SRE4334');

create table IF NOT EXISTS necesitan (
cod_mantenimiento integer,
matricula varchar (20),
foreign key (cod_mantenimiento) references
mantenimiento (cod_mantenimiento),
foreign key (matricula) references
coches (matricula),
primary key (cod_mantenimiento, matricula)
);
select * from necesitan;
insert into necesitan (`cod_mantenimiento` , `matricula`  ) values ('564533' , 'SRE4565');
insert into necesitan (`cod_mantenimiento` , `matricula`  ) values ('676454' , 'SRE6544');
insert into necesitan (`cod_mantenimiento` , `matricula`  ) values ('86756' , 'SRE4334');

create table IF NOT EXISTS realizan (
cod_servicio integer,
ci integer,
matricula varchar (20),
foreign key (cod_servicio) references
servicio (cod_servicio),
foreign key (ci) references
chofer (ci),
foreign key (matricula) references
coches (matricula),
primary key (ci, matricula)
);
select * from realizan;
insert into realizan (`ci` , `cod_servicio` , `matricula`  ) values ('5474783' , '677443' , 'SRE4565');
insert into realizan (`ci` , `cod_servicio` , `matricula`  ) values ('5467466' , '645566' , 'SRE6544');
insert into realizan (`ci` , `cod_servicio` , `matricula`  ) values ('5566533' , '786756' , 'SRE4334');

create table IF NOT EXISTS reserva (
cod_cliente integer,
cod_servicio integer,
fecha date,
foreign key (cod_cliente) references
cliente (cod_cliente),
foreign key (cod_servicio) references
servicio (cod_servicio),
primary key (cod_cliente, cod_servicio)
);
select * from reserva;
insert into reserva (`cod_cliente` , `cod_servicio` , `fecha` ) values ('675645' , '677443' , '2023-08-17');
insert into reserva (`cod_cliente` , `cod_servicio` , `fecha` ) values ('867564' , '645566' , '2023-09-25');
insert into reserva (`cod_cliente` , `cod_servicio` , `fecha`  ) values ('897867' , '786756' , '2023-09-29');

create table IF NOT EXISTS administra (
ci_usuario integer,
cod_servicio integer,
foreign key (ci_usuario) references
usuario (ci_usuario),
foreign key (cod_servicio) references
servicio (cod_servicio),
primary key (ci_usuario, cod_servicio)
);
select * from administra;
insert into administra (`ci_usuario` , `cod_servicio`  ) values ('5654855' , '677443');
insert into administra (`ci_usuario` , `cod_servicio`  ) values ('5466455' , '645566');
insert into administra (`ci_usuario` , `cod_servicio`  ) values ('5655355' , '786756');

create table IF NOT EXISTS pago_con (
cod_servicio integer,
cod_pago integer,
foreign key (cod_servicio) references
servicio (cod_servicio),
foreign key (cod_pago) references
forma_pago (cod_pago),
primary key (cod_servicio, cod_pago)
);
select * from pago_con;
insert into pago_con (`cod_pago` , `cod_servicio`  ) values ('46565' , '677443');
insert into pago_con (`cod_pago` , `cod_servicio`  ) values ('46577' , '645566');
insert into pago_con (`cod_pago` , `cod_servicio`  ) values ('98784' , '786756');

create table IF NOT EXISTS tiene (
cod_cliente integer,
cod_pago integer,
foreign key (cod_cliente) references
cliente (cod_cliente),
foreign key (cod_pago) references
cuenta_corriente (cod_pago),
primary key (cod_cliente, cod_pago)
);
select * from tiene;
insert into tiene (`cod_pago` , `cod_cliente`  ) values ('46565' , '675645');
insert into tiene (`cod_pago` , `cod_cliente`  ) values ('46577' , '867564');
insert into tiene (`cod_pago` , `cod_cliente`  ) values ('98784' , '897867');
