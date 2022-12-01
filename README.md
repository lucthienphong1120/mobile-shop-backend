# Mobile-Shop-E-Commerce-Website

In this complete E-commerce Website, We will take a look at how to create Mobile Shop Using PHP and Mysql Database. We gonna start by creating an HTML template then convert it into PHP and then use MySQL database to fetch products and display it in the project.

## Setup database

Goto [/database/DBController.php line 7](https://github.com/lucthienphong1120/mobile-shop-backend/blob/main/database/DBController.php#L7), change the follow code:

```php
protected $host = 'localhost';
protected $user = 'root';
protected $password = '';
protected $database = 'mobileshop';
```

## Demo static page

https://www.ltp110.tk/mobile-shop-database/index.html

https://www.ltp110.tk/mobile-shop-database/cart.html

https://www.ltp110.tk/mobile-shop-database/product.html

# Dynamic with PHP

Make sure you have installed xampp and turned on apache and mysql

Clone the repository into C:/xampp/htdocs/

Change the configuration at /database/DBController.php

Open your browser at `http://localhost:<port>/<repository_name>/index.php`
