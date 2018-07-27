# php-vcap

[![Language: PHP](https://img.shields.io/badge/php-5.6+-orange.svg?style=flat)](http://php.net/)
[![Build Status](https://travis-ci.org/mihui/php-vcap.svg?branch=master)](https://travis-ci.org/mihui/php-vcap)
[![codecov](https://codecov.io/gh/mihui/php-vcap/branch/master/graph/badge.svg)](https://codecov.io/gh/mihui/php-vcap)

Library of accessing IBM Cloud VCAP_SERVICES environment variables.

## Installation

Installing [Composer](http://getcomposer.org) will be easier to manage dependencies for your application.

Run the Composer command to install the latest version of the Watson PHP SDK:

```shell
composer require mihui/php-vcap:dev-master
```


If the php-vcap is downloaded from GitHub already, run the update command:
```shell
composer update
```

Include `autoload.php` in your application:

```php
require 'vendor/autoload.php';
```

## Namespaces
For common use, one of the namespaces of `WatsonCredential` or `SimpleTokenProvider` can be optional, depends on how to invoke the Watson services, and you can reference the classes like so:
```php
use ENV\VCAP;
```

## License
Copyright 2018 Michael under [the Apache 2.0 license](LICENSE).
