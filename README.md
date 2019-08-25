# Juridico
Sistema departamento jurido

## Instalación en sistemas basados en ubuntu

Instalación de composer.-

```
sudo apt composer
```

Instalación de php.-

```
apt-get install software-properties-common
add-apt-repository ppa:ondrej/php
apt-get update
apt-get install php7.2
apt-get install php-pear php7.2-curl php7.2-dev php7.2-gd php7.2-mbstring php7.2-zip php7.2-mysql php7.2-xml
```

Dependencias necesarias para instalar laravel.-

```
sudo apt-get install php7.2-zip
sudo apt-get install php-mbstring -y
sudo apt-get install php-xml -y
```

Instalar laravel de forma global.-

```
composer global require laravel/installer
```

## Iniciar servidor local

Solo en sistemas operativos windows hay que renombrear el archivo ".env.example" a ",env" y ejecutar el siguiente comando.-

```
php artisan key:generate
```

Para iniciar el servidor local ejecutar el comando.-

```
php artisan serve
```

## Iconos

Themify Icons.-

[Iconos para bootstrap](https://aalmiray.github.io/ikonli/cheat-sheet-themify.html)

## Fe de erratas

Crea una issue para solucionar tu problema.