# Mobile-Shop-E-Commerce-Website

In this complete E-commerce Website, We will take a look at how to create Mobile Shop Using PHP and Mysql Database. We gonna start by creating an HTML template then convert it into PHP and then use MySQL database to fetch products and display it in the project.

## Setup database

Firstly, import the database from [mobileshop.sql](./mobileshop.sql)

Next, goto [/func/DBConnect.php line 6](./func/DBConnect.php#L7), change the follow information:

```php
protected $host = 'localhost';
protected $user = 'root';
protected $password = '';
protected $database = 'mobileshop';
```

## Demo static pages

+ Homepage: https://www.ltp110.tk/mobile-shop-database/index.html
+ Cart user=guest: https://www.ltp110.tk/mobile-shop-database/cart.html
+ Product id=1: https://www.ltp110.tk/mobile-shop-database/product.html
+ Login: https://www.ltp110.tk/mobile-shop-database/login.html
+ Register:  https://www.ltp110.tk/mobile-shop-database/register.html
+ Account role=admin: https://www.ltp110.tk/mobile-shop-database/account.html
+ Manage role=admin: https://www.ltp110.tk/mobile-shop-database/manage.html

# Dynamic with PHP

1. Make sure you have installed Xampp and turned on apache and mysql
2. **Fork** the project and Clone it into C:/xampp/htdocs/
3. Change the configuration at [Setup database](#setup-database)
4. Open your browser at `http://localhost:<port>/<repository_name>/index.php`
5. Leave a **Star** for this project if you feel useful, thank you