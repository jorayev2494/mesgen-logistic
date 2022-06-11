.DEFAULT_GOAL := help

COMPOSE_FILE_PATH := ./docker/docker-compose.yml

init:
	@make init_project
	@make init_docker

init_project:
	@cp .env.example .env

init_docker:
	@cp ./docker/.env.example ./docker/.env

install:
	@make init
	@make up
	@make vendor_install
	@make migrate_seed
	@make jwt_generate
	@make ps

up:			## Up project
	@docker-compose --file $(COMPOSE_FILE_PATH) up --build -d

restart:	## Restart project
	@docker-compose --file $(COMPOSE_FILE_PATH) restart

down:		## Down project
	docker-compose --file $(COMPOSE_FILE_PATH) down

bash:		## Project bash terminal
	@docker-compose --file $(COMPOSE_FILE_PATH) exec php-fpm bash

ps:			## Show project process
	@docker-compose --file $(COMPOSE_FILE_PATH) ps

cc:			## Clear cache
	@docker-compose --file $(COMPOSE_FILE_PATH) exec php-fpm ./artisan optimize:clear

migrate:			## Migratge
	@docker-compose --file $(COMPOSE_FILE_PATH) exec php-fpm ./artisan migrate

migrate_seed:		## Migrate and Seed
	@docker-compose --file $(COMPOSE_FILE_PATH) exec php-fpm ./artisan migrate:refresh --seed

vendor_install:		## Composer install
	@docker-compose --file $(COMPOSE_FILE_PATH) exec php-fpm composer install
	@docker-compose --file $(COMPOSE_FILE_PATH) exec php-fpm ./artisan key:generate

jwt_generate:		## Composer install
	@docker-compose --file $(COMPOSE_FILE_PATH) exec php-fpm ./artisan jwt:secret

.PHONY: help
help:		## Show Project commands
	@#echo ${Cyan}"\t\t This project 'job' REST API Server!"
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}'
	@echo ${Red}"----------------------------------------------------------------------"
