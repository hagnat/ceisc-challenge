
COMPOSER ?= composer
LARAVEL ?= php artisan

install: env composer database

.PHONY: composer
composer:
	$(COMPOSER) install \
		--no-progress \
		--no-ansi

.PHONY: cc
cc:
	$(LARAVEL) cache:clear

.PHONY: clear
clear:
	$(LARAVEL) optimize:clear

.PHONY: env
env:
	cp -n .env.example .env

.PHONY: db
database:
	$(LARAVEL) migrate
	$(LARAVEL) db:seed

.PHONY: test
test: cc composer
	bin/phpunit

.PHONY: ci
ci: clear composer test
	@echo "All quality checks have passed!"

.DEFAULT_GOAL := ci
