## Installation guide

Run commands
```
git clone https://github.com/olyatabaran/blueline-task.git
composer install
```

Copy data from .env.example file to .env file

Fill all .env variables
```
DB_CONNECTION
DB_HOST
DB_PORT
DB_DATABASE
DB_USERNAME
DB_PASSWORD

API_SECRET

#fill options with data, in other case mail will be not sent
MAIL_USERNAME  
MAIL_PASSWORD
MAIL_FROM_ADDRESS

```
Create db based on .env DB_DATABASE variable

Run commands
```
php artisan key:generate
php artisan migrate
php artisan db:seed CurrencyValueSeeder 
php artisan serve
```
Optional:

Import postman requests to this API:
`rates.postman_collection.json`
