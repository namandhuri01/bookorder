# README #

This README would normally document whatever steps are necessary to get your application up and running.

### What is this repository for? ###

## Application Deployment Steps

- Clone project from git repository ```https://github.com/namandhuri01/bookorder.git```

- Run Following Commands
 ```composer install```.
 ```npm install```.


- Copy .env.example file to .env. 
- Set database configuration in .env file of application.

- Set APP_URL value in .env file.
- Set SMTP configuration in .env file.

- Run migration command ``` php artisan migrate ```
- Run seeder command ``` php artisan db:seed ```

- Run Command ```php artisan storage:link```
- Run command ```npm run dev```

