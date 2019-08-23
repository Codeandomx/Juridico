truncate table tb_empleados;

load data local infile '/home/codeando/github/Juridico/db/scripts/tables/data/Tb_Empleados.csv' into table tb_empleados fields terminated by ',';