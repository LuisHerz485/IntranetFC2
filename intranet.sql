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
	fechaCreada timestamp NOT NULL,
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
	CONSTRAINT fk_as_horario FOREIGN KEY (idhorario) REFERENCES horario(idhorario)
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

/*================================== COBRANZA ===============================================*/

create table ubicacion(
        idubicacion int primary key auto_increment,
	departamento varchar(100) not null,
	distrito varchar(100) not null
);

INSERT INTO `ubicacion` (`idubicacion`, `distrito`, `departamento`) VALUES
(1, 'ANCON', 'LIMA'),
(2, 'ATE', 'LIMA'),
(3, 'BARRANCO', 'LIMA'),
(4, 'BREÑA', 'LIMA'),
(5, 'CARABAYLLO', 'LIMA'),
(6, 'CHACLACAYO', 'LIMA'),
(7, 'CHORRILLOS', 'LIMA'),
(8, 'CIENEGUILLA', 'LIMA'),
(9, 'COMAS', 'LIMA'),
(10, 'EL AGUSTINO', 'LIMA'),
(11, 'INDEPENDENCIA', 'LIMA'),
(12, 'JESUS MARIA', 'LIMA'),
(13, 'LA MOLINA', 'LIMA'),
(14, 'LA VICTORIA', 'LIMA'),
(15, 'LIMA', 'LIMA'),
(16, 'LINCE', 'LIMA'),
(17, 'LOS OLIVOS', 'LIMA'),
(18, 'LURIGANCHO', 'LIMA'),
(19, 'LURIN', 'LIMA'),
(20, 'MAGDALENA DEL MAR', 'LIMA'),
(21, 'PUEBLO LIBRE', 'LIMA'),
(22, 'MIRAFLORES', 'LIMA'),
(23, 'PACHACAMAC', 'LIMA'),
(24, 'PUCUSANA', 'LIMA'),
(25, 'PUENTE PIEDRA', 'LIMA'),
(26, 'PUNTA HERMOSA', 'LIMA'),
(27, 'PUNTA NEGRA', 'LIMA'),
(28, 'RIMAC', 'LIMA'),
(29, 'SAN BARTOLO', 'LIMA'),
(30, 'SAN BORJA', 'LIMA'),
(31, 'SAN ISIDRO', 'LIMA'),
(32, 'SAN JUAN DE LURIGANCHO', 'LIMA'),
(33, 'SAN JUAN DE MIRAFLORES', 'LIMA'),
(34, 'SAN LUIS', 'LIMA'),
(35, 'SAN MARTIN DE PORRES', 'LIMA'),
(36, 'SAN MIGUEL', 'LIMA'),
(37, 'SANTA ANITA', 'LIMA'),
(38, 'SANTA MARIA DEL MAR', 'LIMA'),
(39, 'SANTA ROSA', 'LIMA'),
(40, 'SANTIAGO DE SURCO', 'LIMA'),
(41, 'SURQUILLO', 'LIMA'),
(42, 'VILLA EL SALVADOR', 'LIMA'),
(43, 'VILLA MARIA DEL TRIUNFO', 'LIMA'),
(44, 'CALLAO', 'CALLAO'),
(45, 'LAS MERCEDES', 'IQUITOS'),
(46, 'MONSERRATE', 'TRUJILLO'),
(47, 'VENTANILLA', 'CALLAO');

create table localcliente(
	idlocalcliente int auto_increment,
    idcliente int,
	idubicacion int,
	direccion varchar(150) not null,
	CONSTRAINT fk_lc_c FOREIGN KEY (idcliente) REFERENCES cliente(idcliente),
	CONSTRAINT fk_lc_u FOREIGN KEY (idubicacion) REFERENCES ubicacion(idubicacion),
	CONSTRAINT pk_lc PRIMARY KEY (idlocalcliente,idcliente,idubicacion)
);

INSERT INTO `localcliente` (`idlocalcliente`,`idcliente`, `idubicacion`, `direccion`) VALUES
(1, 1, 35, 'MZ. F LTE. 10 - VIRGEN DE LA PUERTA'),
(2, 2, 21, 'PQ. DE LA PUENTE Y CORTEZ 121.'),
(3, 3, 44, 'AV. VIRREY CONDE DE LEMOS 538 - URB. CHB. RESIDENCIAL VILLA BONITA.'),
(4, 4, 44, 'AV. VIRREY CONDE DE LEMOS 538 - URB. CHB. RESIDENCIAL VILLA BONITA.'),
(5, 5, 44, 'CAL. JORGE COLQUE MZ. H1 LTE. 33 - URB. SAN JUAN.'),
(6, 6, 9, 'JR. RIO CHIRA - MZ. J LTE. 12 - URB. SANTA ISOLINA.'),
(7, 7, 12, 'AV. HORACIO URTEAGA 722 (INT. 903).'),
(8, 8, 30, 'AV. SAN LUIS 3068 (PISO 5).'),
(9, 9, 30, 'AV. SAN LUIS 3068 (PISO 5).'),
(10, 10, 12, 'AV. SAN FELIPE 601 (DPTO. 1703) (TORRE B).'),
(11, 11, 17, 'MZ. G LT.05 CALLE A - URB. TAURIJA.'),
(12, 12, 44, 'AV. VIRREY CONDE DE LEMOS - MZ. C LTE. 01 (INT. 701) - CND. VILLA BONITA II.'),
(13, 13, 22, 'CAL. AURELIO FERNANDEZ CONCHA 241 - URB. EL ROSEDAL.'),
(14, 14, 35, 'JR. MADRE DE DIOS 3816.'),
(15, 15, 44, 'AV. VIRREY CONDE DE LEMOS - MZ. C LTE. 01 (INT. 701) - CND. VILLA BONITA II.'),
(16, 16, 14, 'AV. JAIME BAUSATE Y MEZA 444.'),
(17, 17, 44, 'AV. VIRREY CONDE DE LEMOS - MZ. C LTE. 01 (INT. 701) - CND. VILLA BONITA II.'),
(18, 18, 35, 'MZ. F LTE. 10 - VIRGEN DE LA PUERTA.'),
(19, 20, 35, 'MZ. F LTE. 10 - VIRGEN DE LA PUERTA.'),
(20, 21, 15, 'AV. NICOLÁS DE PIERÓLA 1607 (INT. 222).'),
(21, 23, 35, 'MZ. B LTE. 33 - ASOCIACION RESIDENCIAL VILLA LOS OLIVOS'),
(22, 24, 35, 'AV. UNIVERSITARIA MZ. O LTE. 42 - URB. EL PACIFICO (2° ETAPA).'),
(23, 25, 35, 'MZ B. LTE 33 - ASOC. RESID. VILLA LOS OLIVOS.'),
(24, 26, 45, 'MZ. A LTE. 10 - CAL. SAN LUIS - A.H.'),
(25, 27, 25, 'A.H. Participación.'),
(26, 28, 25, 'A.H. Participación.'),
(27, 29, 33, 'AV. ALMTE MIGUEL GRAU COO. UMAMARCA.'),
(28, 30, 44, 'AV. VIRREY CONDE DE LEMOS 538 - URB. CHB. RESIDENCIAL VILLA BONITA.'),
(29, 31, 13, 'Av. Elías Aparicio Nro. 880.'),
(30, 32, 44, 'CAL. 7 MZ. K LTE.28 - URB. SESQUICENTENARIO.'),
(31, 33, 40, 'AV. SAN JUAN 126 INT. 5 - A.H. LA HUACA.'),
(32, 34, 5, 'CAL. AUGUSTO SALAVERRY 296 - URB. LUCYANA.'),
(33, 35, 15, 'JR. ANGARAES 484 ( DPTO. 306) - BARRIO UNIÓN.'),
(34, 36, 13, 'CAL. VICTORIA G1 - URB. LA RINCONADA II.'),
(35, 37, 13, 'MANTARO MZ. G LTE. 7 (DPTO. 102) - ASOC. PABLO BONER.'),
(36, 38, 44, 'MZ. K LTE.28 - URB. SESQUICENTENARIO.'),
(37, 39, 17, 'C.H. CARLOS CUETO FERNANDINI 2DA ETAPA - PJ. L (N° 119) / ALT. COLEGIO PERU JAPON'),
(38, 41, 4, 'AV. MCAL ORBEGOZO 186 (DPTO. 406).'),
(39, 42, 46, 'MZ. K LTE. 10 - URB. MOSERRATE III ETAPA.'),
(40, 43, 47, 'MZ. X LTE. 01 SECTOR A SUBSECTOR 1 - URB. ANTONIA MORENO DE CACERES.'),
(41, 44, 13, 'CAL. VICTORIA G1 - URB. LA RINCONADA II.'),
(42, 45, 25, 'MZ. P LTE. 13 - A.H. LA ENSENADA DE CHILLON ( 2 CUADRAS COLEGIO PERUANO SUIZO).'),
(43, 46, 35, 'MZ. F LTE. 10 - VIRGEN DE LA PUERTA.'),
(44, 47, 7, 'MLC. COSTA SUR 570.'),
(45, 48, 9, 'AV. 22 DE AGOSTO MZ. E3 LTE.14 - URB. SANTA LUZMILA.'),
(46, 49, 17, 'AV. UNIVERSITARIA CDRA 47 PUESTO 244 MERCADO MERPROLIMA.'),
(47, 50, 12, 'AV. HORACIO URTEAGA 722 (INT. 903).'),
(48, 51, 35, 'AV. JOHN FITZGERALD KENNEDY 161 - URB. VALDIVIEZO.'),
(49, 52, 9, 'MZ. G LTE. 7 (DPTO. 1506) - URB. CIUDAD SOL DE COLLIQUE.'),
(50, 53, 21, 'CAL. DIEGO DE MEDINA 196 - URB. LA MAR'),
(51, 54, 9, 'MZ. G LTE. 7 (DPTO. 1506) - URB. CIUDAD SOL DE COLLIQUE.'),
(52, 55, 47, 'MZ. X LTE. 01 - URB. ANTONIA MORENO DE CACERES.'),
(53, 56, 12, 'AV. HORACIO URTEAGA 722 (INT. 903).'),
(54, 57, 9, 'Av. Victor Andres Belaunde Es Nro. 1211 A.H. el Carmen'),
(55, 58, 4, 'PJ. LUPUMA NRO. 127 INT. 102 - POR LA MUNICIPALIDAD LIMA.'),
(56, 59, 4, 'PJ. LUPUMA NRO. 127 INT. 102 - POR LA MUNICIPALIDAD LIMA.'),
(57, 60, 15, 'JR. ANDAHUAYLAS 1138 ( INT. 116 ) - URB. BARRIOS ALTOS'),
(58, 61, 15, 'URB. BARRIOS ALTOS JR. ANDAHUAYLAS 956.'),
(59, 62, 15, 'URB. BARRIOS ALTOS JR. HUALLAGA 652 Int 501.');

create table categoriaservicio(
        idcategoriaservicio int primary key auto_increment,
	nombre varchar(50) not null,
	descripcion varchar(500) not null
);

INSERT INTO `categoriaservicio` (`idcategoriaservicio`, `nombre`, `descripcion`) VALUES
(1, 'Servicios de Tributación', 'Brindamos servicios tanto para la planificación de sus operaciones como para la solución de controversias de índole tributaria, derivadas de procesos de fiscalización. Control y auditoría que permitan la correcta tributación.'),
(2, 'Servicios Contables', 'En FC brindamos el apoyo que necesita para elaborar de manera exitosa la documentación contable de la empresa, verificando el correcto cumplimiento de la normativa tributaria y contable que ayuden en la toma de decisiones de la empresa.'),
(3, 'Servicios de Planillas', 'Somos especialistas en asegurar el proceso de Planillas con el debido cálculo de beneficios sociales: CTS, utilidades, gratificaciones, y otros. Con el objetivo de brindar a nuestros clientes, tranquilidad y seguridad, permitiéndoles atender el pago oportuno de sus colaboradores en forma exacta y sencilla.'),
(4, 'Servicios de Recursos Humanos', 'Especificar el rol que se desempeña en el servicio de RRHH como empresa tercerizada y a cargo de quién está este proceso.'),
(5, 'Soluciones de Procesos de Negocios', 'Brindamos asesorías y apoyo para que tu negocio sea lo suficientemente flexible para adaptarse a diversas situaciones, asimismo, se brindará administración de procesos contables de impuestos y tecnológicos utilizando profesionales capacitados en soporte técnico y servicios relacionados a los proyectos requeridos.');

create table servicio(
        idservicio int primary key auto_increment,
	idcategoriaservicio int,
	nombre varchar(100) not null,
	descripcion varchar(200) not null,
	precio double not null,
	CONSTRAINT fk_s_cs FOREIGN KEY (idcategoriaservicio) REFERENCES categoriaservicio(idcategoriaservicio)
);

INSERT INTO `servicio` (`idservicio`, `idcategoriaservicio`, `nombre`, `descripcion`, `precio`) VALUES
(1, 1, 'Auxiliar de servicio', 'Auxiliar de servicio', 0),
(2, 1, 'Revisión Mensual y/o Anual', 'Determinación y/o revisión del cumplimiento tributario mensual y/o anual.', 110.5),
(3, 1, 'Diagnóstico y Planeamiento Tributario', 'Diagnóstico y Planeamiento Tributario para detectar posibles contingencias.', 110.5),
(4, 1, 'Libros físicos y electrónicos', 'Elaboración, actualización y asesoría en la implementación de libros físicos y electrónicos.', 110.5),
(5, 1, 'Tributos', 'Asistencia en Procedimientos de Compensación, Devolución y/o Recuperación de tributos.', 110.5),
(6, 1, 'SPOT', 'Control de operaciones sujetas al SPOT.', 110.5),
(7, 1, 'Fiscalización y Defensa tributaria', 'Apoyo en procesos de fiscalización y Defensa tributaria.', 110.5),
(8, 1, 'Consultoría', 'Consultoría tributaria permanente.', 110.5),
(9, 1, 'Capacitación', 'Capacitación In-House en Materia Tributaria.', 110.5),
(10, 1, 'Outsourcing Tributario', 'Outsourcing Tributario.', 110.5),
(11, 1, 'Fiscalizaciones tributarias', 'Atención de fiscalizaciones tributarias.', 110.5),
(12, 1, 'Consultoría y auditoria tributaria', 'Consultoría y auditoria tributaria.', 110.5),
(13, 1, 'Asistencia empresarial', 'Brindar asistencia en la toma de decisiones empresariales, con el objeto de lograr el menor costo tributario y el menor nivel de contingencia tributaria posible.', 110.5),
(14, 2, 'Operaciones y /o transacciones contables.', 'Control, revisión, registro y proceso de operaciones y /o transacciones contables.', 110.5),
(15, 2, 'Control administrativo y contable', 'Revisión y evaluación de control administrativo y contable.', 110.5),
(16, 2, 'Generación de libros contables', 'Proceso y generación de libros contables: oficiales y auxiliares.', 110.5),
(17, 2, 'Análisis de cuentas y reportes gerenciales', 'Análisis de cuentas y reportes gerenciales.', 110.5),
(18, 2, 'Implementación de adopción de NIIF', 'Implementación de adopción de NIIF.', 110.5),
(19, 2, 'Actualización de la aplicación de NIIF', 'Actualización de la aplicación de NIIF.', 110.5),
(20, 2, 'Elaboración de presupuestos', 'Elaboración de presupuestos.', 110.5),
(21, 2, 'Conceptualización de actividades empresariales', 'Conceptualización de actividades empresariales.', 110.5),
(22, 2, 'Financieros mensuales y anuales', 'Elaboración de estados financieros mensuales y anuales.', 110.5),
(23, 2, 'Presentación de libros electrónicos', 'Presentación de libros electrónicos.', 110.5),
(24, 3, 'Asesoramiento en Contratos y Problemas Laborales', 'Asesoramiento en Contratos y Problemas Laborales.', 110.5),
(25, 3, 'Planillas y boletas de pago mensuales ', 'Proceso en la elaboración de Planillas Mensuales y de la emisión de Boletas de Pago.', 110.5),
(26, 3, 'Proceso y Pago de CTS', 'Proceso y Pago de Compensación por Tiempo de Servicios (CTS).', 110.5),
(27, 3, 'Asesoramiento para Inspecciones Laborales', 'Asesoramiento para Inspecciones Laborales.', 110.5),
(28, 3, 'Gratificaciones, vacaciones y cálculo de trabajadores', 'Proceso de la provisión de gratificaciones, vacaciones y cálculo de participación de los trabajadores.', 110.5),
(29, 3, 'Diagnóstico preventivo y correctivo', 'Diagnóstico preventivo y correctivo.', 110.5),
(30, 3, 'Autoridad laboral y AFP', 'Cumplimiento de obligaciones ante la autoridad laboral y AFP.', 110.5),
(31, 3, 'AFFNet y PDT PLAME', 'Elaboración y declaración de AFFNet y PDT PLAME.', 110.5),
(32, 3, 'Elaboración y actualización de T-Registro', 'Elaboración y actualización de T-Registro.', 110.5),
(33, 3, 'Emisión de asientos contables', 'Emisión de asientos contables.', 110.5),
(34, 4, 'Búsqueda y Selección de Profesionales', 'Búsqueda y Selección de Profesionales.', 110.5),
(35, 4, 'Contratación y registro de Personal', 'Contratación y registro de Personal.', 110.5),
(36, 4, 'Gestión de contratación de Seguros Vida Ley', 'Gestión de contratación de Seguros Vida Ley.', 110.5),
(37, 4, 'Apertura de cuentas de depósito de CTS', 'Apertura de cuentas de depósito de CTS.', 110.5),
(38, 4, 'Recuperación de subsidios', 'Recuperación de subsidios.', 110.5),
(39, 4, 'Consultoría Organizacional', 'Consultoría Organizacional.', 110.5),
(40, 5, 'Planeamiento de la toma de inventario físico', 'Planeamiento de la toma de inventario físico.', 110.5),
(41, 5, 'Inventario físico', 'Elaboración del informe final de la toma de inventario físico.', 110.5),
(42, 5, 'Administración de carpeta digital y gestor documental', 'Administración de carpeta digital y gestor documental.', 110.5),
(43, 5, 'Servicio de facturación de ventas de bienes y/o servicios.', 'Servicio de facturación, por las operaciones de ventas de bienes y/o servicios.', 110.5),
(44, 5, 'Servicio de cobranzas y proceso de operaciones de cobranzas', 'Servicio de cobranzas, con relación a los procedimientos de control, registro y proceso de operaciones de cobranzas.', 110.5),
(45, 5, 'Manejo de campañas publicitarias y web', 'Manejo de campañas publicitarias y web.', 110.5),
(46, 5, 'Apoyo en manejo de CRM', 'Apoyo en manejo de CRM.', 110.5);

create table plan(
        idplan int primary key auto_increment,
	nombre varchar(50) not null,
	descripcion varchar(200) not null,
	precio double not null
);

INSERT INTO `plan` (`idplan`, `nombre`, `descripcion`, `precio`) VALUES
(1, 'Plan Auxiliar', 'Plan auxiliar.', 0),
(2, 'Plan Inicial', 'Negocios con facturación hasta de S/. 30, 000 anual. Comprobantes de ventas/compras máximo 100 por mes.', 200),
(3, 'Plan Básico', 'Negocios con facturación hasta de S/. 50, 000 anual. Comprobantes de ventas/compras máximo 200 por mes.', 300),
(4, 'Plan Intermedio', 'Negocios con ventas anuales de hasta S/. 300, 000. Comprobantes de ventas/compras máximo 300 por mes.', 400),
(5, 'Plan Premiun', 'Negocios con ventas anuales de hasta S/. 1, 000, 000. Comprobantes de ventas/compras máximo 500 por mes.', 600);


create table detalleplan(
        idplan int,
	idservicio int,
	nombre varchar(50) not null,
	descripcion varchar(200) not null,
	CONSTRAINT fk_dp_p FOREIGN KEY (idplan) REFERENCES plan(idplan),
	CONSTRAINT fk_dp_s FOREIGN KEY (idservicio) REFERENCES servicio(idservicio),
	CONSTRAINT pk_dp PRIMARY KEY (idplan,idservicio)
);

INSERT INTO `detalleplan` (`idplan`, `idservicio`, `nombre`, `descripcion`) VALUES
(2, 3, '', 'Diagnóstico y Planeamiento Tributario para detectar posibles contingencias.'),
(2, 14, '', 'Control, revisión, registro y proceso de operaciones y /o transacciones contables.'),
(2, 29, '', 'Diagnóstico preventivo y correctivo.'),
(3, 3, '', 'Diagnóstico y Planeamiento Tributario para detectar posibles contingencias.'),
(3, 14, '', 'Control, revisión, registro y proceso de operaciones y /o transacciones contables.'),
(3, 25, '', 'Proceso en la elaboración de Planillas Mensuales y de la emisión de Boletas de Pago.'),
(4, 3, '', 'Control, revisión, registro y proceso de operaciones y /o transacciones contables.'),
(4, 14, '', 'Proceso en la elaboración de Planillas Mensuales y de la emisión de Boletas de Pago.'),
(4, 25, '', 'Proceso en la elaboración de Planillas Mensuales y de la emisión de Boletas de Pago.'),
(5, 3, '', 'Diagnóstico y Planeamiento Tributario para detectar posibles contingencias.'),
(5, 14, '', 'Control, revisión, registro y proceso de operaciones y /o transacciones contables.'),
(5, 25, '', 'Proceso en la elaboración de Planillas Mensuales y de la emisión de Boletas de Pago.');

create table cobranza(
        idcobranza int primary key auto_increment,
	idlocalcliente int,
	idcliente int,
	idubicacion int,
	fechaemision timestamp NOT NULL DEFAULT current_timestamp(),
	fechavencimiento timestamp NOT NULL DEFAULT current_timestamp(),
	estado tinyint not null,
	descripcion varchar(45),
	CONSTRAINT fk_c_lc FOREIGN KEY (idlocalcliente) REFERENCES localcliente(idlocalcliente),
	CONSTRAINT fk_c_c FOREIGN KEY (idcliente) REFERENCES cliente(idcliente),
	CONSTRAINT fk_c_u FOREIGN KEY (idubicacion) REFERENCES ubicacion(idubicacion)
);

create table detallecobranza(
	iddetallecobranza int primary key auto_increment,
        idcobranza int,
	idplan int,
	idservicio int,
	estado tinyint not null,
	nombre varchar(50) not null,
	precio double not null,
	nota varchar(100) not null,
	CONSTRAINT fk_dc_c FOREIGN KEY (idcobranza) REFERENCES cobranza(idcobranza),
	CONSTRAINT fk_dc_p FOREIGN KEY (idplan) REFERENCES plan(idplan),
	CONSTRAINT fk_dc_s FOREIGN KEY (idservicio) REFERENCES servicio(idservicio)
);

create table constancia(
        idconstancia int primary key auto_increment,
	idcobranza int,
	iddetallecobranza int,
	fechapago date not null,
	tipopago varchar(50) not null,
	monto double not null,
	nota varchar(100),
	CONSTRAINT fk_c_cob FOREIGN KEY (idcobranza) REFERENCES cobranza(idcobranza),
	CONSTRAINT fk_c_dc FOREIGN KEY (iddetallecobranza) REFERENCES detallecobranza(iddetallecobranza)
);


/*=========================Modulo Permisos================================*/

 
CREATE TABLE tipopermiso(
	idtipopermiso int auto_increment primary key,
	nombrepermiso varchar(50) not null
);
CREATE TABLE estadopermiso(
	idestadopermiso int auto_increment primary key,
	nombreestadopermiso varchar(50) not null
);

CREATE TABLE permiso(
	idpermiso int auto_increment primary key,
	idusuario int not null,
	idtipopermiso int not null,
	idestadopermiso int not null,
	detalle varchar(500) not null,
	fechacreacion datetime not null DEFAULT current_timestamp(),
	fechainicio datetime not null,
	fechafin datetime not null,
	fecharevision datetime,
	CONSTRAINT fk_pe_us FOREIGN KEY (idusuario) REFERENCES usuario(idusuario),
	CONSTRAINT fk_pe_tp FOREIGN KEY (idtipopermiso) REFERENCES tipopermiso(idtipopermiso),
	CONSTRAINT fk_pe_etp FOREIGN KEY (idestadopermiso) REFERENCES estadopermiso(idestadopermiso)
);

INSERT INTO `tipopermiso`(`nombrepermiso`) VALUES ('Por Motivos Familiares');
INSERT INTO `tipopermiso`(`nombrepermiso`) VALUES ('Por Matrimonio');
INSERT INTO `tipopermiso`(`nombrepermiso`) VALUES ('Por Mudanza');
INSERT INTO `tipopermiso`(`nombrepermiso`) VALUES ('Por deberes publicos');
INSERT INTO `tipopermiso`(`nombrepermiso`) VALUES ('Por Salud');
INSERT INTO `tipopermiso`(`nombrepermiso`) VALUES ('Por Examenes');
INSERT INTO `tipopermiso`(`nombrepermiso`) VALUES ('Por Viajes');
INSERT INTO `tipopermiso`(`nombrepermiso`) VALUES ('Por Motivos Personales');
INSERT INTO `tipopermiso`(`nombrepermiso`) VALUES ('Por otros motivos');

INSERT INTO `estadopermiso`(`nombreestadopermiso`) VALUES ('Pendiente');
INSERT INTO `estadopermiso`(`nombreestadopermiso`) VALUES ('Aprobado');
INSERT INTO `estadopermiso`(`nombreestadopermiso`) VALUES ('No Aprobado');


/*=========================Modulo Check List================================*/


CREATE TABLE checklist(
	idchecklist int auto_increment primary key,
	idtipousuario int not null,
	iddepartamento int not null,
	idusuario int not null,
	fecha date not null,
	CONSTRAINT fk_cl_tu FOREIGN KEY (idtipousuario) REFERENCES tipousuario(idtipousuario),
	CONSTRAINT fk_cl_d FOREIGN KEY (iddepartamento) REFERENCES departamento(iddepartamento),
	CONSTRAINT fk_cl_u FOREIGN KEY (idusuario) REFERENCES usuario(idusuario)
);

CREATE TABLE estadochecklist(
	idestadochecklist int auto_increment primary key,
	nombre varchar(30) not null
);

CREATE TABLE detallechecklist(
	iddetallechecklist int auto_increment primary key,
	idchecklist int not null,
	idestadochecklist int not null,
	detalle varchar(200) not null,
	horainicio time not null,
	horafin time not null,
	CONSTRAINT fk_dcl_cl FOREIGN KEY (idchecklist) REFERENCES checklist(idchecklist),
	CONSTRAINT fk_dcl_ecl FOREIGN KEY (idestadochecklist) REFERENCES estadochecklist(idestadochecklist)
);

INSERT INTO `estadochecklist`(`nombre`) VALUES ('Pendiente');
INSERT INTO `estadochecklist`(`nombre`) VALUES ('Realizado');
INSERT INTO `estadochecklist`(`nombre`) VALUES ('Cancelado');
INSERT INTO `estadochecklist`(`nombre`) VALUES ('Suspendido');


CREATE TABLE horario (
  idhorario int auto_increment primary key,
  horaInicio time NOT NULL,
  horafin time NOT NULL,
  estado int NOT NULL,
);
INSERT INTO (horaInicio, horafin,idhorario) VALUES('8:30:00', '16:30:00',1);
ALTER TABLE asistencia ADD idhorario INT NULL DEFAULT 1 AFTER detalle;
ALTER TABLE asistencia ADD CONSTRAINT fk_as_hor FOREIGN KEY (idhorario) REFERENCES horario(idhorario) ON DELETE RESTRICT ON UPDATE RESTRICT;

/*===============================ALTER======================================*/

ALTER TABLE permiso ADD idrevisor INT NULL DEFAULT NULL AFTER idestadopermiso;
ALTER TABLE permiso ADD CONSTRAINT fk_pe_rev FOREIGN KEY (idrevisor) REFERENCES usuario(idusuario) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE permiso ADD observacion VARCHAR(300) NULL DEFAULT NULL AFTER fecharevision;

/*========================Cambios solicitados por señor Fredy 4/10/2021===================================**/

ALTER TABLE checklist ADD idasignador INT NULL AFTER idusuario;

ALTER TABLE checklist ADD CONSTRAINT fk_cl_ch FOREIGN KEY (idasignador) REFERENCES usuario(idusuario) ON DELETE RESTRICT ON UPDATE RESTRICT;

UPDATE checklist SET idasignador=idusuario;

ALTER TABLE checklist CHANGE idasignador idasignador INT(11) NOT NULL;

ALTER TABLE detallechecklist CHANGE detalle detalle VARCHAR(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL;
