# Shop_Quan_Ao
composer install --ignore-platform-reqs

cp .env.example .env

php artisan migrate

php artisan key:generate

php artisan serve
