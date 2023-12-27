
## Installation

Imeplement design from https://super7tech.com/web_developer_exam_sr/

- clone the repo 
- cd to super7tech-back-end
- rename or copy .env.example to .env then update your Database credentials
- runs these commands

```bash
 composer install
 php artisan migrate
 php artisan db:seed
```
- run these to generate the key

```bash
php artisan key:generate
php artisan optimize
php artisan config:cache
```

- run the project

```bash
php artisan serve

- goto /login to login your prefered account
```

NOTE:

i have created 3 users in the migration 

- username:admin_manager pass:password
- username:admin_designer pass:password
- username:admin_developer pass:password

there is a file " sample_data.sql " file in the root DIR this is a sample exployee data if you want to import this
