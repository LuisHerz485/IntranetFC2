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

INSERT INTO `tipousuario` (`idtipousuario`, `nombre`, `descripcion`, `fechaCreada`, `estado`) VALUES
(1, 'Administrador', 'Con priviliegios de gestionar todo el sistema', '2020-01-18 21:33:15', 1),
(2, 'Colaborador', 'Sin acceso al sistema', '2021-02-26 22:20:38', 1);

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
(9, 'Gerencia', 'Gerencia', 1),
(10, 'Área Legal', 'Área Legal', 1),
(11, 'Área de Auditoria', 'Auditores', 1);

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

INSERT INTO `usuario` (`idusuario`, `iddepartamento`, `idtipousuario`, `nombre`, `apellidos`, `login`, `email`, `password1`, `imagen`, `estado`, `fechacreado`, `codigopersona`, `idmensaje`) VALUES
(1, 7, 1, 'Luis Alberto Junior', 'Hernandez Albia', 'HerLuis933',  'luis.hernandez@fccontadores.com', '707f2333fb0cbe0fbecb6f70f63228166e235624ba8e5a41b260faa0f9332dd9', 'vistas/img/usuarios/1614383779.png', 1, '2020-01-18 00:00:00', '49jpFc', 1),
(2, 1, 1, 'Estefania Alessandra', 'Carhuapoma Aybar', 'EsCar933', 'estefania.carhuapoma@fccontadores.com', 'c9a0936aad7821988bdee2a200444c8ec58a8486b12b14c37b40c374ee00446a', 'vistas/img/usuarios/1614382636.jpeg', 1, '2021-02-26 17:37:15', 'ULcLnX', 0),
(3, 9, 1, 'Fredy Junior', 'Solano Fernandez', 'SolFre933', 'fsolano@fccontadores.com', '21259409e2ac02a6428ab0ba351118434b0855573a2ad0c1ff982a95e2f20449', 'vistas/img/usuarios/1614382827.jpeg', 1, '2021-02-26 17:40:27', 'Wi77K2', 0),
(4, 7, 1, 'Jorge Jesus', 'Terrones Lopez', 'TerJor970', 'jorge.terrones@fccontadores.com', '5f73b6769bb81e36dcd48753eb567a82afb22b2e314b275d2d1798d50787cf65', 'vistas/img/usuarios/1614383151.jpeg', 0, '2021-02-26 17:45:51', 'dztPqy', 0),
(5, 2, 2, 'Nicolle del Rosario', 'Carhuapoma Rodriguez', 'Nicolle', 'nicolle.carhuapoma@fccontadores.com', '47d2324e27d850be9ee73b559d45bfdc05bc1ea5515f1114d21fe48a6ab6a86a', 'vistas/img/usuarios/1614383374.jpg', 0, '2021-02-26 17:49:33', 'xT8apX', 0),
(6, 8, 2, 'Elsie Aida', 'Borda Egusquiza', 'Elsie', 'elsie.borda@fccontadores.com', '800a5752161497f81492f02ec4f314898a1e75495da560f7aed36c9010aa0e9e', 'vistas/img/usuarios/1619552569.jpeg', 0, '2021-02-26 17:54:42', 'qTyH8J', 0),
(7, 4, 2, 'Ariana Nicole', 'Mija Risco', 'Ariana', 'ariana.mijarisco@fccontadores.com', 'd3dd5b767c3cec7920fa11f80493c7722e254e3274474c7651cff66bd0718905', 'vistas/img/usuarios/1614383994.jpeg', 0, '2021-02-26 17:59:32', 'xUEQpU', 0),
(8, 4, 2, 'Claudia Lucia', 'Obando Berrios', 'Claudia', 'claudia.obaldo@fccontadores.com', 'ccd09c221115c6eaa370b4f8d3ad625076d3f7bfdf900444abca1756af22f7c7', 'vistas/img/usuarios/1614384059.jpeg', 1, '2021-02-26 18:00:58', 'm924qQ', 0),
(9, 4, 2, 'Johanna', 'Sanchez', 'Johanna', 'j.sanchez@fccontadores.com', 'f50c08f72a3ce5e2a2680edee0b13b2692404f728f5064d5d621e57ffc0a11b6', 'vistas/img/usuarios/1614384134.jpg', 0, '2021-02-26 18:02:14', 'nuBbh3', 0),
(10, 5, 2, 'Valerie Zeni', 'Arango Velasquez', 'Valerie', 'valerie.arango@fccontadores.com', '2de21f7215e59bc9a1518031d051c4c9d6873a5e44c8cacba2ac8938f0c02ec4', 'vistas/img/usuarios/1614384238.jpeg', 1, '2021-02-26 18:03:57', '7pKRHP', 0),
(11, 5, 2, 'Heydi', 'Castillo', 'Heydi', '', '2de21f7215e59bc9a1518031d051c4c9d6873a5e44c8cacba2ac8938f0c02ec4', 'vistas/img/usuarios/1614384633.jpeg', 0, '2021-02-26 18:10:32', '9ut4WX', 0),
(12, 5, 2, 'Andrea Maria', 'Silva Enriquez', 'Andrea', 'a.silva@fccontadores.com', '195ade39039a1890e53186ad64ba1fae9cf3a8aff63821c6a0da56fc1221d422', 'vistas/img/usuarios/1614384675.jpeg', 1, '2021-02-26 18:11:15', 'ifDghR', 0),
(13, 6, 2, 'Mariana Nicole', 'Camargo Tito', 'Mariana', 'mariana.camargotito@fccontadores.com', '9d267ea203ac6efd37fcf6ef22b8d59923dc0b60d5184a9dc29a2d79d1a402bd', 'vistas/img/usuarios/1614384740.jpeg', 0, '2021-02-26 18:12:20', 'KkLqrz', 0),
(14, 6, 2, 'Madhurya Ivette', 'Ortega Estrada', 'Madhurya', 'madhurya.ortegaestrada@fccontadores.com', '154c70e689db05b2bc19dd83613a630064426e9e057507b47359e3975ce51e26', 'vistas/img/usuarios/1614385049.jpeg', 0, '2021-02-26 18:17:29', '3a8r2e', 0),
(15, 8, 2, 'Leidy Mariela', 'Coronado Gamonal', 'Leidy', 'leidy.coronado@fccontadores.com', '1043ab0f4fb83538740f7c73a6c1e74b50d1228e1b3e56816248c578a02ad27d', 'vistas/img/usuarios/1614385185.jpeg', 1, '2021-02-26 18:19:45', 'ivJDYW', 0),
(16, 3, 2, 'Kely Laydy', 'Huaman Tonccochi', 'Kely', 'khuaman@fccontadores.com', 'f50c08f72a3ce5e2a2680edee0b13b2692404f728f5064d5d621e57ffc0a11b6', 'vistas/img/usuarios/1614385221.jpeg', 1, '2021-02-26 18:20:21', 'VVbJTf', 0),
(17, 8, 2, 'Harumy Marleny', 'Pineda Soto', 'Harumy', 'harumy.pineda@fccontadores.com', '6342053c8aac05c7fe5ce1226add4ad937734671759c2742d58f0142d205326a', 'vistas/img/usuarios/1614385317.jpeg', 1, '2021-02-26 18:21:56', '677zu8', 0),
(18, 11, 2, 'Anyela Joselin', 'Sarmiento Perez', 'anyela', 'anyela.sarmiento@fccontadores.com', 'c0982466bf4c9c309f990b95f300e268fee36bcade2c5c6645a92efd9ba18b18', 'vistas/img/usuarios/1614385348.jpg', 0, '2021-02-26 18:22:28', 'zPmM6M', 0),
(19, 10, 2, 'Britney Abigail', 'Bohórquez Gonzales', 'Britney', 'britney.bohorquez@fccontadores.com', '04e1b80942ed15cb687ead795deda834191495d81d6597e8c66eb1fc1c64e279', 'vistas/img/usuarios/1619552584.jpg', 1, '2021-03-08 09:39:44', 'JHUWm8', 0),
(20, 10, 2, 'Chiara Leonor', 'Bendezu Ramirez', 'Chiara', 'chiara.bendezu@fccontadores.com', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 'vistas/img/usuarios/1619552595.jpg', 1, '2021-03-08 09:42:16', 'zBB9GP', 0),
(21, 4, 2, 'Niurka Dailys', 'Chávez Acosta', 'Niurka', 'niurka.chavezacosta@fccontadores.com', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', 'vistas/img/usuarios/1619552617.jpg', 0, '2021-03-11 16:49:32', 'TwDfzC', 0),
(22, 4, 2, 'Valeria Aleida', 'Villanueva Andrade', 'Aleida', 'valeria.villanuevaandrade@fccontadores.com', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', 'vistas/img/usuarios/1619552632.jpg', 0, '2021-03-11 16:51:26', 'vm3JRZ', 0),
(23, 1, 1, 'Yaseli Milagros', 'Obregon Tafur', 'YaObTa', 'milagros.obregon@fccontadores.com', '8378cde9e65115163b450fa882f0002e5c98d59d0aff64e0d9af94b58146c492', 'vistas/img/usuarios/1619552645.jpg', 1, '2021-03-11 19:49:24', 'J3Hpu2', 0),
(24, 3, 2, 'Shania Stacy', 'Bracamonte Mendoza', 'Sh4n1ABr', 'shania.bracamonte@fccontadores.com', 'b481bd47328482677ac2bc5c08498a378292d7d62588e11d8675626942b79213', 'vistas/img/usuarios/1619552662.jpg', 1, '2021-03-25 08:19:05', 'yUpJVy', 0),
(25, 5, 2, 'Jannelle Jazmin', 'Muñoz Menacho', 'j4nnelle', 'jannelle.munoz@fccontadores.com', 'd64741a3f8cc7a33f626cff164c34644264b6ccd051ddd3c9f4a0d5aeea2d235', 'vistas/img/usuarios/1619552680.jpg', 1, '2021-04-05 12:00:14', 'RKb2tf', 0),
(26, 7, 1, 'Luiggui Enrique', 'Ynga Becerra', 'Yng4B', 'luiggui.ynga@fccontadores.com', 'ab95e6760d79f05ae46a99ec39ffdcd6512f1351fed7bc62e6dff5685b0f644e', 'vistas/img/usuarios/1619552693.jpg', 1, '2021-04-07 08:47:01', 'IkV7IR', 0),
(27, 1, 1, 'Ximena Marietta', 'Tafur Puyo', 'x1m3na', 'ximena.tafur@fccontadores.com', 'ccd6ef76a4fb22e560bed37ac76984da19fe213d697dc5e0f39b558ecc36f05e', 'vistas/img/usuarios/1619552706.jpeg', 1, '2021-04-12 09:27:50', '6epVNL', 0),
(28, 7, 1, 'Rodrigo Sandro', 'García Baldeón', 'rod1goG4', 'rodrigo.garcia@fccontadores.com', '47a8d93fde0ef28c62c332f6dd6659b41cda7e81d3111c883a8b903a5bf4f5c8', 'vistas/img/usuarios/1619552722.jpg', 1, '2021-04-20 16:42:13', 'VaAyTT', 0),
(29, 11, 2, 'Melani Greis', 'Sanchez Cadillo', 'Melan1', 'melani.sanchez@fccontadores.com', '8a2905f316cdc3a5f921aed553887fbc9cf72f2b199284d20f828cae56e565c3', 'vistas/img/usuarios/1619552737.jpg', 0, '2021-04-21 08:55:32', 'MwTdPn', 0),
(30, 11, 2, 'Yeni Analit', 'Gonzales Duarez', 'Y3ni', 'yeni.gonzales@fccontadores.com', '8a2905f316cdc3a5f921aed553887fbc9cf72f2b199284d20f828cae56e565c3', 'vistas/img/usuarios/1619552751.jpg', 0, '2021-04-21 09:10:06', '2EFa2m', 0),
(31, 4, 2, 'Maria Fernanda', 'Chong Horna', 'marchong', 'maria.chong@fccontadores.com', '8a2905f316cdc3a5f921aed553887fbc9cf72f2b199284d20f828cae56e565c3', 'vistas/img/usuarios/1620942585.jpeg', 1, '2021-04-22 14:53:50', 'LhNXKi', 0),
(32, 4, 2, 'María Fernanda', 'Ríos Morales', 'm4ririos', 'maria.rios@fccontadores.com', '8a2905f316cdc3a5f921aed553887fbc9cf72f2b199284d20f828cae56e565c3', 'vistas/img/usuarios/1620944420.jpeg', 1, '2021-04-23 09:43:56', 'B7aejn', 0),
(33, 3, 2, 'Angela', 'Sarmiento Cubillas', 'AngelaSar', 'angela.sarmiento@fccontadores.com', 'b73083966c565a7bd466623391bc2caa3d5465b2cfcd20a63c41852a26ee1dd9', '', 0, '2021-04-26 08:49:58', 'NGUwyP', 0),
(34, 10, 2, 'Jennifer Pamela', 'Uchuya de la Cruz', 'jennifer', 'jennifer.uchuya@fccontadores.com', '158588a3496907aae47eaf7f127948bc266edb1e911906cd39c76edcce784214', 'vistas/img/usuarios/1619552807.jpeg', 0, '2021-04-27 10:00:12', 'JaxdPI', 0),
(35, 10, 2, 'Gianella del Carmen', 'Lopez Carreno', 'gi4nella', 'gianella.lopez@fccontadores.com', '158588a3496907aae47eaf7f127948bc266edb1e911906cd39c76edcce784214', 'vistas/img/usuarios/1619552793.jpeg', 0, '2021-04-27 10:03:30', 'PFVRRQ', 0),
(36, 10, 2, 'Andrea Alessandra', 'Nuñez Chavez', 'andr3anunez', 'andrea.nunez@fccontadores.com', '8a2905f316cdc3a5f921aed553887fbc9cf72f2b199284d20f828cae56e565c3', 'vistas/img/usuarios/1619552780.jpeg', 0, '2021-04-27 10:06:31', 'EL9i9Z', 0),
(37, 5, 2, 'Pamela Carolina', 'Huayhua Liñan', 'huayhua', 'pamela.huayhua@fccontadores.com', '158588a3496907aae47eaf7f127948bc266edb1e911906cd39c76edcce784214', 'vistas/img/usuarios/1620942333.jpeg', 1, '2021-04-27 18:45:10', 'afMgRT', 0),
(38, 3, 2, 'María Briguitte', 'Chávez Soto', 'maria', 'maria.chavez@fccontadores.com', '158588a3496907aae47eaf7f127948bc266edb1e911906cd39c76edcce784214', 'vistas/img/usuarios/1620942384.jpeg', 1, '2021-04-27 18:54:33', 'gZxcNw', 0),
(39, 8, 2, 'Katia Melisa', 'Roldan López', 'r0ld4n', 'katia.roldan@fccontadores.com', '158588a3496907aae47eaf7f127948bc266edb1e911906cd39c76edcce784214', 'vistas/img/usuarios/1620942310.jpeg', 1, '2021-04-30 11:25:42', 'WmY8Q4', 0),
(40, 8, 2, 'María Fernanda Noelí', 'García Fuentes', 'mariagar', 'maria.garciafuentes@fccontadores.com', 'd09c44060813185cf01b133877c97f1f6f50f93cfc4b3513e04052c72dd3304d', 'vistas/img/usuarios/1620942355.jpeg', 1, '2021-05-03 09:43:29', 'yCDFke', 0),
(41, 9, 1, 'Chrystina', 'Solano Fernandez', 'ChrystSo', 'csolano@fccontadores.com', '158588a3496907aae47eaf7f127948bc266edb1e911906cd39c76edcce784214', 'vistas/img/usuarios/1620942286.jpeg', 1, '2021-05-03 12:18:19', 'DGQrj7', 0),
(42, 4, 2, 'Johana Sofía Milagros', 'Uribe Mendoza', 'urib', 'johana.uribe@fccontadores.com', '8a2905f316cdc3a5f921aed553887fbc9cf72f2b199284d20f828cae56e565c3', 'vistas/img/usuarios/1620942403.jpeg', 1, '2021-05-05 09:37:51', 'GTfIDL', 0),
(43, 1, 1,  'Shyrley Gianina', 'Gonzales Ayala', 'shyrley', 'shyrley.gonzales@fccontadores.com', '158588a3496907aae47eaf7f127948bc266edb1e911906cd39c76edcce784214', 'vistas/img/usuarios/1620942452.jpeg', 1, '2021-05-12 15:35:33', 'CB3guH', 0),
(44, 7, 2, 'Miguel Angel', 'Ramirez Ibarra', 'RamiMI', 'miguel.ramirez@fccontadores.com', 'bd2c48bdfd3a3a7b9ecbc7e4f8fe502ba81e8c9a503d9333de67b10a8453423f', '', 1, '2021-05-19 21:40:41', 'KwIaYg', 0),
(45, 6, 1, 'Gianella Jerly', 'De la Cruz Soto', 'gian3ll4', 'gianella.delacruz@fccontadores.com', 'c34916bc8ecb43dd94da80651ae419fc1015f8c0605e4ec7a7aeebb61245df1d', 'vistas/img/usuarios/1622041702.jpeg', 1, '2021-05-26 10:08:22', '6iYfxZ', 0),
(46, 3, 2, 'Shirley Solanngie', 'Monterrey Camarena', 'Sh1rL3Y', 'shirley.monterrey@fccontadores.com', '02415d21923436433ec8125c453e81101e27b9f319e89fd22e3981d37f14473b', '', 1, '2021-05-28 10:37:33', 'ifa4KK', 0),
(47, 7, 2, 'Nicole Antonella', 'Medina Advincula', 'N1c0leM', 'nicole.medina@fccontadores.com', '41c4420bcc00c572a60492f1442734da06ccd821d13240bb449b082c594b6cc7', 'vistas/img/usuarios/1622555986.jpg', 1, '2021-06-01 08:59:48', 'bANmPz', 0),
(48, 10, 2, 'Raúl Andersson', 'García Oyola', 'r4ul1', 'raul.garcia@fccontadores.com', '158588a3496907aae47eaf7f127948bc266edb1e911906cd39c76edcce784214', 'vistas/img/usuarios/1622741013.jpeg', 1, '2021-06-03 12:23:33', 'htH4un', 0);

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

INSERT INTO `cliente` (`idcliente`, `ruc`, `razonsocial`, `logincliente`, `contrasenacliente`, `estado`, `fechacreado`, `tipocliente`, `iddrive`, `imagen`) VALUES
(1, '20600521129', 'INVERSIONES E IMPORTACIONES ADRIL S.A.C', 'Adr1l', 'a76385121e36adef025950528f63cf48cd6a57763410074fc9d2199e4de1fbc6', 1, '2021-04-03 16:03:30', 'clienteaccess', '1PhU74V-UOw8eKmmx2ODO-SdZ7G8llhrn', 'vistas/img/clientes/1617483811.png'),
(2, '20557932128', 'IMPACTA CONSULTORES LATINOAM. Y CENTROAM.', 'Imp4cta', '90f9de922496935ac293487209edb36cb08895ae7515a4dccf051b261111f237', 1, '2021-04-06 11:35:32', 'clienteaccess', '1LgQELyHSNGvo2TxrcjRVeDoRUW0LTk_H', 'vistas/img/clientes/1617726932.png'),
(3, '20600796641', 'CAPILAR STORM S.A.C.', 'c4pilar', 'd791ab2b09cf08cf56a129e237d031a85d317c88745c3ed6cff96724b76ebf45', 1, '2021-04-06 11:49:13', 'clienteaccess', '12Yu3IjqTVkInRqi92YO5mhZd_TiEf6LF', 'vistas/img/clientes/1617727753.jpeg'),
(4, '20606368411', 'PRESTIGE PERU GROUP S.A.C.', 'Pr4sGrup', '3c046b169d8f367365c0a22a9b687647a07cae0f713c6230e9ab4d3bd5696d1e', 1, '2021-04-06 11:56:21', 'clienteaccess', '1U9qiaqnI5crZNlZ6IKF1M5CYCoxQ1Ve_', 'vistas/img/clientes/1617733251.png'),
(5, '20601011957', 'CORP. EDUCATIVA THALES DE MILETO SAC', 'Th4les', '8dbe50f29a3bee4a358cb74747610175c786021d28e908928435b3a7b5431d13', 1, '2021-04-06 12:03:27', 'clienteaccess', '1GvFj6sHvqFHWBnyDPd7jws7Tj5WJzd2t', 'vistas/img/clientes/1617728607.jpg'),
(6, '20557916866', 'M & O SOLUCIONES EN INGENIERIA S.A.C.', 'moSol', 'e210b1720b1815ba86230acd7e856adf0be0070a2d5ffd4477b45cddc816c771', 1, '2021-04-06 12:15:43', 'clienteaccess', '1dBPT3XrOTXvufydexMTCbFZ1CTTaJy2l', 'vistas/img/clientes/1617729343.jpg'),
(7, '20602503098', 'IMPORT & EXPORT RENAC S.A.C', 'R3nac', '0a81d61da169cc734bd8c5f01311d99ae9d0639c976ff4c4e452ec3b88b247f2', 1, '2021-04-06 12:19:15', 'clienteaccess', '16u1YDL9wt-tVGW-bohNUHJ2ir0K78xcG', 'vistas/img/clientes/1617729556.jpeg'),
(8, '10098620449', 'VASQUEZ HUESA, SANDRA JANETH', 'V4sSan', '2a4c4493b38f48757f82635a87f02abe84da997de302d29a51b87b238780378d', 1, '2021-04-06 12:28:00', 'clienteaccess', '1S5dOa-bb2LZTbrvM3Qg5hRHM24O5ozdG', 'vistas/img/clientes/1617730081.png'),
(9, '20600252594', 'PUNTO HOGAR S.A.C.', 'PunHo', 'e9babbf8a4002f265ff42d1ac3fdcc107b907d3eb000039a9ac22cac1acc75d3', 1, '2021-04-06 12:33:51', 'clienteaccess', '1jA-oZFJVkXDsrd2vNmu1KC216y9PXYb9', 'vistas/img/clientes/1617730431.jpg'),
(10, '20604249792', 'KAIHATSU PERU S.A.C.', 'K4iperu', '74b06c6dc847a1a88da47a3e3be11d447c15405a11ee382a880b5b086bdb55b6', 1, '2021-04-06 12:39:00', 'clienteaccess', '1FFKY6cmiOpcOIaCtqbo3mo1f2Rne94nr', 'vistas/img/clientes/1617730740.jpeg'),
(11, '20563544849', 'ADESCO PERU S.A.C', 'ad3sco', '0322731331174adf6067693ff843a3cb12253bf9c7bbd1e7cfdd02a393560ab9', 1, '2021-04-06 13:09:36', 'clienteaccess', '1twzaypaenN5v_VSnslZokbq-gpMWeXap', 'vistas/img/clientes/1617732576.jpeg'),
(12, '20603656033', 'DIVALIFE PERU S.A.C.', 'd1valife', '0f3a0179e1a04c5deec2c82aa1f45f4ca7feea0b359a2d4745220851494264ab', 1, '2021-04-06 13:13:49', 'clienteaccess', '1Mn0jPp5_jRSBIS2vV2WyzYiANnXJN1md', 'vistas/img/clientes/1617732830.jpeg'),
(13, '10093951889', 'ESPINOSA LOSTAUNAU, PATRICIA VIRGINIA', 'P4tes', '892389c00f2c5d478cb9ec0e317590455b4a7b57509c75e61c523bc565a0648c', 1, '2021-04-06 13:20:51', 'clienteaccess', '1MJ1FzBkUas0RvP3nSuBscSVQQ5ALQykD', 'vistas/img/clientes/1617733251.png'),
(14, '10086832238', 'LEIVA MENDOZA, JHONY REYNALDO', 'le1vajho', '3bc1be28f207741f5a40ef33c3733f51523c99f12c63adf8c2af7c8416ea3934', 1, '2021-04-06 13:24:59', 'clienteaccess', '11MyFQTwSVf1IAVlv3Q5-upq-pyUF7Hhh', 'vistas/img/clientes/1617733500.png'),
(15, '20517801080', 'INVERSIONES IPCHANG S.R.L', 'ipchang', 'e5df2598fd2c981e6f634ca305b874fa664fe398f67a6dc229182d3c16522b37', 1, '2021-04-06 13:28:34', 'clienteaccess', '1cGIgRMsATwzVIZ8ZWhjVG4qZ1vzltxSO', 'vistas/img/clientes/1617733715.jpeg'),
(16, '20606649089', 'IKEY STORE CERRAJERIA AUTOMOTRIZ EIRL', 'ikey', 'd229d464cd985d107019c810443fa3028393da8ed59995582f3ec5b636433a7f', 1, '2021-04-06 13:33:10', 'clienteaccess', '11dFW2mgDM8G4b8BJWacVb6Tztj_xxO8u', 'vistas/img/clientes/1617733990.jpeg'),
(17, '20606803274', 'RAYMI PERU SOLUCIONES & SERVICIOS S.A.C', 'R4imy', 'fba25effe59e353830cfba36dc1b9597f4df93fb89133f3affa65938328a2176', 1, '2021-04-06 17:27:08', 'clienteaccess', '1HFgt0XPoJ0sOKodGmaK_pMtVRfeRWz6n', 'vistas/img/clientes/1617748029.jpg'),
(18, '20603177127', 'D´LUCCA ACCESORIOS S.A.C', 'dlucca', 'a477fb3f7271668ebd1a3d2eae247fdfff8a1bb4c0a96d587f35c36820a6359e', 1, '2021-04-08 10:07:24', 'clienteaccess', '1WWEOB6ewvVd53hAXffERqRgXfSDC8AuD', 'vistas/img/clientes/1617894445.png'),
(19, '20556043478', 'IMPORTACIONES & NEGOCIACIONES RSO S.A.C', 'impRSO', 'cdfb4a3a945fc84d7ab7e8b73712369cafd6b941338bbcf3436ab44cd5d02968', 1, '2021-04-08 10:11:32', 'clienteaccess', '18ZxrIukKN_LDrdtp57F-Vn9mcWotWFAk', 'vistas/img/clientes/1617894692.jpg'),
(20, '20553552231', 'LOREL S.A.C.', 'lorel', 'de55a111c3488b2ef178bd7e153331f8fbd8ff2f50324617502f3cd5da0e71c6', 1, '2021-04-08 10:15:01', 'clienteaccess', '1nHQta73b7x43-Nx1PsjQSgHxBogcfPXz', 'vistas/img/clientes/1617894901.jpg'),
(21, '10035848679', 'MERA ABAD DE MANRIQUE, ROSA BRIMILDA', 'm3rarosa', '6d5577c1b118078346a0225331ac59e8242f262db02a5b9340c6478e9fc1dab3', 1, '2021-04-08 12:16:05', 'clienteaccess', '18yUj58N9myJJkaPeGLtq1Q1RgKgOUAFh', 'vistas/img/clientes/1617902166.jpg'),
(22, '00000000000', 'Usuario de Prueba', 'prueba', '655e786674d9d3e77bc05ed1de37b4b6bc89f788829f9f3c679e7687b410c89b', 1, '2021-04-12 16:02:31', 'clienteaccess', '', 'vistas/img/clientes/1618261352.png'),
(23, '20607306461', 'CRC TRUCKS CHINESE SAC', 'CRCTRUCKSC', '4d3d2e2c50cdeb86f0eab1751e021a9540568ad85522583c6067b6569ea59f78', 1, '2021-04-15 11:30:48', 'clienteaccess', '1Kfoq947vP9qsGQRVftvgv69qCIUd0EuF', 'vistas/img/clientes/1618504249.jpg'),
(24, '20603805420', 'KAMAQ RURAY PERU S.R.L.', 'KAMAQRP', '21473771993d8b09e2a04a4f3d97f8ed003987b3719690510b0f2c243edc0022', 0, '2021-04-15 11:47:57', 'clienteaccess', '1KaO_erowe5q99dpinrLL8GVDpSdLoWL3', 'vistas/img/clientes/1618505277.jpg'),
(25, '20603943547', 'TRANSERVICE GENERALES L & G S.A.C', 'TRANSERVICEGLG', '81179ac4d2945b94a378a3e903d7d23a2c43745e52d538cb6f76f24ad0142b8c', 1, '2021-04-15 11:55:15', 'clienteaccess', '1nbLKRcDuf0vgMGMBhEjrmN-I7LlHqIcF', 'vistas/img/clientes/1618505716.jpg'),
(26, '20547233264', 'A Y BE INGENIEROS S.A.C.', 'AYBEINGENIEROS', '879925e75c7afd9702d1ae0445b77527906d0d487b24eef00cf6e8e8e2123850', 1, '2021-04-15 12:14:02', 'clienteaccess', '12KTnGfEI7HauJS3Q8omL0RfByWe5tD88', 'vistas/img/clientes/1618506842.png'),
(27, '10749869718', 'TICONA ZARATE JUAN ESTEBAN', 'Ju4nTicona', 'b5d2dc4de216632d00d3e4ef0586f13297a17cfbb45f1858b972bc9aa2315821', 0, '2021-04-20 09:55:36', 'clienteaccess', '1eDlk5yCluyYpDuf5qSPS196tzQPkcX28', 'vistas/img/clientes/1618930536.jpg'),
(28, '10700247363', 'ALVINES ARMAS KELY MARIELA', 'K3lyalvines', 'd60e599faf4ddb89c87e092672eda4d5267f39b9a1977f22908c63e649bb795b', 0, '2021-04-20 10:04:12', 'clienteaccess', '1qt-Q1OiDpyBahjCHMSuH2vvqX0uLPQZq', 'vistas/img/clientes/1618931052.jpg'),
(29, '20502542592', 'J R PROJETS CONTRATISTAS Y CONSULTORES SOCIEDAD ANONIMA CERRADA', 'projets', 'a3e1908aca6e4b0f8c99ea42dc7ed38bc4f0bf4f512993b2ef9766f03c993bb2', 1, '2021-04-20 11:48:01', 'clienteaccess', '1KdfOFS2AldlRktlvDLFXnPdZS7-4iyYB', 'vistas/img/clientes/1618937282.png'),
(30, '20603005148', 'PRESTIGE PERU IMPORT S.A.C', 'Pr4sImpo', '6207ce4d6545e1d6a0aae7a503488821700592aed065b3141a165f48e4bdbb2b', 1, '2021-04-30 18:27:20', 'clienteaccess', '17iJuarIi9xd9zkEPJh36i5L3MYznHOqF', ''),
(31, '20566573637', 'Phoenix Producciones S.A.C.', 'PhoenixPro', '8ff4766713e3971615db4cc88877ead6043b91d279966c1ff57b4c689d36e5cd', 1, '2021-05-04 12:33:43', 'clienteaccess', '1EKrq_AZZDkBKzofoL5iUxE2HfMCOQY0G', 'vistas/img/clientes/1620149624.jpg'),
(32, '20606512598', 'CMO SEÑORA DE GUADALUPE E.I.R.L', 'CMSSRAGUA', '5c8484a39044364b328ac3c2d1ab589fd26211be7f5c28cb01a1097d42597678', 1, '2021-05-04 12:47:02', 'clienteaccess', '1jdOs-46u-U1IuFSkIYgpdZNKYIKyDBeT', 'vistas/img/clientes/1620150422.jpg'),
(33, '10429614886', 'BARDALES ACUÑA RAUL', 'R4ul', '3bbd12d41ccf84721e4a7257505ca57525b0b1b69f8d9e81a7f7e8257d6ba126', 1, '2021-05-18 16:46:28', 'clienteaccess', '1DZYtxMxFEn1oR-BNqR3Q2_81-FNRoorO', ''),
(34, '20602356800', 'BARTER ONLINE S.A.C.', 'B4RT3RONLINE', '5caf5089a486d13ab4eb2dcdec0c6b76fb021ed5e9b1cb5f210d3d34c715b126', 1, '2021-05-19 09:05:14', 'clienteaccess', '17gTNczJ55JaA0fEYPolTUTaOC4C-_h2Z', 'vistas/img/clientes/1621433115.jpg'),
(35, '20557565389', 'BDI CONSULTING E.I.R.L.', 'BDIC0NSULT1NG', 'c34657384d19529d2301159adaa6e919917305fc0b3b1c033c490b681ffef6a9', 1, '2021-05-19 09:11:20', 'clienteaccess', '1MmmKfE9pclE1OIpzuuAEXeb4O3dU7ocF', 'vistas/img/clientes/1621433480.jpg'),
(36, '15606155716', 'BOLAÑOS MEDINA ALEX JAVIER', 'AL3XJ4V1ER', 'e9b80e3b3317753a25e7680edbfb1de8b74bae596f8118aa30f0f683d719d77d', 1, '2021-05-19 09:19:16', 'clienteaccess', '1l5yMfUxyyzWtHOAJ1NenfJ8-A94MzEWk', 'vistas/img/clientes/1621433957.jpg'),
(37, '10450996829', 'BRICEÑO SANTAMARIA LUIS MIGUEL', 'LU1SMIGU3L', 'c7860fdd92bd2591a3c30aa2a5e8bd25055fd71b228e2ede64ac2004ad347fd7', 1, '2021-05-19 09:25:04', 'clienteaccess', '1kNim7SWjwm4JKP6btRfJ-pZRMmoJ-NAA', 'vistas/img/clientes/1621434304.jpg'),
(38, '10474816741', 'BUSTAMANTE GUERRERO ROSA ESTRELLA', 'ROS4ESTR3LL4', '32d3ee3239ab25e4b36bd3d5da3b85b8b1b7d8f41088ddb6bd055f0b7f80ba7e', 1, '2021-05-19 09:28:52', 'clienteaccess', '1_igW1XgrXkdOtIC_Aj39vKbuiY3LWUf7', 'vistas/img/clientes/1621434532.jpg'),
(39, '20605398635', 'CIRCULO SOLUCIONES INTEGRALES S.A.C.', 'C1RCUL0SOL1N', '253b79e139b0dcc95c8d44e07b1f9839026f80f704c6bc1bf53ef3e9dddc11bc', 1, '2021-05-19 09:33:18', 'clienteaccess', '1X0ov9YdKefPrkZck7YC6Tbtiq9fa7qaw', 'vistas/img/clientes/1621434799.png'),
(40, '20605398635', 'DEVALOR LATINOAMERICA S.A.C.', 'D3VAL0R', 'c8607160b24d4b19b3907df92df5abdfc36102c0e5066c6154a96ac63461af68', 0, '2021-05-19 09:39:59', 'clienteaccess', '1J_ODcpbL-1rhxGrNEgSv2xyEpqjlCQUg', 'vistas/img/clientes/1621435200.png'),
(41, '10257902485', 'FALLA HIDALGO ALEXANDER OMAR', 'AL3X4NDER0M4R', '27ed3a6b0e94fbbb86a57c5456df2e477e16ac8f6db7cff4d93d7f12f4b039ec', 0, '2021-05-19 09:43:51', 'clienteaccess', '1_HAdNh97HX35GYjMs0vL62u2gKwCmHxE', 'vistas/img/clientes/1621435431.jpg'),
(42, '10485937973', 'FLORES BAZAN, AZUCENA DEL ROSARIO', 'AZUC3N4', '74925277471231c5be8365bc26fdc18034896ab3120cb13a571a1233e9653672', 1, '2021-05-19 09:49:07', 'clienteaccess', '1FSgMCfFtnhFLneBeosyhnXmScZwy65_R', 'vistas/img/clientes/1621435748.jpg'),
(43, '10435340372', 'FLORES BAZAN, LIZETH NATALY', 'L1ZETHN4TALY', '503307d53030ecf0d911e0989672f7deb0cdfa36f24e05e6ec32e4b8ee8df313', 1, '2021-05-19 09:52:33', 'clienteaccess', '1Z43_2oKBtBVHLErHcWYHE69eTnAUCB7w', 'vistas/img/clientes/1621435953.jpg'),
(44, '20607616621', 'GRUPO PEXGABOL S.A.C.', 'P3XG4BOL', 'cf1611fe24cadc239754bd98945cf3beac6d0006570fe92ff58a37e6950ec6c7', 1, '2021-05-19 09:57:47', 'clienteaccess', '1S7mPhpreRtuxaU09Jcg2wjYE24G7BdAA', 'vistas/img/clientes/1621436268.jpg'),
(45, '20546564593', 'IMPORT & EXPORT WIYA S.A.C.', '1M3XW1YA', '6176980e56124f230350c5f91d1559948e3fff40aa821ed7fe5e95a5424ceb9e', 1, '2021-05-19 10:03:42', 'clienteaccess', '1mTIput7IRH9C2IONLkq-2fYBd3Q3V8pP', 'vistas/img/clientes/1621436623.png'),
(46, '10425968829', 'MARTINEZ, RAUL', 'R4ULM4RT1NEZ', '8710347e9fc4782d5b002aa73809719187b9db18c6a988def48b68c7606e67af', 1, '2021-05-19 10:06:59', 'clienteaccess', '1nymQMNDXIYx0WCJDu0TwmqzwpGXPHjxQ', 'vistas/img/clientes/1621436820.jpg'),
(47, '10066520671', 'MAYORGA CASTRO CARLOS BERNARDO', 'C4RLOSB3RN4RDO', '10c47a67b356ebca7a427b52f70fa556e0946980195d1e6a87226689ed0a73f7', 0, '2021-05-19 10:09:23', 'clienteaccess', '1VbyK-aPWD-QyPQRW8bzpnGCfYX3PuAsc', 'vistas/img/clientes/1621436963.jpg'),
(48, '20606428180', 'NEGOCIACIONES BONANZA S.A.C', 'N3GB0NANZ4', '682f656f6d968f53dba38e3738adcac6270bac607528264828de391fb66acb61', 1, '2021-05-19 10:13:59', 'clienteaccess', '1ukWXp7prj8VIeZeaQ0ICJLza3BMrM9bc', 'vistas/img/clientes/1621437240.jpg'),
(49, '10411639296', 'PAZ VALVERDE ESTEBAN', 'EST3B4N', '416d96c24eb16924f17b08b3856fe32ecfaf8832a8e3b78bf29ee2ec3abab191', 1, '2021-05-19 10:17:16', 'clienteaccess', '1ldZ40BVyF8YPmuz8R7TKzUrTC8T-gIlu', 'vistas/img/clientes/1621437436.jpg'),
(50, '20606873973', 'PORT LATIN E.I.R.L', 'P0RTL4TIN', '19224956520c722bf3a038cff84ca8a29e9d662963fc91016446597a1369bd8c', 1, '2021-05-19 10:20:00', 'clienteaccess', '1HVH_xUp4-3qXZrCPFgDeV3oUXqVQlgsZ', 'vistas/img/clientes/1621437601.jpg'),
(51, '10442435168', 'PUMAYALLI LIMA CARLOS ALBERTO', 'C4RLOS4LB3RT0', '212358392613ad08daf282334f5aa5a1e38a2f150833063c7429a71f1f32ea77', 1, '2021-05-19 10:22:44', 'clienteaccess', '1HIs1MiOD41dxD2kR4NYaXZuC4QQ7TkIs', 'vistas/img/clientes/1621437764.jpg'),
(52, '20601654203', 'QAMAQI INGENIERIA Y CONSTRUCCION S.A.C.', 'Q4MAQ1', '962b40a9e3da87b3640a7342b231c8fdc2ef9f31fbcc89f8e8a526032298ca73', 1, '2021-05-19 10:25:19', 'clienteaccess', '1V2HO2RUtO7jh926Vd7M_9hnQ3c2bgBgb', 'vistas/img/clientes/1621437920.jpeg'),
(53, '17395541862', 'ROJAS ERAZO IRIS OLINDA', '1RISOL1ND4', '366c53303bb81411f51ce04656f00aa465ee0ea1f0395aa82028d93eaf9a5fbb', 1, '2021-05-19 10:28:54', 'clienteaccess', '1QmF-D2eyZMnH1shjRNORWo7v8Hl5OyxX', 'vistas/img/clientes/1621438135.png'),
(54, '10443160146', 'SIFUENTES JIMENEZ ARMANDO ISRAEL', '4RMAND01SR4EL', '63c65d060ae0aa240729d88d5c14367cbaf67ca4abf4565ed6e079f64186c5e0', 1, '2021-05-19 10:32:00', 'clienteaccess', '1seohOdDv5lXm6H-EydZNiFElvtfhv9Wd', 'vistas/img/clientes/1621438320.jpg'),
(55, '10473822577', 'VECORENA LEYTON JOSE ANGEL', 'J0SE4NGEL', '950e2af4b3d3571c8b56a2286a58170d0595fd4dd18f436f91c7417bc830a015', 1, '2021-05-19 10:34:53', 'clienteaccess', '1Qo8b2ylB_tiRlq_BOUr4NADYQ9gNwhuT', 'vistas/img/clientes/1621438493.jpg'),
(56, '15604921632', 'YU DANDAN', 'YUD4ND4N', '56698d9ba50954dca6c49725bf234d7fe441794d81fd9c5d46f20a1cf7a1336f', 1, '2021-05-19 10:38:31', 'clienteaccess', '1790n8gK7_Yi1tuigEpAlPO9fBG_iDewx', 'vistas/img/clientes/1621438711.png'),
(57, '20601447135', 'COORPORACION VALCAR E.I.R.L.', 'V4LCAR', 'dca81ebd59f9d4e311996a9626f2a51a3ea024851b4cc8075488dbd0b91264f7', 1, '2021-05-19 11:37:25', 'clienteaccess', '12eb-6qgrveGJVDD6U7UriCbCi3AFRgh6', 'vistas/img/clientes/1621442245.png'),
(58, '10068024779', 'GALVAN ALVA, EMILY', 'G41V4N', '80f03f5d626cf39edb227a594f447debca6e2420003602fd0ac176e03e375e48', 1, '2021-05-24 15:43:43', 'clienteaccess', '1jxZiMw9OHmjU5dQHiRJhFn_BZYSAv05y', 'vistas/img/clientes/1621889023.jpg'),
(59, '10257905786', 'TAPIA RIVERA, MIGUEL ANGEL', 'T4P14M1GU3L', 'a046f7fe5c5e1418803432f4a4e130d808bfbeed43a5358545a4d5a716788c26', 1, '2021-05-24 15:46:39', 'clienteaccess', '1vECTIx3Phk06q0jRj_wO7tDYKt2MyB2s', 'vistas/img/clientes/1621889199.jpg'),
(60, '20602278868', 'DA & RAMA S.A.C', 'D4&R4M4', '167c432c72f12c54c1beead0a063977257a9f198bc281bcfde1e96d5d081f367', 1, '2021-05-24 15:52:07', 'clienteaccess', '1zaI5yTE2sOXEMUJkRcN-_QNtN2AW8Z8C', 'vistas/img/clientes/1621889528.jpeg'),
(61, '10448034351', 'ELDER JOSE MARTINEZ MALDONADO', '3ld3r', '548a9e49ecf44e3f9ad32ea27238160b884e03c19ebf88e1eddcbba770c925a3', 1, '2021-05-25 15:07:47', 'clienteaccess', '1pilp9VvIp7a-uJa1Bw-zI1zfF-0GvoEA', 'vistas/img/clientes/1621973268.jpg'),
(62, '10415927377', 'COMERCIAL ENZO', 'RonRO', '8e089d0713517d6dcc0698fba62be90456902841cc992965d8f860a822a8b45e', 1, '2021-05-25 15:07:47', 'clienteaccess', '1z8tV_tN4Jxh3R6LmTSaubrSYoEJD6Dfk', 'vistas/img/clientes/1623364012.jpg');

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

CREATE TABLE tipoarchivo(
	idtipoarchivo int primary key auto_increment,
	descripcion varchar(40) not null,
	categoria tinyint not null
);

INSERT INTO `tipoarchivo` (`idtipoarchivo`, `descripcion`, `categoria`) VALUES
(1, 'Reportes Compras', 1),
(2, 'Reportes Ventas', 1),
(3, 'Reportes Tributarios para terceros', 1),
(4, 'Liquidación de Impuestos', 1),
(5, 'Importación DUAS', 1),
(6, 'Gestiones SUNARP', 1),
(7, 'Extracto de pagos', 1),
(8, 'Declaraciones Mensuales', 1),
(9, 'Declaraciones Juradas Anuales', 1),
(10, 'Cronograma de fraccionamiento', 1),
(11, 'Pago de detracciones', 1),
(12, 'Comprobantes de retención', 1),
(13, 'Comprobantes de percepción', 1),
(14, 'Ficha RUC', 1),
(15, 'Tickets AFP', 2),
(16, 'PDT601', 2),
(17, 'Comprobante de Pago AFP', 2),
(18, 'Boletas de Pago', 2),
(19, 'Backup PLAME', 2),
(20, 'Contrato de personal', 2),
(21, 'Altas y Bajas - Trabajadores', 2),
(22, 'Constancia de acreditacion del REMYPE tributario', 2),
(23, 'AFP Y ONP', 2),
(24, 'ESSALUD y sus Microempresa', 2),
(25, 'Auditoria Preventiva', 3),
(26, 'Auditoria Tributaria', 3),
(27, 'Auditoria Financiera', 3);

CREATE TABLE archivo(
	idarchivo int primary key auto_increment,
	idcliente int not null,
	idtipoarchivo int not null,
	nombre varchar(100) not null,
	ruta varchar(100) not null,
	fechacreado timestamp NOT NULL,
	CONSTRAINT fk_arc_cli FOREIGN KEY (idcliente) REFERENCES cliente(idcliente),
	CONSTRAINT fk_arc_tar FOREIGN KEY (idtipoarchivo) REFERENCES tipoarchivo(idtipoarchivo)
);

/*=========================================MODULO COBRANZA=====================*/

create table ubicacion(
	idubicacion int primary key auto_increment,
    departamento varchar(100) not null,
    distrito varchar(100) not null
);

create table localcliente(
	idcliente int,
	idubicacion int,
    direccion varchar(150) not null,
    constraint fk_locli_cli foreign key (idcliente) references cliente(idcliente),
    constraint fk_locli_ubi foreign key (idubicacion) references ubicacion(idubicacion),
    constraint pk_locli primary key (idcliente, idubicacion)
);


create table servicio(
	idservicio int primary key auto_increment,
   	detalleservicio varchar(45) not null
);

create table detalleservicio(
	iddetalleservicio int auto_increment,
    idservicio int,
    idubicacion int,
    monto double not null,
    constraint fk_detser_ser foreign key (idservicio) references servicio(idservicio),
    constraint fk_detser_ubi foreign key (idubicacion) references ubicacion(idubicacion),
    constraint pk_detser primary key(iddetalleservicio, idservicio, idubicacion)
);

create table cobranza(
	idcobranza int  primary key auto_increment,
	detallecobranza varchar(45)
);

create table detalleCobranza(
    idcliente int not null,
    idubicacionl int not null,
    idcobranza int not null,
    iddetalleservicio int not null,
    idservicio int not null,
	idubicacions int not null,
    fechaemision date not null,
    fechavencimiento date not null,
	estado tinyint not null,
    constraint fk_detCob_cli foreign key (idcliente) references localcliente(idcliente),
    constraint fk_detCob_ubil foreign key (idubicacionl) references localcliente(idubicacion),
	constraint fk_detCob_cob foreign key (idcobranza) references cobranza(idcobranza),
	constraint fk_detCob_detser foreign key (iddetalleservicio) references detalleservicio(iddetalleservicio),
	constraint fk_detCob_ser foreign key (idservicio) references detalleservicio(idservicio),
	constraint fk_detCob_ubis foreign key (idubicacions) references detalleservicio(idubicacion),
	constraint pk_detCob primary key(idcliente, idubicacionl, idcobranza, iddetalleservicio, idservicio, idubicacions)
);

create table constancia(
	idconstancia int primary key auto_increment,
	detalle varchar(45) not null
);

create table detalleConstancia(
	idconstancia int,
	idcobranza int,
	idcliente int,
	iddetalleservicio int,
	idservicio int,
	idubicacion int,
	tipopago varchar(45) not null,
	detallepago varchar(45) not null,
	fechapago date not null,
	montototal double not null,
	constraint fk_detCons_cli foreign key (idcliente) references detallecobranza(idcliente),
	constraint fk_detCons_cob foreign key (idcobranza) references detallecobranza(idcobranza),
	constraint fk_detCons_cons foreign key (idconstancia) references constancia(idconstancia),
	constraint fk_detCons_detser foreign key (iddetalleservicio) references detallecobranza(iddetalleservicio),
	constraint fk_detCons_ser foreign key (idservicio) references detallecobranza(idservicio),
	constraint fk_detCons_ubi foreign key (idubicacion) references detallecobranza(idubicacionl),
	constraint pk_detCons primary key(idcliente, idcobranza, idconstancia, iddetalleservicio, idservicio, idubicacion)
);
/*=================================================================================*/

/*=============tabla usuario========================
CREATE TABLE auditoria_usuario(
	idregistro int primary key auto_increment,
	idusuario int not null,
	o_nomusuario varchar(100) not null,
	n_nomusuario varchar(100) not null,
	fecha datetime not null,
	accion varchar(100) not null
);
/*
DROP TRIGGER IF EXISTS `INGRESAR_USUARIO`;
DROP TRIGGER IF EXISTS `ACTUALIZAR_USUARIO`;
DROP TRIGGER IF EXISTS `ELIMINAR_USUARIO`;
*/

/*
DELIMITER $$
CREATE TRIGGER INGRESAR_USUARIO AFTER INSERT ON usuario 
FOR EACH ROW 
BEGIN
	INSERT INTO auditoria_usuario(idusuario,o_nomusuario,fecha,accion) 
	VALUES(new.idusuario,new.nombre,NOW(),"usuario registrado");
END$$
DELIMITER ;

DELIMITER $$
CREATE TRIGGER ACTUALIZAR_USUARIO BEFORE UPDATE ON usuario 
FOR EACH ROW 
BEGIN
	INSERT INTO auditoria_usuario(idusuario,o_nomusuario,n_nomusuario,fecha,accion)
	VALUES(OLD.idusuario,OLD.nombre,NEW.nombre,NOW(),"usuario actualizado");
END$$
DELIMITER ;

DELIMITER $$
CREATE TRIGGER ELIMINAR_USUARIO AFTER DELETE ON usuario 
FOR EACH ROW 
BEGIN
	INSERT INTO auditoria_usuario(idusuario,o_nomusuario,fecha,accion)
	VALUES(OLD.idusuario,OLD.nombre,NOW(),"usuario eliminado");
END$$
DELIMITER ;

*/
/*=================== Tabla Cliente=====================
CREATE TABLE auditoria_cliente(
	idregistro int primary key auto_increment,
	idcliente int not null,
	o_ruc varchar(15) not null,
	n_ruc varchar(15) not null,
	fecha datetime not null,
	accion varchar(100) not null
);
/*
DROP TRIGGER IF EXISTS `INGRESAR_CLIENTE`;
DROP TRIGGER IF EXISTS `ACTUALIZAR_CLIENTE`;
DROP TRIGGER IF EXISTS `ELIMINAR_CLIENTE`;
*/

/*
DELIMITER $$
CREATE TRIGGER INGRESAR_CLIENTE AFTER INSERT ON cliente 
FOR EACH ROW 
BEGIN
	INSERT INTO auditoria_cliente(idcliente,o_ruc,fecha,accion) 
	VALUES(new.idcliente,new.ruc,NOW(),"cliente registrado");
END$$
DELIMITER ;

DELIMITER $$
CREATE TRIGGER ACTUALIZAR_CLIENTE BEFORE UPDATE ON cliente 
FOR EACH ROW 
BEGIN
	INSERT INTO auditoria_cliente(idcliente,o_ruc,n_ruc,fecha,accion)
	VALUES(OLD.idcliente,OLD.ruc,NEW.ruc,NOW(),"cliente actualizado");
END$$
DELIMITER ;

DELIMITER $$
CREATE TRIGGER ELIMINAR_CLIENTE AFTER DELETE ON cliente 
FOR EACH ROW 
BEGIN
	INSERT INTO auditoria_cliente(idcliente,o_ruc,fecha,accion)
	VALUES(OLD.idcliente,OLD.ruc,NOW(),"cliente eliminado");
END$$
DELIMITER ;

/*=========================tabla agenda=======================
CREATE TABLE auditoria_agenda(
	idregistro int primary key auto_increment,
	idcliente int not null,
	idrepresentante int not null,
	o_telefono1 varchar(15) not null,
	n_telefono1 varchar(15) not null,
	fecha datetime not null,
	accion varchar(100) not null
);

DROP TRIGGER IF EXISTS `INGRESAR_AGENDA`;
DROP TRIGGER IF EXISTS `ACTUALIZAR_AGENDA`;
DROP TRIGGER IF EXISTS `ELIMINAR_AGENDA`;

DELIMITER $$
CREATE TRIGGER INGRESAR_AGENDA AFTER INSERT ON agenda
FOR EACH ROW 
BEGIN
	INSERT INTO auditoria_agenda(idcliente,idrepresentante,o_telefono1,fecha,accion) 
	VALUES(new.idcliente,new.idrepresentante,new.telefono1,NOW(),"agenda registrado");
END$$
DELIMITER ;

DELIMITER $$
CREATE TRIGGER ACTUALIZAR_AGENDA BEFORE UPDATE ON agenda 
FOR EACH ROW 
BEGIN
	INSERT INTO auditoria_agenda(idcliente,idrepresentante,o_telefono1,n_telefono1,fecha,accion)
	VALUES(OLD.idcliente,OLD.idrepresentante,OLD.telefono1,NEW.telefono1,NOW(),"agenda actualizado");
END$$
DELIMITER ;

DELIMITER $$
CREATE TRIGGER ELIMINAR_AGENDA AFTER DELETE ON agenda 
FOR EACH ROW 
BEGIN
	INSERT INTO auditoria_agenda(o_idcliente,o_idrepresentante,o_telefono1,fecha,accion)
	VALUES(OLD.idcliente,OLD.idrepresentante,OLD.telefono1,NOW(),"agenda eliminado");
END$$
DELIMITER ;
========================tabla asistencia===============================
CREATE TABLE auditoria_asistencia(
	idregistro int primary key auto_increment,
	idasistencia int not null,
	idusuario int not null,
	o_fechahora datetime not null,
	n_fechahora datetime not null,
	fechaaccion datetime not null,
	accion varchar(100) not null
);
DROP TRIGGER IF EXISTS `INGRESAR_ASISTENCIA`;
DROP TRIGGER IF EXISTS `ACTUALIZAR_ASISTENCIA`;
DROP TRIGGER IF EXISTS `ELIMINAR_ASISTENCIA`;

DELIMITER $$
CREATE TRIGGER INGRESAR_ASISTENCIA AFTER INSERT ON asistencia
FOR EACH ROW 
BEGIN
	INSERT INTO auditoria_asistencia(idasistencia,idusuario,fechaaccion,accion) 
	VALUES(new.idasistencia,new.idusuario,NOW(),"asistencia registrada");
END$$
DELIMITER ;

DELIMITER $$
CREATE TRIGGER ACTUALIZAR_ASISTENCIA BEFORE UPDATE ON asistencia 
FOR EACH ROW 
BEGIN
	INSERT INTO auditoria_asistencia(idasistencia,idusuario,o_fechahora,n_fechahora,fechaaccion,accion)
	VALUES(OLD.idasistencia,OLD.idusuario,OLD.fechahora,NEW.fechahora,NOW(),"asistencia actualizada");
END$$
DELIMITER ;

DELIMITER $$
CREATE TRIGGER ELIMINAR_ASISTENCIA AFTER DELETE ON asistencia 
FOR EACH ROW 
BEGIN
	INSERT INTO auditoria_asistencia(idasistencia,idusuario,fechaaccion,accion)
	VALUES(OLD.idasistencia,OLD.idusuario,NOW(),"asistencia eliminada");
END$$
DELIMITER ;
========================tabla tipousuario===============================
CREATE TABLE auditoria_tipousuario(
	idregistro int primary key auto_increment,
	idtipousuario int not null,
	o_nombre varchar(100) not null,
	n_nombre varchar(100) not null,
	o_descripcion varchar(100)not null,
	n_descripcion varchar(100)not null,
	fechaaccion datetime not null,
	accion varchar(100) not null
);
DROP TRIGGER IF EXISTS `INGRESAR_TIPOUSUARIO`;
DROP TRIGGER IF EXISTS `ACTUALIZAR_TIPOUSUARIO`;
DROP TRIGGER IF EXISTS `ELIMINAR_TIPOUSUARIO`;

DELIMITER $$
CREATE TRIGGER INGRESAR_TIPOUSUARIO AFTER INSERT ON tipousuario
FOR EACH ROW 
BEGIN
	INSERT INTO auditoria_tipousuario(idtipousuario,o_nombre,o_descripcion,fechaaccion,accion) 
	VALUES(new.idtipousuario,new.nombre,new.descripcion,NOW(),"tipo_usuario registrado");
END$$
DELIMITER ;

DELIMITER $$
CREATE TRIGGER ACTUALIZAR_TIPOUSUARIO BEFORE UPDATE ON tipousuario
FOR EACH ROW 
BEGIN
	INSERT INTO auditoria_tipousuario(idtipousuario,o_nombre,o_descripcion,n_nombre,n_descripcion,fechaaccion,accion)
	VALUES(OLD.idtipousuario,OLD.nombre,OLD.descripcion,NEW.nombre,NEW.descripcion,NOW(),"tipo_usuario actualizado");
END$$
DELIMITER ;

DELIMITER $$
CREATE TRIGGER ELIMINAR_TIPOUSUARIO AFTER DELETE ON tipousuario 
FOR EACH ROW 
BEGIN
	INSERT INTO auditoria_tipousuario(idtipousuario,o_nombre,o_descripcion,fechaaccion,accion)
	VALUES(OLD.idtipousuario,OLD.nombre,OLD.descripcion,NOW(),"tipo_usuario eliminado");
END$$
DELIMITER ;
========================tabla departamento==============================
CREATE TABLE auditoria_departamento(
	idregistro int primary key auto_increment,
	iddepartamento int not null,
	o_nombre varchar(100) not null,
	n_nombre varchar(100) not null,
	o_descripcion varchar(100)not null,
	n_descripcion varchar(100)not null,
	fechaaccion datetime not null,
	accion varchar(100) not null
);
DROP TRIGGER IF EXISTS `INGRESAR_DEPARTAMENTO`;
DROP TRIGGER IF EXISTS `ACTUALIZAR_DEPARTAMENTO`;
DROP TRIGGER IF EXISTS `ELIMINAR_DEPARTAMENTO`;

DELIMITER $$
CREATE TRIGGER INGRESAR_DEPARTAMENTO AFTER INSERT ON departamento
FOR EACH ROW 
BEGIN
	INSERT INTO auditoria_departamento(iddepartamento,o_nombre,o_descripcion,fechaaccion,accion) 
	VALUES(new.iddepartamento,new.nombre,new.descripcion,NOW(),"departamento registrado");
END$$
DELIMITER ;

DELIMITER $$
CREATE TRIGGER ACTUALIZAR_DEPARTAMENTO BEFORE UPDATE ON departamento
FOR EACH ROW 
BEGIN
	INSERT INTO auditoria_departamento(iddepartamento,o_nombre,o_descripcion,n_nombre,n_descripcion,fechaaccion,accion)
	VALUES(OLD.iddepartamento,OLD.nombre,OLD.descripcion,NEW.nombre,NEW.descripcion,NOW(),"departamento actualizado");
END$$
DELIMITER ;

DELIMITER $$
CREATE TRIGGER ELIMINAR_DEPARTAMENTO AFTER DELETE ON departamento 
FOR EACH ROW 
BEGIN
	INSERT INTO auditoria_departamento(iddepartamento,o_nombre,o_descripcion,fechaaccion,accion)
	VALUES(OLD.iddepartamento,OLD.nombre,OLD.descripcion,NOW(),"departamento eliminado");
END$$
DELIMITER ;
========================tabla representante============================
CREATE TABLE auditoria_representante(
	idregistro int primary key auto_increment,
	idrepresentante int not null,
	o_detalle varchar(100) not null,
	n_detalle varchar(100) not null,
	o_nombre varchar(100)not null,
	n_nombre varchar(100)not null,
	fechaaccion datetime not null,
	accion varchar(100) not null
);
DROP TRIGGER IF EXISTS `INGRESAR_REPRESENTANTE`;
DROP TRIGGER IF EXISTS `ACTUALIZAR_REPRESENTANTE`;
DROP TRIGGER IF EXISTS `ELIMINAR_REPRESENTANTE`;

DELIMITER $$
CREATE TRIGGER INGRESAR_REPRESENTANTE AFTER INSERT ON representante
FOR EACH ROW 
BEGIN
	INSERT INTO auditoria_representante(idrepresentante,o_detalle,o_nombre,fechaaccion,accion) 
	VALUES(new.idrepresentante,new.detalleCargo,new.nombreCompleto,NOW(),"representante registrado");
END$$
DELIMITER ;

DELIMITER $$
CREATE TRIGGER ACTUALIZAR_REPRESENTANTE BEFORE UPDATE ON representante
FOR EACH ROW 
BEGIN
	INSERT INTO auditoria_representante(idrepresentante,o_detalle,o_nombre,n_detalle,n_nombre,fechaaccion,accion)
	VALUES(OLD.idrepresentante,OLD.detalleCargo,OLD.nombreCompleto,NEW.detalleCargo,NEW.nombreCompleto,NOW(),"representante actualizado");
END$$
DELIMITER ;

DELIMITER $$
CREATE TRIGGER ELIMINAR_REPRESENTANTE AFTER DELETE ON representante 
FOR EACH ROW 
BEGIN
	INSERT INTO auditoria_representante(idrepresentante,o_detalle,o_nombre,fechaaccion,accion)
	VALUES(OLD.idrepresentante,OLD.detalleCargo,OLD.nombreCompleto,NOW(),"representante eliminado");
END$$
DELIMITER ;
*/

