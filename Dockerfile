FROM php:8.1-apache

# Instala las extensiones necesarias
RUN docker-php-ext-install mysqli

# Habilita mod_rewrite (si lo necesitas)
RUN a2enmod rewrite

# Copia todos los archivos del proyecto
COPY . /var/www/html/

# Establece permisos
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80
