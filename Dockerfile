FROM sammyjo20/ssh-php:latest

# Switch to root

USER root

# Copy all files

COPY ./src ./src
COPY ./composer.json ./

# Create a symbolic link

RUN ln -s ./src/index.php ./index.php

# Create the .ssh folder

RUN mkdir .ssh

# Update the server's ownership

RUN chown -R server:server /home/server

# Switch back to a lower privaledged user

USER server

# Run Composer install without dependencies

RUN composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader --ignore-platform-reqs
