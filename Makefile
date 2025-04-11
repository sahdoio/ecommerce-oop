# Variables
DC=docker compose --file docker-compose.yml --env-file ./src/.env

.PHONY: up down sh logs setup test migrate seed rollback horizon log permissions

go:
	$(DC) up -d --build
	$(DC) exec ecoop composer install
	make migrate
	make permissions

down:
	$(DC) down

sh:
	$(DC) exec ecoop sh

test:
	$(DC) exec ecoop vendor/bin/phpunit --testdox --colors=always

test-report:
	$(DC) exec ecoop vendor/bin/phpunit --coverage-html report --testdox --colors=always

logs:
	$(DC) logs -f --tail=10

migrate:
	$(DC) exec ecoop php artisan migrate

seed:
	$(DC) exec ecoop php artisan db:seed

rollback:
	$(DC) exec ecoop php artisan migrate:rollback

horizon:
	$(DC) exec ecoop php artisan horizon

log:
	$(DC) exec ecoop tail -f storage/logs/laravel.log -n 0

clear:
	$(DC) exec ecoop php artisan cache:clear
	$(DC) exec ecoop php artisan view:clear
	$(DC) exec ecoop php artisan route:clear
	$(DC) exec ecoop php artisan config:clear
	$(DC) exec ecoop php artisan optimize:clear

permissions:
	$(DC) exec ecoop chmod -R 777 storage
	$(DC) exec ecoop chmod -R 777 bootstrap/cache
	$(DC) exec ecoop chown -R www-data:www-data storage
	$(DC) exec ecoop chown -R www-data:www-data bootstrap/cache


