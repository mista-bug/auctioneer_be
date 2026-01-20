# Project Overview
I chose this project idea because some of my colleagues are art students.
They have told me that there is an industry or collective of people who produce and buy art in Manila and Cavite.
I attended these events once, and saw that they mostly use manual and in-person methods of auction. These are the reason why. 
# Installation
1. If you have PHP 8.5 and Composer installed, you can simply run `composer install`.
2. If you want to simply dockerize the app, this api also uses https://github.com/PHPExpertsInc/dockerize 
3. Alternatively, I have used Laravel Sail, refer to their docs for more info https://laravel.com/docs/12.x/sail.
5. Run this command once installation is complete `php artisan migrate:rollback && php artisan migrate && php artisan db:seed && php artisan serve` or `sail artisan migrate:rollback && sail artisan migrate && sail artisan db:seed && sail artisan serve`
6. After running the migration and seeding, you may use these credentials for testing : 
`admin@example.com`
`Password123`
# Tech Stack
This uses : 
1. PHP 8.5 and Composer
2. MySQL
3. Laravel 12
# Security and Testing
1. Laravel Sanctum
2. Request Validation

Frontend URL : 
https://github.com/mista-bug/auctioneer_fe