
// Setup

setup '.env' file and DB

RUN command as follow

composer install
npm install vite --save-dev
npm run dev

php artisan migrate
php artisan migrate:refresh --seed

php artisan serve