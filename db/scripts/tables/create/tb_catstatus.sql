CREATE TABLE IF NOT EXISTS `tb_catstatus` (
  id int(11) NOT NULL AUTO_INCREMENT,
  fecha_registro datetime default NOW(),
  nombre varchar(50),
  primary key(id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;