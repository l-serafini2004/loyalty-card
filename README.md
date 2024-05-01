# LoyaltyCard
This webiste is a project that emulate a fidelity-card service where you can create your company, your cards and let the people use it.
**Important**: do not base your business website activity on this service, it's only a fake-project

### How to use it
In order to use this webiste you must install:
- PHP
- Composer (and also Laravel)
- MYSQL

### PHP
You can easily install by the official webiste: <a href="https://www.php.net/">Link</a>  

### Composer
You have to install Composer by the <a href="https://getcomposer.org/">following link</a>.
Once you installed it, you have to require Laravel, with the following command on your bash (it works in every OS):
```bash
composer global require laravel/installer
```

### MYSQL
Like before, you can find mysql installer <a href="https://www.mysql.com/">here</a>
After that you have to create a database (you can use every name)

### Set database
Finally you have to set the database data inside .env file and (inside the app) run the following command:
```bash
php artisan migrate
php artisan serve
```
Now you can use my project! 
