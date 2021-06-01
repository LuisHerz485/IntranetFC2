SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "-05:00";

CREATE TABLE tipousuario(
	idtipousuario int primary key auto_increment,
	nombre varchar(45) not null,
	descripcion varchar(45) not null,
	fechaCreada timestamp NOT NULL,
	estado int not null
);

INSERT INTO `tipousuario`(`idtipousuario`, `nombre`, `descripcion`, `estado`) VALUES (1, 'Administrador', 'Con priviliegios de gestionar todo el sistema', 1);

CREATE TABLE departamento(
	iddepartamento int primary key auto_increment,
	nombre varchar(45) not null,
	descripcion varchar(45) not null,
	fechaCreada timestamp NOT NULL ,
	estado int not null
);

INSERT INTO `departamento` (`iddepartamento`, `nombre`, `descripcion`, `estado`) VALUES
(1, 'Administracion', 'Area de Administracion', 1),
(2, 'Comunicaciones', 'Area de Comunicaciones', 1),
(3, 'Contabilidad', 'Area de contabilidad', 1),
(4, 'Diseno y Marketing', 'Area de Diseno y Marketing', 1),
(5, 'Laboral', 'Area Laboral', 1),
(6, 'Psicologia', 'Area de Psicologia', 1),
(7, 'Sistemas', 'Area de Sistemas', 1),
(8, 'Tributaria', 'Area Tributaria', 1),
(9, 'Gerencia', 'Gerencia', 1);


CREATE TABLE usuario(
	idusuario int auto_increment primary key,
	iddepartamento int not null,
	idtipousuario int not null,
	nombre varchar(45) not null,
	apellidos varchar(45) not null,
	login varchar(45) not null,
	email varchar(45) not null,
	password1 varchar(64) not null,
	imagen varchar(45) not null,
	estado tinyint not null,
	fechacreado timestamp NOT NULL,
	codigopersona varchar(20) not null,
	idmensaje int,
	CONSTRAINT fk_user_dep FOREIGN KEY (iddepartamento) REFERENCES departamento(iddepartamento),
	CONSTRAINT fk_user_tus FOREIGN KEY (idtipousuario) REFERENCES tipousuario(idtipousuario)
);


CREATE TABLE asistencia(
	idasistencia int primary key auto_increment,
	idusuario int,
	fechahora timestamp NOT NULL,
	tipo varchar(45) not null,
	estado int not null,
	detalle varchar(100) not null,
	CONSTRAINT fk_as_us FOREIGN KEY (idusuario) REFERENCES usuario(idusuario)
); 

CREATE TABLE cliente(
	idcliente int primary key auto_increment,
	ruc varchar(12) not null,
	razonsocial varchar(100) not null,
	logincliente varchar(45) not null,
	contrasenacliente varchar(64) not null,
	estado tinyint not null,
	fechacreado timestamp not null,
	tipocliente varchar(14) not null,
	iddrive varchar(100) not null,
	imagen varchar(50) not null
);

CREATE TABLE representante(
	idrepresentante int primary key auto_increment,
	detalleCargo varchar(50) not null,
	nombreCompleto varchar(100) not null
);

CREATE TABLE agenda(
	idcliente int,
	idrepresentante int,
	telefono1 varchar(15) not null,
	telefono2 varchar(15) not null,
	correo1 varchar(45) not null,
	correo2 varchar(45) not null,
	CONSTRAINT fk_age_cli FOREIGN KEY (idcliente) REFERENCES cliente(idcliente),
	CONSTRAINT fk_age_rep FOREIGN KEY (idrepresentante) REFERENCES representante(idrepresentante),
	CONSTRAINT pk_agenda PRIMARY KEY (idcliente,idrepresentante)
);





/*
CREATE TABLE auditoria(
	idregistro int primary key auto_increment,
	idusuario varchar(50) not null,
	nomusuario varchar(100) not null,
	fecha datetime not null,
	accion varchar(100) not null
);

DROP TRIGGER IF EXISTS `INSERTAR_USUARIO`;
DROP TRIGGER IF EXISTS `ACTUALIZAR_USUARIO`;
DROP TRIGGER IF EXISTS `ELIMINAR_USUARIO`;

CREATE TRIGGER `INSERTAR_USUARIO` AFTER INSERT ON `usuario` FOR EACH ROW 
INSERT INTO auditoria (idusuario,nomusuario,fecha,accion)
VALUES(NEW.idusuario,NEW.nombre,NOW(),"Ingreso nuevo usuario");


CREATE TRIGGER `ACTUALIZAR_USUARIO` AFTER UPDATE ON `usuario` 
FOR EACH ROW 
BEGIN
UPDATE 

END



CREATE TRIGGER `ELIMINAR_USUARIO` AFTER DELETE ON `usuario` 
FOR EACH ROW 
BEGIN
DELETE 

END

*/

