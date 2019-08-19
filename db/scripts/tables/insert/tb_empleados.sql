SELECT * FROM juridico.tb_empleados;

truncate table tb_empleados;

load data infile  'C:\Tb_Empleados.csv' into table tb_empleados fields terminated by ',';