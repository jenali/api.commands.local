# Run project api.commands.

## Environment
- Apache or nginx web service;
- Php7;
- Mysql or other db;
- composer;

## Install
1. Clone repository to pc.
2. Run 
```
php composer install
```
3. Configure db in .env.
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```
4. Run migrations.
```
php artisan migrate
```
5. Run seeds.
```
php artisan db:seed
```