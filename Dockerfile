FROM php:8.1-apache

# Install mysqli extension
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Copy your PHP project files into the Apache web root
COPY . /var/www/html/

# Expose port 80
EXPOSE 80


