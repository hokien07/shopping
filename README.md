## About Project
Base on Laravel version 8

### Plugins
- Adminlte3 for Admin managements
  `https://adminlte.io/themes/v3/`
- Bootstrap eCommerce for shop page
    `https://bootstrap-ecommerce.com/`
- Laravel breeze for authenticate
    `https://github.com/laravel/breeze`
- Laravel telescope for debug
  `https://github.com/laravel/telescope`
- PHPFlasher for notification
    `https://github.com/php-flasher/flasher-toastr-laravel`
- Laravel cart
    `https://jackiedo.github.io/Laravel-Cart/#/`

### Requirement
- PHP >= 8.1
- PDO Extension
- PDO MySQL Extension
- JSON PHP Extension
- Mbstring Extension

### Install
- Copy .env.example to .env `cp .env.example .env`
- Install packages `composer install`
- Install node package `npm install && npm run dev` 
- Generate key `php artisan key:generate`
- Run migrate `php artisan migrate`
- Run seed `php artisan db:seed`

### Account for admin
- email `admin@example.com`
- password `password`

### License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
