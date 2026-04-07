FROM php:8.2-apache

# Install mysqli PHP extension
RUN docker-php-ext-install mysqli

# Copy all project files (PHP, SQL etc.) into Apache web root
COPY ./ /var/www/html/

EXPOSE 80