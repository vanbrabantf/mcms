# Museum Content Management System

This is a small example application written in Laravel.

## To run
I locally used Laradock for my Docker containers.

Ran this command:
`docker-compose up -d nginx mysql phpmyadmin redis workspace`

To run the test: `docker exec -it --user=laradock laradock_workspace_1 ./vendor/bin/phpunit`