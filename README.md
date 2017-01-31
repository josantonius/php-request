# PHP Request library

[![Latest Stable Version](https://poser.pugx.org/josantonius/request/v/stable)](https://packagist.org/packages/josantonius/request) [![Total Downloads](https://poser.pugx.org/josantonius/request/downloads)](https://packagist.org/packages/josantonius/request) [![Latest Unstable Version](https://poser.pugx.org/josantonius/request/v/unstable)](https://packagist.org/packages/josantonius/request) [![License](https://poser.pugx.org/josantonius/request/license)](https://packagist.org/packages/josantonius/request)

[Spanish version](README-ES.md)

PHP library for handling requests.

---

- [Installation](#installation)
- [Requirements](#requirements)
- [Quick Start and Examples](#quick-start-and-examples)
- [Available Methods](#available-methods)
- [Usage](#usage)
- [Tests](#tests)
- [Exception Handler](#exception-handler)
- [Contribute](#contribute)
- [Repository](#repository)
- [Author](#author)
- [Licensing](#licensing)

---

### Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

To install PHP Request library, simply:

    $ composer require Josantonius/Request

### Requirements

This library is supported by PHP versions 5.6 or higher and is compatible with HHVM versions 3.0 or higher.

### Quick Start and Examples

To use this class, simply:

```php
require __DIR__ . '/vendor/autoload.php';

use Josantonius\Request\Request;
```
### Available Methods

Available methods in this library:

```php
Request::get();
Request::post();
Request::files();
Request::put();
Request::del();
Request::isGet();
Request::isPost();
Request::isPut();
Request::isDelete();
Request::isAjax();
```
### Usage

Example of use for this library:

```php
<?php
require __DIR__ . '/vendor/autoload.php';

use Josantonius\Request\Request;

if (Request::isPost()) {

    $name = Request::post('name');
}
```

### Tests 

To use the [test](tests) class, simply:

```php
<?php
$loader = require __DIR__ . '/vendor/autoload.php';

$loader->addPsr4('Josantonius\\Request\\Tests\\', __DIR__ . '/vendor/josantonius/request/tests');

use Josantonius\Request\Tests\RequestTest;

```
Available test methods in this library:

```php
RequestTest::testGet();
RequestTest::testGetSpecificKey();
RequestTest::testPost();
RequestTest::testPostSpecificKey();
RequestTest::testFiles();
RequestTest::testFilesSpecificKey();
RequestTest::testPut();
RequestTest::testPutSpecificKey();
RequestTest::testDel();
RequestTest::testDelSpecificKey();
RequestTest::testIsGet();
RequestTest::testIsPost();
RequestTest::testIsPut();
RequestTest::testIsDelete();
RequestTest::testIsAjax();
```

### Exception Handler

This library uses [exception handler](src/Exception) that you can customize.
### Contribute
1. Check for open issues or open a new issue to start a discussion around a bug or feature.
1. Fork the repository on GitHub to start making your changes.
1. Write one or more tests for the new feature or that expose the bug.
1. Make code changes to implement the feature or fix the bug.
1. Send a pull request to get your changes merged and published.

This is intended for large and long-lived objects.

### Repository

All files in this repository were created and uploaded automatically with [Reposgit Creator](https://github.com/Josantonius/BASH-Reposgit).

### Author

Maintained by [Josantonius](https://github.com/Josantonius/).

### Licensing

This project is licensed under **MIT license**. See the [LICENSE](LICENSE) file for more info.