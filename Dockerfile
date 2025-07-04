# Use the official PHP 8.2 image with Apache
FROM php:8.2-apache

# Install mysqli and pdo_mysql extensions for MySQL database connectivity
# docker-php-ext-install is a helper script provided by the PHP Docker image
RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable mysqli pdo pdo_mysql

# Enable Apache's rewrite module, which is often needed for clean URLs in PHP apps
RUN a2enmod rewrite

# Copy your application files into the Apache document root
# The . represents the current directory where the Dockerfile is located
# /var/www/html is the default document root for Apache in this PHP image
COPY . /var/www/html/

# Set the working directory to the Apache document root
WORKDIR /var/www/html

# Expose port 80 (Apache's default HTTP port)
EXPOSE 80