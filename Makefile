.SILENT:
.PHONY: setup

## Colors
COLOR_RESET = \033[0m
COLOR_INFO = \033[32m
COLOR_COMMENT = \033[33m

## Show Help
help:
	printf "${COLOR_COMMENT}Usage:${COLOR_RESET}\n"
	printf " make [target]\n\n"
	printf "${COLOR_COMMENT}Available targets:${COLOR_RESET}\n"
	awk '/^[a-zA-Z\-\_0-9\.@]+:/ { \
		helpMessage = match(lastLine, /^## (.*)/); \
		if (helpMessage) { \
			helpCommand = substr($$1, 0, index($$1, ":")); \
			helpMessage = substr(lastLine, RSTART + 3, RLENGTH); \
			printf " ${COLOR_INFO}%-16s${COLOR_RESET} %s\n", helpCommand, helpMessage; \
		} \
	} \
	{ lastLine = $$0 }' $(MAKEFILE_LIST)

#############
### Build ###
#############

## Build application (composer / yarn)
build: build-composer build-yarn build-database

## Composer Install
build-composer:
	composer install

## Yarn Install & Compile
build-yarn:
	yarn install
	yarn run dev

## Run migrations
build-database:
	php artisan migrate:fresh --seed

############
### Test ###
############

## Test application (CS fixer / PHPunit / etc.)
test: test-php-cs-fixer test-phpunit test-larastan test-prettier test-eslint

## PHP CS fixer
test-php-cs-fixer:
	./vendor/bin/php-cs-fixer fix --config=.php_cs --allow-risky=yes app/ tests/ config/

## PHPUnit
test-phpunit:
	./vendor/bin/phpunit

## Larastan
test-larastan:
	php artisan code:analyse --level=max

## Prettier
test-prettier:
	yarn prettier --write 'resources/**/*.scss'

## Eslint
test-eslint:
	yarn eslint 'resources/js/**/*' --ext .js,.vue --fix

############
### API ###
############

## Generate API
api:
	php artisan apidoc:generate
