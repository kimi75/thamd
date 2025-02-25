FROM php:8.0-apache

# Installation des dépendances
RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip \
    libzip-dev \
    libonig-dev \
    libxml2-dev

# Activation des extensions PHP nécessaires
RUN docker-php-ext-install pdo_mysql mbstring zip exif pcntl bcmath opcache
RUN docker-php-ext-enable opcache

# Configuration d'Apache
COPY ./config-apache/apache2.conf /etc/apache2/sites-available/000-default.conf
RUN a2enmod rewrite

# Installation de Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copie du code source de l'application
COPY . /var/www/html

# Installation des dépendances PHP de l'application avec Composer
RUN composer install --no-dev

# Configuration des permissions pour les fichiers de cache de Laravel
RUN chown -R www-data:www-data /var/www/html/bootstrap/cache
RUN chown -R www-data:www-data /var/www/html/storage

# Définition des variables d'environnement pour l'application
ENV APP_NAME=BusProspects \
    APP_ENV=production \
    APP_KEY=base64:S2nVp5VhnVaU2WNFUUJJ76GT3mfFACpa2bxG3DB6fX63ivbrAggyk \
    APP_DEBUG=false \
    APP_URL=http://localhost

# Configuration de l'heure du système
RUN ln -snf /usr/share/zoneinfo/UTC /etc/localtime && echo UTC > /etc/timezone

# Nettoyage du cache apt-get
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Exposition du port Apache
EXPOSE 80

# Point d'entrée pour le conteneur
ENTRYPOINT ["apache2-foreground"]