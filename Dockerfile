# Use uma imagem base do PHP com Apache
FROM php:8.2-apache

# Instala extensões necessárias para o CakePHP
RUN apt-get update && apt-get install -y \
    libpq-dev \
    libicu-dev \
    unzip \
    && docker-php-ext-install pdo pdo_pgsql pgsql intl

# Instala o Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Configura o diretório de trabalho
WORKDIR /var/www/html

# Copia os arquivos da aplicação para o diretório de trabalho
COPY . /var/www/html

# Copia o arquivo de configuração customizado para o Apache
COPY 000-default.conf /etc/apache2/sites-available/000-default.conf

# Ativa o módulo de reescrita do Apache
RUN a2enmod rewrite

# Reinicia o Apache para aplicar as mudanças
RUN service apache2 restart

# Define as permissões corretas
RUN chown -R www-data:www-data /var/www/html
