## Storage Directory

This directory is a place to keep files that must be persistent even if your SSH server
is completely rebuilt. This is a good place to keep caches, database files and more.

When the container is first built, it will be loaded with the items in this folder.

You can create other volumes in the docker-compose.yml file.
