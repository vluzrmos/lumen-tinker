# Lumen Artisan Tinker

An Interactive Shell to Lumen Framework.

# Installation

Download from packagist:

`composer require vluzrmos/tinker`

Add the Service Provider to the `bootstrap/app.php` file:

```php
$app->register('Vluzrmos\Tinker\TinkerServiceProvider');
```

And that is it, to see if it works do `php artisan`, and be sure to 
see the command `tinker` there.
 
To use the shell:

`php artisan tinker`

# Credits

That package is a partial of modification 
of [Illuminate/Framework](https://github.com/illuminate/framework) and that is 
Copyright (c) of [Taylor Otwell](https://github.com/taylorotwell). 
