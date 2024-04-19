# Verwende das offizielle PHP-Image mit der passenden Version
FROM php:8.2-cli

# Installiere systemabhängige Pakete
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    curl

# Installiere PHP-Erweiterungen
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Setze das Arbeitsverzeichnis
WORKDIR /app

# Installiere Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Kopiere vorhandene Anwendungsverzeichnisinhalte
COPY . .

# Lösche Composer-Cache und vendor-Verzeichnis, falls vorhanden
RUN composer clear-cache


# Installiere alle Composer-Abhängigkeiten
RUN composer install

# Öffne den Port 8000
EXPOSE 8000

# Starte PHP Laravel-Server
CMD php artisan serve --host=0.0.0.0 --port=8000
