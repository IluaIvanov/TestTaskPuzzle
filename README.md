# Test task
Задание: реализовать REST API методы для сохранения, редактирования и получения Заказа. Заказ должен содержать номер, фио, и общую сумму заказа, а так же дату его создания и адрес доставки. Задание необходимо реализовать на Laravel.

## System requirements

For local application starting (for development) make sure that you have locally installed next applications:

- `docker >= 18.0` _(install: `curl -fsSL get.docker.com | sudo sh`)_
- `docker-compose >= 1.22` _([installing manual][install_compose])_
- `make >= 4.1` _(install: `apt-get install make`)_

## Used services

This application uses next services:

- PHP-FPM7.4
- MySQL
- Adminer
- NGINX
- NODE

Declaration of all services can be found into `./docker-compose.yml` file.

## Work with application

Most used commands declared in `./Makefile` file. For more information execute in your terminal `make help`.

To quickly start a project, use the following list of commands:

Command signature | Description
----------------- | -----------
`make build` | Build all Docker images from using own Docker files
`make install`    | Run all application containers into background mode, run composer, migration and testing function application 

After application starting you can open [127.0.0.1:8080](http://127.0.0.1:8080/) in your browser.
After application starting you can open [127.0.0.1:5454](http://127.0.0.1:5454/) in your browser from Adminer.
