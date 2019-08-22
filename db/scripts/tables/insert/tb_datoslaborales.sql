truncate table tb_datoslaborales;

load data local infile  'C:\Tb_DatosLaborales.csv' into table tb_datoslaborales fields terminated by ',';
-- load data local infile '/home/codeando/github/Juridico/db/scripts/tables/data/Tb_DatosLaborales.csv' into table tb_datoslaborales fields terminated by ',';
