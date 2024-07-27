FROM sammyjo20/ssh-php:latest

# Install Composer

RUN apt update && apt install composer -y

# Copy all files

COPY ./src /app/php/src
COPY ./composer.json /app/php
COPY ./composer.lock /app/php

# Create a symbolic link

RUN ln -s /app/php/src/index.php /app/php/index.php

# Run Composer install without dependencies

RUN cd /app/php && composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader --ignore-platform-reqs
