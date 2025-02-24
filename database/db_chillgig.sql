create database db_chillgig;

use db_chillgig;

create table tipo_usuario (
id_tipo_usuario int auto_increment,
nombre varchar(20),
constraint pk_tipo_usuario primary key (id_tipo_usuario)
);

insert into tipo_usuario (nombre) values ('admin');
insert into tipo_usuario (nombre) values ('musico');
insert into tipo_usuario (nombre) values ('local');

create table tipo_local (
id_tipo_local int auto_increment,
nombre varchar(50),
constraint pk_tipo_local primary key (id_tipo_local)
);

insert into tipo_local (nombre) values ('bar');
insert into tipo_local (nombre) values ('restaurante');
insert into tipo_local (nombre) values ('cafeteria');
insert into tipo_local (nombre) values ('pub');

create table tipo_multimedia (
id_tipo_multimedia int auto_increment,
nombre varchar(20),
constraint pk_tipo_multimedia primary key (id_tipo_multimedia)
);

insert into tipo_multimedia (nombre) values ('foto');
insert into tipo_multimedia (nombre) values ('video');
insert into tipo_multimedia (nombre) values ('audio');

create table genero (
id_genero int auto_increment,
nombre varchar(50),
constraint pk_genero primary key (id_genero)
);

insert into genero (nombre) values ('rock');
insert into genero (nombre) values ('pop');
insert into genero (nombre) values ('jazz');
insert into genero (nombre) values ('blues');
insert into genero (nombre) values ('reggae');
insert into genero (nombre) values ('rap');
insert into genero (nombre) values ('indie');
insert into genero (nombre) values ('flamenco');
insert into genero (nombre) values ('electronica');
insert into genero (nombre) values ('clasica');
insert into genero (nombre) values ('salsa');
insert into genero (nombre) values ('cumbia');

create table instrumento (
id_instrumento int auto_increment,
nombre varchar(50),
constraint pk_instrumento primary key (id_instrumento)
);

insert into instrumento (nombre) values ('cantante');
insert into instrumento (nombre) values ('guitarra');
insert into instrumento (nombre) values ('bajo');
insert into instrumento (nombre) values ('bateria');
insert into instrumento (nombre) values ('piano');
insert into instrumento (nombre) values ('saxofon');
insert into instrumento (nombre) values ('trompeta');
insert into instrumento (nombre) values ('violin');
insert into instrumento (nombre) values ('flauta');
insert into instrumento (nombre) values ('clarinete');
insert into instrumento (nombre) values ('acordeon');
insert into instrumento (nombre) values ('ukelele');
insert into instrumento (nombre) values ('armonica');
insert into instrumento (nombre) values ('arpa');
insert into instrumento (nombre) values ('cajon');
insert into instrumento (nombre) values ('castanuelas');

create table usuario (
id_usuario int auto_increment,
correo varchar(100) not null,
contrasenya varchar (250) not null,
id_tipo_usuario int,
constraint pk_usuario primary key (id_usuario),
constraint uk_correo unique key (correo),
constraint fk_usuario_tipo_usuario foreign key (id_tipo_usuario) references tipo_usuario (id_tipo_usuario)
);

insert into usuario (correo, contrasenya, id_tipo_usuario) values ('admin@gmail.com', '1234', 1);

create table cliente (
id_usuario int,
nombre varchar(100) not null,
ubicacion varchar (250) not null,
foto_perfil varchar(255),
descripcion varchar (255),
telefono varchar (15),
constraint pk_cliente primary key (id_usuario),
constraint fk_cliente_usuario foreign key (id_usuario) references usuario (id_usuario)
);

create table multimedia (
id_multimedia int auto_increment,
ruta varchar(255),
id_usuario int,
id_tipo_multimedia int,
constraint pk_multimedia primary key (id_multimedia),
constraint fk_multimedia_cliente foreign key (id_usuario) references cliente (id_usuario),
constraint fk_multimedia_tipo_multimedia foreign key (id_tipo_multimedia) references tipo_multimedia (id_tipo_multimedia)
);

create table musico (
id_usuario int,
nombre_artistico varchar(100),
edad tinyint(3),
constraint pk_musico primary key (id_usuario),
constraint fk_musico_cliente foreign key (id_usuario) references cliente (id_usuario)
);

create table local (
id_usuario int,
horario varchar(255),
es_accesible boolean,
id_tipo_local int,
constraint pk_local primary key (id_usuario),
constraint fk_local_cliente foreign key (id_usuario) references cliente (id_usuario),
constraint fk_local_tipo_local foreign key (id_tipo_local) references tipo_local (id_tipo_local)
);

create table evento (
id_evento int auto_increment,
nombre varchar(255) not null,
descripcion varchar(255),
id_usuario int,
constraint pk_evento primary key (id_evento),
constraint fk_evento_local foreign key (id_usuario) references local (id_usuario)
);

create table mensaje (
id_usuario_musico int,
id_usuario_local int,
contenido varchar (255) not null,
fecha_hora datetime,
id_emisor int not null,
es_leido boolean,
constraint pk_mensaje primary key (id_usuario_musico,id_usuario_local),
constraint fk_mensaje_local foreign key (id_usuario_local) references local (id_usuario),
constraint fk_mensaje_musico foreign key (id_usuario_musico) references musico (id_usuario)
);

create table musico_genero (
id_genero int,
id_usuario int,
constraint pk_musico_genero primary key (id_genero, id_usuario),
constraint fk_musico_genero_genero foreign key (id_genero) references genero (id_genero),
constraint fk_musico_genero_musico foreign key (id_usuario) references musico (id_usuario)
);

create table musico_instrumento (
id_instrumento int,
id_usuario int,
constraint pk_musico_instrumento primary key (id_instrumento, id_usuario),
constraint fk_musico_instrumento_instrumento foreign key (id_instrumento) references instrumento (id_instrumento),
constraint fk_musico_instrumento_musico foreign key (id_usuario) references musico (id_usuario)
);

create table contrato (
id_usuario int,
id_evento int,
fecha_inicio datetime not null,
fecha_fin datetime not null,
constraint pk_contrato primary key (id_usuario, id_evento),
constraint fk_contrato_musico foreign key (id_usuario) references musico (id_usuario),
constraint fk_contrato_evento foreign key (id_evento) references evento (id_evento)
);
