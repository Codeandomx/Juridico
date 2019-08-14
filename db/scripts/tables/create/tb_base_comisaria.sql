CREATE TABLE `Tb_Empleados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `paterno` varchar(45) DEFAULT NULL,
  `materno` varchar(45) DEFAULT NULL,
  `nombreCompleto` varchar(45) DEFAULT NULL,
  `rfc` varchar(45) DEFAULT NULL,
  `curp` varchar(45) DEFAULT NULL,
  `fechaNacimiento` date DEFAULT NULL,
  `imss` varchar(45) DEFAULT NULL,
  `estadoNacimiento` int(11) DEFAULT NULL,
  `MunicipioNacimiento` varchar(45) DEFAULT NULL,
  `nacionalidad` varchar(30) DEFAULT NULL,
  `MunicipioActual` varchar(45) DEFAULT NULL,
  `domicilio` varchar(45) DEFAULT NULL,
  `colonia` varchar(45) DEFAULT NULL,
  `cp` int(11) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `celular` varchar(45) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `civil` int(11) DEFAULT NULL,
  `sexo` int(11) DEFAULT NULL,
  `sangre` varchar(3) DEFAULT NULL,
  `password` varchar(155) DEFAULT NULL,
  `est_pass` int(11) NOT NULL,
  `estado` int(11) DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `estudios` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IdEmpleado` (`user`),
  KEY `user` (`user`)
) ENGINE=InnoDB AUTO_INCREMENT=9848 DEFAULT CHARSET=latin1;
;


CREATE TABLE `Tb_DatosLaborales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) DEFAULT NULL,
  `rfc` varchar(45) DEFAULT NULL,
  `cuip` varchar(45) DEFAULT NULL,
  `ingreso` date DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL,
  `direccion` int(11) DEFAULT NULL,
  `departamento` int(11) DEFAULT NULL,
  `nombramiento` int(11) DEFAULT NULL,
  `puesto` varchar(25) DEFAULT NULL,
  `plaza` varchar(25) DEFAULT NULL,
  `servicio` varchar(300) DEFAULT NULL,
  `ext` varchar(10) DEFAULT NULL,
  `fechaext` date DEFAULT NULL,
  `telegramid` varchar(45) DEFAULT NULL,
  `checa` int(11) DEFAULT NULL,
  `tipohorario` int(11) DEFAULT NULL,
  `horaentrada` time DEFAULT NULL,
  `horasalida` time DEFAULT NULL,
  `horas` int(11) DEFAULT NULL,
  `d1` int(11) DEFAULT NULL,
  `d2` int(11) DEFAULT NULL,
  `d3` int(11) DEFAULT NULL,
  `d4` int(11) DEFAULT NULL,
  `d5` int(11) DEFAULT NULL,
  `d6` int(11) DEFAULT NULL,
  `d7` int(11) DEFAULT NULL,
  `df` int(11) DEFAULT NULL,
  `observacioneshorario` varchar(100) DEFAULT NULL,
  `f_confirmacion` date DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IdEmpleado` (`user`)
) ENGINE=InnoDB AUTO_INCREMENT=9821 DEFAULT CHARSET=latin1;


SELECT * FROM db_helpdesk.Tb_DatosLaborales WHERE USER = 23326

CREATE TABLE `Tb_Departamentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `estado` int(11) DEFAULT NULL,
  `operativo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=301 DEFAULT CHARSET=latin1;

CREATE TABLE `Tb_CatDirecciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  `estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

CREATE TABLE `Tb_CatTipoEmpleado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `estado` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

CREATE TABLE `Tb_CatNombramientos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `nivel` int(11) DEFAULT NULL,
  `operativo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=137 DEFAULT CHARSET=latin1;

CREATE TABLE `Tb_CatEstadoEmpleados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

CREATE TABLE `Tb_CatSexo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre_UNIQUE` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;