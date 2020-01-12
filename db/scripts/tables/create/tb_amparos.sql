CREATE TABLE IF NOT EXISTS `tb_amparos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_ingreso` date DEFAULT NULL,
  `abogado` int(11) DEFAULT NULL,
  `quejoso` text DEFAULT NULL,
  `juzgado_y_expediente` text DEFAULT NULL,
  `acto_reclamo` text DEFAULT NULL,
  `suspension` int(11) DEFAULT NULL,
  `recurso_diverso` text DEFAULT NULL,
  `activo_pasivo` int(11) DEFAULT NULL,
  `sentencia` text DEFAULT NULL,
  `fecha_ejecutoria` date DEFAULT NULL,
  `recurso_revision` text DEFAULT NULL,
  `semaforo` int(11) DEFAULT NULL,
  `incidente_ejecucion`int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `status_procesal_actual` texT DEFAULT NULL,
  `created_at` timestamp,
  `updated_at` timestamp,
  PRIMARY KEY (`id`),
  foreign key(suspension) references tb_catsuspensiones(id),
  foreign key(activo_pasivo) references tb_catactivospasivos(id),
  foreign key(semaforo) references tb_catsemaforo(id),
  foreign key(incidente_ejecucion) references tb_catincidente(id),
  foreign key(status) references tb_catstatus(id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

alter table tb_amparos add requerimientos varchar(250) null;

alter table tb_amparos add activo bit default 1;