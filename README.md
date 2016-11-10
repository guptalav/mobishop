# Mobishop

1. Clone the repo and cd into it
1. `composer install`
1. If you have no .env file you can use the example one. Just rename .env.example to .env. Enter your db credentials and SMTP details here. I am using the example env below in my local setup.
1. `php artisan key:generate`
1. `php vendor/bin/homestead make --ip=[LOCAL_IP_ADDRESS]`
1. `vagrant up`
1. `php artisan migrate && php artisan db:seed`
1. (Optional) Run `vendor/bin/phpunit` to run some application tests.
1. (Optional) Edit your hosts file and add `[LOCAL_IP_ADDRESS] mobishop.dev`
1. Run `php artisan queue:listen` and leave it running. This will use db for queuing emails.
1. Visit `mobishop.dev or [LOCAL_IP_ADDRESS]` in your browser

## Environment file

```
APP_ENV=local
APP_KEY=base64:lMJZJH7ETJmQ7H6KgLy41UbSWPXpkMFEnA/HbbfJNlE=
APP_DEBUG=true
APP_LOG_LEVEL=debug
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=[LOCAL_IP_ADDRESS]
DB_PORT=3306
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret

BROADCAST_DRIVER=log
CACHE_DRIVER=file
SESSION_DRIVER=file
QUEUE_DRIVER=database

MAIL_DRIVER=smtp
MAIL_HOST=mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=[MAILTRAP_USERNAME]
MAIL_PASSWORD=[MAILTRAP_PASSWORD]
MAIL_ENCRYPTION=null

```
