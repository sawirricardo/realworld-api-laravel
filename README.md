# Realworld API Backend

My take on Realworld's API.

## Usage

## Installation

You can clone this:

```bash
git clone https://github.com/sawirricardo/realworld-api-laravel.git
```

You also need to configure the .env file

```bash
cp .env.example .env;
php artisan key:generate;
```

Modify the database credentials

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

Install this with composer:

```bash
composer install
php artisan serve
```

## Running with fake data

```bash
php artisan migrate:fresh --seed
```
