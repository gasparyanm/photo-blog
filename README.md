# TASK DESCRIPTION

* Make tables for users and theirs images
* Generate custom data for users and images
* Show info about images. Whom does belong to? (id, name)
* Use pagination, bootstrap and ability to filter via user


# SET UP PROJECT

### Clone project 
```git
git clone https://github.com/gasparyanm/photo-blog.git
```

### install composer
```composer
composer install
```

### Set up configuration of DB in .env file
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

### Run migrations
```php
php artisan migrate --seed
```
