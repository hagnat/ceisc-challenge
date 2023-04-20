
COMPOSER ?= docker exec -it ceisc-app composer
LARAVEL ?= docker exec -it ceisc-app php artisan
MYSQL ?= docker exec -it ceisc-db mysql

PHPUNIT ?= docker exec -it ceisc-app vendor/bin/phpunit

install: env docker-pull docker-build up composer database public/storage
	@echo '=> Install complete!'
	@echo 'You can now access your application via http://ceisc-app.local:8000'
	@echo 'You may need to update your /etc/hosts file.'

.PHONY: env
env:
	@echo '=> Creates an environment stub based on our example'
	cp -n .env.example .env || true
	@echo '=> If you are running a development app, you dont need to update this file'

.PHONY: composer
composer:
	@echo '=> Installs all composer dependencies.'
	$(COMPOSER) install \
		--no-progress \
		--no-ansi

.PHONY: composer-update
composer-update:
	@echo '=> Updates all composer dependencies.'
	$(COMPOSER) update

.PHONY: cc
cc:
	$(LARAVEL) cache:clear

.PHONY: clear
clear:
	$(LARAVEL) optimize:clear

.PHONY: prune
prune:
	rm -rf run/var
	rm -rf storage/public/*

.PHONY: database
database:
	@echo '=> Populates a database based on our migration files.'
	$(LARAVEL) migrate
	$(LARAVEL) db:seed

.PHONY: mysql
mysql:
	$(MYSQL) -uroot -p

public/storage:
	$(LARAVEL) storage:link

.PHONY: test
test: cc composer
	$(PHPUNIT)

.PHONY: ci
ci: clear composer test
	@echo "=> All quality checks have passed! :thumb_up:"


# docker-compose triggers

.PHONY: docker-pull
docker-pull:
	@echo '=> Pull all docker images from their repositories'
	docker-compose pull

.PHONY: docker-build
docker-build:
	docker-compose build

.PHONY: docker-prune
docker-prune: | prune
	docker system prune -a -f

.PHONY: up
up:
	docker-compose up -d

.PHONY: down
down:
	docker-compose down

# define the default goal of this Makefile
.DEFAULT_GOAL := ci
