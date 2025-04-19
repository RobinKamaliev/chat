start-local:
	docker compose up -d
	docker exec app composer install
	docker exec app cp .env.example .env
	docker exec app php artisan key:generate
	docker exec app php artisan migrate
	docker exec app php artisan route:cache

test:
	docker compose app php artisan test