Setup guide:
1. Run in CMD: npm install
2. Run in CMD: composer install(It must be installed separately)
3. Rename your .env.example to .env
4. Run in CMD: php artisan key:generate
5. Configure database in .env
6. Run in CMD: php artisan migrate
7. Run in CMD: php artisan serve

To use, you have to provide a valid link into input field(ex: https://laravel.com/ )
After you press a button, link will be shortened and you will be redirected to a page, where you will be able to see short link and a counter of how many times link was accessed
