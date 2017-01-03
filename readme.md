# Lumen Artisan Tinker

[![Join the chat at https://gitter.im/vluzrmos/lumen-tinker](https://badges.gitter.im/Join%20Chat.svg)](https://gitter.im/vluzrmos/lumen-tinker?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)

[![Latest Stable Version](https://poser.pugx.org/vluzrmos/tinker/v/stable)](https://packagist.org/packages/vluzrmos/tinker) 
[![Total Downloads](https://poser.pugx.org/vluzrmos/tinker/downloads)](https://packagist.org/packages/vluzrmos/tinker) 
[![License](https://poser.pugx.org/vluzrmos/tinker/license)](https://packagist.org/packages/vluzrmos/tinker) 
[![Build Status](https://travis-ci.org/vluzrmos/lumen-tinker.svg?branch=master)](https://travis-ci.org/vluzrmos/lumen-tinker) 
[![StyleCI](https://styleci.io/repos/36338064/shield)](https://styleci.io/repos/36338064) 
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/vluzrmos/lumen-tinker/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/vluzrmos/lumen-tinker/?branch=master)

An Interactive Shell to Lumen Framework.

[![Preview](http://i.imgur.com/3jfvcck.png)](https://github.com/vluzrmos/lumen-tinker)

# Installation

Package Versions:

| Lumen | Tinker |
|-------|--------|
| 5.0   | 1.0.*  |
| 5.1   | 1.1.*  |
| 5.3   | 1.3.*  |

Download from packagist:

`composer require vluzrmos/tinker`

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

# Known Issues

Lumen UrlGenerator do not generate correctly urls for non-browser requests, if you
want to generate url on console commands or tests, I recommend you to install that 
package to fix it:

- [vluzrmos/lumen-url-host](https://github.com/vluzrmos/lumen-url-host).

# Credits

That package is a partial modification
of [illuminate/framework](https://github.com/illuminate/framework) and that is copyright of [Taylor Otwell](https://github.com/taylorotwell).
