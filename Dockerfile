FROM sammyjo20/ssh-php:latest

# Install Composer

USER root

RUN apk update && apk add composer

# Copy all files

COPY ./src ./src
COPY ./composer.json ./
COPY ./composer.lock ./

# Create a symbolic link

RUN ln -s ./src/index.php ./index.php

# Update the server's ownership

RUN chown -R server:server /home/server

# Switch back to a lower privaledged user

USER server

# Run Composer install without dependencies

RUN composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader --ignore-platform-reqs
