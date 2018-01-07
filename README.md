# PHP Request library

[![Latest Stable Version](https://poser.pugx.org/josantonius/Request/v/stable)](https://packagist.org/packages/josantonius/Request) [![Latest Unstable Version](https://poser.pugx.org/josantonius/Request/v/unstable)](https://packagist.org/packages/josantonius/Request) [![License](https://poser.pugx.org/josantonius/Request/license)](LICENSE) [![Codacy Badge](https://api.codacy.com/project/badge/Grade/aa5b98dbbc5846399bb994318dce3c88)](https://www.codacy.com/app/Josantonius/PHP-Request?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=Josantonius/PHP-Request&amp;utm_campaign=Badge_Grade) [![Total Downloads](https://poser.pugx.org/josantonius/Request/downloads)](https://packagist.org/packages/josantonius/Request) [![Travis](https://travis-ci.org/Josantonius/PHP-Request.svg)](https://travis-ci.org/Josantonius/PHP-Request) [![PSR2](https://img.shields.io/badge/PSR-2-1abc9c.svg)](http://www.php-fig.org/psr/psr-2/) [![PSR4](https://img.shields.io/badge/PSR-4-9b59b6.svg)](http://www.php-fig.org/psr/psr-4/) [![CodeCov](https://codecov.io/gh/Josantonius/PHP-Request/branch/master/graph/badge.svg)](https://codecov.io/gh/Josantonius/PHP-Request)

[Versión en español](README-ES.md)

PHP library for handling requests. 

---

- [Requirements](#requirements)
- [Installation](#installation)
- [Available Methods](#available-methods)
- [Quick Start](#quick-start)
- [Usage](#usage)
- [Tests](#tests)
- [TODO](#-todo)
- [Contribute](#contribute)
- [Repository](#repository)
- [License](#license)
- [Copyright](#copyright)

---

## Requirements

This library is supported by **PHP versions 5.6** or higher and is compatible with **HHVM versions 3.0** or higher.

## Installation

The preferred way to install this extension is through [Composer](http://getcomposer.org/download/).

To install **PHP Request library**, simply:

    $ composer require Josantonius/Request

The previous command will only install the necessary files, if you prefer to **download the entire source code** you can use:

    $ composer require Josantonius/Request --prefer-source

You can also **clone the complete repository** with Git:

  $ git clone https://github.com/Josantonius/PHP-Request.git

Or **install it manually**:

[Download Request.php](https://raw.githubusercontent.com/Josantonius/PHP-Request/master/src/Request.php):

    $ wget https://raw.githubusercontent.com/Josantonius/PHP-Request/master/src/Request.php

## Available Methods

Available methods in this library:

### - Secure access to GET parameters:

```php
Request::get($key);
```

| Attribute | Description | Type | Required | Default
| --- | --- | --- | --- | --- |
| $key | Parameter key. | string | Yes | |

**# Return** (mixed|null) → value or null

### - Secure access to POST parameters:

```php
Request::post($key);
```

| Attribute | Description | Type | Required | Default
| --- | --- | --- | --- | --- |
| $key | Parameter key. | string | Yes | |

**# Return** (mixed|null) → value or null

### - Secure access to FILES parameters:

```php
Request::files($key);
```

| Attribute | Description | Type | Required | Default
| --- | --- | --- | --- | --- |
| $key | Parameter key. | string | Yes | |

**# Return** (mixed|null) → value or null

### - Secure access to PUT parameters:

```php
Request::put($key);
```

| Attribute | Description | Type | Required | Default
| --- | --- | --- | --- | --- |
| $key | Parameter key. | string | Yes | |

**# Return** (mixed|null) → value or null

### - Secure access to DEL parameters:

```php
Request::del($key);
```

| Attribute | Description | Type | Required | Default
| --- | --- | --- | --- | --- |
| $key | Parameter key. | string | Yes | |

**# Return** (mixed|null) → value or null

### - Check if it's a GET request:

```php
Request::isGet();
```

**# Return** (boolean)

### - Check if it's a POST request:

```php
Request::isPost();
```

**# Return** (boolean)

### - Check if it's a PUT request:

```php
Request::isPut();
```

**# Return** (boolean)

### - Check if it's a DELETE request:

```php
Request::isDelete();
```

**# Return** (boolean)

### - Check if it's a AJAX request:

```php
Request::isAjax();
```

**# Return** (boolean)

## Quick Start

To use this library with **Composer**:

```php
require __DIR__ . '/vendor/autoload.php';

use Josantonius\Request\Request;
```

Or If you installed it **manually**, use it:

```php
require_once __DIR__ . '/Request.php';

use Josantonius\Request\Request;
```

## Usage

Example of use for this library:

### - Access to all GET parameters:

```php
$_GET = ['test' => 'value', 'test-2' => 1];

Request::get();
```

### - Access to GET specific key parameter:

```php
$_GET = ['test' => 'value', 'test-2' => 1];

Request::get('test');
```

### - Access to all POST parameters:

```php
$_POST = ['test' => 'value', 'test-2' => 1];

Request::post();
```

### - Access to POST specific key parameter:

```php
$_POST = ['test' => 'value', 'test-2' => 1];

Request::post('test');
```

### - Access to all FILES parameters:

```php
$_FILES = ['test' => 'value', 'test-2' => 1];

Request::files();
```

### - Access to FILES specific key parameter:

```php
$_FILES = ['test' => 'value', 'test-2' => 1];

Request::files('test');
```

### - Access to all PUT parameters:

```php
$_PUT = ['test' => 'value', 'test-2' => 1];

Request::put();
```

### - Access to PUT specific key parameter:

```php
$_PUT = ['test' => 'value', 'test-2' => 1];

Request::put('test');
```

### - Check if it's a POST request:

```php
$_SERVER['REQUEST_METHOD'] = 'POST';

Request::isPost()
```

### - Check if it's a PUT request:

```php
$_SERVER['REQUEST_METHOD'] = 'PUT';

Request::isPut()
```

### - Check if it's a DELETE request:

```php
$_SERVER['REQUEST_METHOD'] = 'DELETE';

Request::isDelete()
```

### - Check if it's a AJAX request:

```php
$_SERVER['HTTP_X_REQUESTED_WITH'] = 'xmlhttprequest';

Request::isAjax()
```

## Tests 

To run [tests](tests) you just need [composer](http://getcomposer.org/download/) and to execute the following:

    $ git clone https://github.com/Josantonius/PHP-Request.git
    
    $ cd PHP-Request

    $ composer install

Run unit tests with [PHPUnit](https://phpunit.de/):

    $ composer phpunit

Run [PSR2](http://www.php-fig.org/psr/psr-2/) code standard tests with [PHPCS](https://github.com/squizlabs/PHP_CodeSniffer):

    $ composer phpcs

Run [PHP Mess Detector](https://phpmd.org/) tests to detect inconsistencies in code style:

    $ composer phpmd

Run all previous tests:

    $ composer tests

## ☑ TODO

- [ ] Add new feature.
- [ ] Improve tests.
- [ ] Improve documentation.
- [ ] Refactor code for disabled code style rules. See [phpmd.xml](phpmd.xml) and [.php_cs.dist](.php_cs.dist).

## Contribute

If you would like to help, please take a look at the list of
[issues](https://github.com/Josantonius/PHP-Request/issues) or the [To Do](#-todo) checklist.

**Pull requests**

* [Fork and clone](https://help.github.com/articles/fork-a-repo).
* Run the command `composer install` to install the dependencies.
  This will also install the [dev dependencies](https://getcomposer.org/doc/03-cli.md#install).
* Run the command `composer fix` to excute code standard fixers.
* Run the [tests](#tests).
* Create a **branch**, **commit**, **push** and send me a
  [pull request](https://help.github.com/articles/using-pull-requests).

**Thank you to all the people who already contributed to this project!**

[<img alt="peter279k" src="https://avatars2.githubusercontent.com/u/9021747?v=4&s=117" height="117" width="117">](https://github.com/peter279k) |
:---:|
[peter279k](https://github.com/peter279k)|

## Repository

The file structure from this repository was created with [PHP-Skeleton](https://github.com/Josantonius/PHP-Skeleton).

## License

This project is licensed under **MIT license**. See the [LICENSE](LICENSE) file for more info.

## Copyright

2017 - 2018 Josantonius, [josantonius.com](https://josantonius.com/)

If you find it useful, let me know :wink:

You can contact me on [Twitter](https://twitter.com/Josantonius) or through my [email](mailto:hello@josantonius.com).