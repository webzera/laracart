Requirements
------------
 - PHP >= 7.3.0
 - Laravel >= 7.0.0

Installation
------------

> And make sure the product view page completed in home page of the ecommerce site and 'Add Cart' button the button link is
> {{ route('cart.add', $product) }} -Here $product is 'single product object'
> products table download form databasesource folder in webzera/laracart 
> 

First, install laravel 7, and make sure that the database connection settings are correct.

```
composer require webzera/laracart --dev
```
or
```
php composer.phar require webzera/laracart --dev
```

Then run these commands to publish assets and config：

Open `http://localhost/cart/` in browser,

Configurations
------------
The file `config/laracart.php` contains an array of configurations, you can find the default configurations in there.