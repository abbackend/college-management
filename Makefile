API_CONTAINER_NAME := DEMO_API
DB_CONTAINER_NAME := DEMO_DB

############################################
## CORE Tools
############################################
init: build up api
restart: down up

build:
	docker-compose build

up:
	docker-compose up -d

down:
	docker-compose down --remove-orphans

shell.db:
	docker exec -it $(DB_CONTAINER_NAME) bash

############################################
## For Laravel
############################################
api: api.composer-install api.migrate

api.composer-install:
	docker exec -it $(API_CONTAINER_NAME) composer install

api.migrate:
	docker exec -it $(API_CONTAINER_NAME) php artisan migrate --seed

api.migrate.fresh:
	docker exec -it $(API_CONTAINER_NAME) php artisan migrate:fresh --seed

api.shell:
	docker exec -it $(API_CONTAINER_NAME) bash

api.pint:
	docker exec -it $(API_CONTAINER_NAME) /var/www/html/vendor/bin/pint

api.pint.test:
	docker exec -it $(API_CONTAINER_NAME) /var/www/html/vendor/bin/pint --test