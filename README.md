<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

# Installation process

Navigate to the desired installation folder and run following code

```bash
git clone https://github.com/abhisanGhimire/kobo_form_with_lee.git
```

## Install Composer

```bash
composer install
```

## .env file

```bash
Copy .env.example to .env(create a new file)
```

## Generate app key

```python
php artisan key:generate
```

## Setup Database
```
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=[database_name]
DB_USERNAME=[database_username]
DB_PASSWORD=[database_password]
```
Migrate database tables
```
php artisan migrate
```
