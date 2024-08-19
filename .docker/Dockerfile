FROM php:8.1.0-apache

USER root

WORKDIR /var/www/html

RUN apt-get update && apt-get install -y \
        libpng-dev \
        zlib1g-dev \
        libxml2-dev \
        libzip-dev \
        libonig-dev \
        zip \
        curl \
        unzip \
    && docker-php-ext-configure gd \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-install mysqli \
    && docker-php-ext-install zip \
    && docker-php-source delete

COPY .docker/vhost.conf /etc/apache2/sites-available/000-default.conf

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN chown -R www-data:www-data /var/www/html \
    && a2enmod rewrite

# FROM php:8.1-apache

# RUN apt-get update && apt-get install -y gnupg2

# ENV ACCEPT_EULA=Y

# RUN curl https://packages.microsoft.com/keys/microsoft.asc | apt-key add -

# RUN curl https://packages.microsoft.com/config/debian/11/prod.list > /etc/apt/sources.list.d/mssql-release.list

# # Update package lists and install dependencies
# RUN apt-get update && apt-get install -y \
#     unixodbc-dev \
#     unixodbc \
#     msodbcsql17 \
#     libpng-dev \
#     zlib1g-dev \
#     libxml2-dev \
#     libzip-dev \
#     libonig-dev \
#     zip \
#     curl \
#     unzip

# # Install pdo_sqlsrv extension
# RUN pecl install sqlsrv pdo_sqlsrv
# RUN docker-php-ext-enable sqlsrv pdo_sqlsrv

# # Configure Apache and PHP extensions
# RUN docker-php-ext-configure gd \
#     && docker-php-ext-install -j$(nproc) gd \
#     && docker-php-ext-install pdo_mysql \
#     && docker-php-ext-install mysqli \
#     && docker-php-ext-install zip \
#     && docker-php-source delete

# # Set up Apache configuration
# COPY .docker/vhost.conf /etc/apache2/sites-available/000-default.conf

# # Set ownership and enable Apache modules
# RUN chown -R www-data:www-data /var/www/html \
#     && a2enmod rewrite

# # Install Composer
# RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
