FROM php:fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
  git \
  unzip \
  libzip-dev

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql zip

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set up working directory
WORKDIR /var/www/html

# Copy the composer.json and composer.lock files
COPY composer.json composer.lock ./

# Install dependencies
RUN composer install --no-scripts --no-autoloader

# Copy the rest of the application code
COPY . .

# Run Composer autoload
RUN composer dump-autoload --optimize

CMD ["php-fpm"]

