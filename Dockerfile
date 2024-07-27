FROM sammyjo20/ssh-php:latest

# Install Composer

USER root

RUN apt update && apt install composer -y

# Copy all files

COPY ./src ./src
COPY ./composer.json ./
COPY ./composer.lock ./

# Create a symbolic link

RUN ln -s ./src/index.php ./index.php

# Switch back to a lower privaledged user

USER server

# Run Composer install without dependencies

RUN composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader --ignore-platform-reqs
