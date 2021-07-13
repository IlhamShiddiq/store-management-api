# Store Management API

## Installing Web Application
### 1. Sofware required
Before installing, make sure your device has installed this software.
* Composer : you can download it [here](https://getcomposer.org/)

### 2. Installing
* Run `composer install`
* Run `copy .env.example .env`
* Open your .env file and change the database name (DB_DATABASE) to whatever you have, username (DB_USERNAME) and password (DB_PASSWORD) field correspond to your configuration.
By default, the username is root and you can leave the password field empty.
* Run `php artisan key:generate`
* Run `php artisan migrate`
* Run `php artisan db:seed --class=MainSeeder`
* Last, run `php artisan serve`, then the API is ready to use with prefix url `http://127.0.0.1:8000/api/`

## Docs
API url: https://data-store-management.herokuapp.com/api. 
To see the documentation and list of endpoint of API, you can click this link: [https://data-store-management.herokuapp.com/docs](https://data-store-management.herokuapp.com/docs)

## Account
#### Superadmin
* Email : halosuperadmin@gmail.com
* Password : halosuperadmin

## Built with
* [Laravel v 8](https://laravel.com/docs/8.x)
