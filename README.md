### Steps
 - Clone https://github.com/ronizzle/laravel-vue-inertia-test
 - RUN `cp .env.example .env`
 - RUN `composer install`
 - RUN `npm install`
 - RUN `touch ./database/database.sqlite`
 - RUN `php artisan migrate:fresh --seed`
 - RUN `npm run dev`
 - RUN in another terminal `php artisan serve`
 - OPEN in browser: http://localhost:8000/
