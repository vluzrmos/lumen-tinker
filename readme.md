# Lumen Artisan Tinker

[![Join the chat at https://gitter.im/vluzrmos/lumen-tinker](https://badges.gitter.im/Join%20Chat.svg)](https://gitter.im/vluzrmos/lumen-tinker?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)

[![Latest Stable Version](https://poser.pugx.org/vluzrmos/tinker/v/stable)](https://packagist.org/packages/vluzrmos/tinker) [![Total Downloads](https://poser.pugx.org/vluzrmos/tinker/downloads)](https://packagist.org/packages/vluzrmos/tinker) [![Latest Unstable Version](https://poser.pugx.org/vluzrmos/tinker/v/unstable)](https://packagist.org/packages/vluzrmos/tinker) [![License](https://poser.pugx.org/vluzrmos/tinker/license)](https://packagist.org/packages/vluzrmos/tinker)

An Interactive Shell to Lumen Framework.

# Installation

Download from packagist:

`composer require vluzrmos/tinker --dev`

Add the Service Provider to the `artisan` file:

```php
if(class_exists('Vluzrmos\Tinker\TinkerServiceProvider')) {
    $app->register('Vluzrmos\Tinker\TinkerServiceProvider');
}
```

> Note: *This will not affect the performance of your application.*

And that is it, to see if it works do `php artisan`, and be sure to 
see the command `tinker` there.
 
To use the shell:

`php artisan tinker`

# Credits

That package is a partial modification 
of [Illuminate/Framework](https://github.com/illuminate/framework) and that is copyright of [Taylor Otwell](https://github.com/taylorotwell). 
