# PHP Request library

[![Latest Stable Version](https://poser.pugx.org/josantonius/request/v/stable)](https://packagist.org/packages/josantonius/request) [![Latest Unstable Version](https://poser.pugx.org/josantonius/request/v/unstable)](https://packagist.org/packages/josantonius/request) [![License](https://poser.pugx.org/josantonius/request/license)](LICENSE) [![Codacy Badge](https://api.codacy.com/project/badge/Grade/aa5b98dbbc5846399bb994318dce3c88)](https://www.codacy.com/app/Josantonius/php-request?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=Josantonius/php-request&amp;utm_campaign=Badge_Grade) [![Total Downloads](https://poser.pugx.org/josantonius/request/downloads)](https://packagist.org/packages/josantonius/request) [![Travis](https://travis-ci.org/Josantonius/php-request.svg)](https://travis-ci.org/Josantonius/php-request) [![PSR2](https://img.shields.io/badge/PSR-2-1abc9c.svg)](http://www.php-fig.org/psr/psr-2/) [![PSR4](https://img.shields.io/badge/PSR-4-9b59b6.svg)](http://www.php-fig.org/psr/psr-4/) [![CodeCov](https://codecov.io/gh/Josantonius/php-request/branch/master/graph/badge.svg)](https://codecov.io/gh/Josantonius/php-request)

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

This library is supported by **PHP versions 7.0** or higher.

**IMPORTANT**: Version 2.x does not support version [1.x](https://github.com/Josantonius/php-request/tree/1.1.7) of this library. 

**IMPORTANT**: Version [1.x](https://github.com/Josantonius/php-request/tree/1.1.7) has been considered obsolete, but if you want to use it for 5.6 versions of PHP you can have a look at its [documentation](https://github.com/Josantonius/php-request/tree/1.1.7).

## Installation

The preferred way to install this extension is through [Composer](http://getcomposer.org/download/).

To install **PHP Request library**, simply:

    $ composer require josantonius/request

The previous command will only install the necessary files, if you prefer to **download the entire source code** you can use:

    $ composer require josantonius/request --prefer-source

You can also **clone the complete repository** with Git:

  $ git clone https://github.com/Josantonius/php-request.git

Or **install it manually**:

Download [Request.php](https://raw.githubusercontent.com/Josantonius/php-request/master/src/Request.php) and [Validate.php](https://raw.githubusercontent.com/Josantonius/php-validate/master/src/Validate.php):

    $ wget https://raw.githubusercontent.com/Josantonius/php-request/master/src/Request.php

    $ wget https://raw.githubusercontent.com/Josantonius/php-validate/master/src/Validate.php

## Available Methods

Available methods in this library:

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

### - Get request params.

For PUT and DELETE requests, the content type will be checked to correctly obtain the data received in the request.

The content types compatible with this library are:

- application/atom+xml
- text/html
- text/plain
- application/json
- application/javascript
- multipart/form-data
- application/x-www-form-urlencoded

```php
Request::input($type);
```

| Attribute | Description | Type | Required | Default
| --- | --- | --- | --- | --- |
| $type | Request type. | string | Yes | |

**# Return** anonymous function that will return the Request object when it's called

### - Data sanitation and return as array:

```php
asArray($filters, $default);
```

| Attribute | Description | Type | Required | Default
| --- | --- | --- | --- | --- |
| $filters | Associative array with data type for each key. Fields that are not included in the filters will not be sanitized. | array | No | `[]` |
| $default | Default value. Null or the default value will be returned for fields that do not match with the data type indicated.  | mixed | No | `null` |

**# Return** (array) → it will return an empty array in case of error

### - Data sanitation and return as object:

```php
asObject($filters, $default);
```

| Attribute | Description | Type | Required | Default
| --- | --- | --- | --- | --- |
| $filters | Associative array with data type for each key. Fields that are not included in the filters will not be sanitized. | array | No | `[]` |
| $default | Default value. Null or the default value will be returned for fields that do not match with the data type indicated. | mixed | No | `null` |

**# Return** (object) → it will return an empty object in case of error

### - Data sanitation and return as JSON:

```php
asJson($default);
```

| Attribute | Description | Type | Required | Default
| --- | --- | --- | --- | --- |
| $default | Default value. Null or the default value will be returned for fields that do not match with the data type indicated. | mixed | No | `null` |

**# Return** (mixed|null) → value, null or customized return value

### - Data sanitation and return as string:

```php
asString($default);
```

| Attribute | Description | Type | Required | Default
| --- | --- | --- | --- | --- |
| $default | Default value. Null or the default value will be returned for fields that do not match with the data type indicated. | mixed | No | `null` |

**# Return** (mixed|null) → value, null or customized return value

### - Data sanitation and return as integer:

```php
asInteger($default);
```

| Attribute | Description | Type | Required | Default
| --- | --- | --- | --- | --- |
| $default | Default value. Null or the default value will be returned for fields that do not match with the data type indicated. | mixed | No | `null` |

**# Return** (mixed|null) → value, null or customized return value

### - Data sanitation and return as float:

```php
asFloat($default);
```

| Attribute | Description | Type | Required | Default
| --- | --- | --- | --- | --- |
| $default | Default value. Null or the default value will be returned for fields that do not match with the data type indicated. | mixed | No | `null` |

**# Return** (mixed|null) → value, null or customized return value

### - Data sanitation and return as boolean:

```php
asBoolean($default);
```

| Attribute | Description | Type | Required | Default
| --- | --- | --- | --- | --- |
| $default | Default value. Null or the default value will be returned for fields that do not match with the data type indicated. | mixed | No | `null` |

**# Return** (mixed|null) → value, null or customized return value

### - Data sanitation and return as IP address:

```php
asIp($default);
```

| Attribute | Description | Type | Required | Default
| --- | --- | --- | --- | --- |
| $default | Default value. Null or the default value will be returned for fields that do not match with the data type indicated. | mixed | No | `null` |

**# Return** (mixed|null) → value, null or customized return value

### - Data sanitation and return as URL:

```php
asUrl($default);
```

| Attribute | Description | Type | Required | Default
| --- | --- | --- | --- | --- |
| $default | Default value. Null or the default value will be returned for fields that do not match with the data type indicated. | mixed | No | `null` |

**# Return** (mixed|null) → value, null or customized return value

### - Data sanitation and return as email:

```php
asEmail($default);
```

| Attribute | Description | Type | Required | Default
| --- | --- | --- | --- | --- |
| $default | Default value. Null or the default value will be returned for fields that do not match with the data type indicated. | mixed | No | `null` |

**# Return** (mixed|null) → value, null or customized return value

## Quick Start

To use this library with **Composer**:

```php
require __DIR__ . '/vendor/autoload.php';

use Josantonius\Request\Request;
```

Or If you installed it **manually**, use it:

```php
require_once __DIR__ . '/Request.php';
require_once __DIR__ . '/Validate.php';

use Josantonius\Request\Request;
use Josantonius\Validate\Validate;
```

## Usage

For the examples it will be simulated that the following data is received in the request:

### Example data received in the request:

```php
'user_name' => 'John'
'user_surname' => 'Doe'
'user_age' => 35
'user_rating' => 8.5
'user_ip' => '89.58.54.188'
'user_website' => 'http://www.site.com/'
'user_email' => 'john@site.com'
'user_address' => [
  'street' => 'unknown'
  'locality' => 'Seville'
  'country' => 'Spain'
]
'is_active' => true
```

Example of use for this library:

### - Check if it's a GET request:

```php
Request::isGet(); // true or false
```

### - Check if it's a POST request:

```php
Request::isPost(); // true or false
```

### - Check if it's a PUT request:

```php
Request::isPut(); // true or false
```

### - Check if it's a DELETE request:

```php
Request::isDelete(); // true or false
```

### - Access to the parameters of the request.

```php
$_GET = Request::input('GET');

$_POST = Request::input('POST');

$_PUT = Request::input('PUT');

$_DELETE = Request::input('DELETE');
```

Returns an anonymous function that will return the Request object when it's called.

### - As array:

#### - Get and sanitize all data and return them as array:

```php
$array = $_GET()->asArray();

$array = $_POST()->asArray();

$array = $_PUT()->asArray();

$array = $_DELETE()->asArray();
```

```php
var_dump($array);

/*
array(9) {
  ["user_name"]=>
  string(4) "John"
  ["user_surname"]=>
  string(3) "Doe"
  ["user_age"]=>
  int(35)
  ["user_rating"]=>
  float(8.5)
  ["user_ip"]=>
  string(12) "89.58.54.188"
  ["user_website"]=>
  string(20) "http://www.site.com/"
  ["user_email"]=>
  string(13) "john@site.com"
  ["user_address"]=>
  array(3) {
    ["street"]=>
    string(7) "unknown"
    ["locality"]=>
    string(7) "Seville"
    ["country"]=>
    string(5) "Spain"
  }
  ["is_active"]=>
  bool(true)
}
*/
```

* [Example data received in the request](#example-data-received-in-the-request)

#### - Obtain, sanitize all data and return them as array and filter each value according to the data type:

```php
$filters = [
    'user_name' => 'string',
    'user_age' => 'string',
    'is_online' => 'boolean'
];

$array = $_GET()->asArray($filters);

$array = $_POST()->asArray($filters);

$array = $_PUT()->asArray($filters);

$array = $_DELETE()->asArray($filters);
```

```php
var_dump($array['user_name']); // string(4) "John"

var_dump($array['user_age']); // string(2) "35" (although an integer is received, it's returned as a string)

var_dump($array['user_age']); // NULL (doesn't exist, the default value is returned)
```

* [Example data received in the request](#example-data-received-in-the-request)

#### - Obtain, sanitize all data and return them as array, filter each value according to the data type and specify a value for each key when it's wrong:

```php
$filters = [
    'user_rating' => 'float',
    'is_active' => 'boolean',
    'is_online' => 'boolean'
];

$array = $_GET()->asArray($filters, '');

$array = $_POST()->asArray($filters, '');

$array = $_PUT()->asArray($filters, '');

$array = $_DELETE()->asArray($filters, '');
```

```php
var_dump($array['user_rating']); // float(8.5)

var_dump($array['is_active']); // bool(true)

var_dump($array['is_online']); // string(0) "" (doesn't exist, the default value is returned)
```

* [Example data received in the request](#example-data-received-in-the-request)

### - As object:

#### - Get and sanitize all data and return them as object:

```php
$object = $_GET()->asObject();

$object = $_POST()->asObject();

$object = $_PUT()->asObject();

$object = $_DELETE()->asObject();
```

```php
var_dump($object);

/*
object(stdClass)#1 (9) {
  ["user_name"]=>
  string(4) "John"
  ["user_surname"]=>
  string(3) "Doe"
  ["user_age"]=>
  int(35)
  ["user_rating"]=>
  float(8.5)
  ["user_ip"]=>
  string(12) "89.58.54.188"
  ["user_website"]=>
  string(20) "http://www.site.com/"
  ["user_email"]=>
  string(13) "john@site.com"
  ["user_address"]=>
  object(stdClass)#2 (3) {
    ["street"]=>
    string(7) "unknown"
    ["locality"]=>
    string(7) "Seville"
    ["country"]=>
    string(5) "Spain"
  }
  ["is_active"]=>
  bool(true)
}
*/
```

* [Example data received in the request](#example-data-received-in-the-request)

#### - Obtain, sanitize all data and return them as object and filter each value according to the data type:

```php
$filters = [
    'user_name' => 'string',
    'user_age' => 'integer',
    'is_online' => 'boolean'
];

$object = $_GET()->asObject($filters);

$object = $_POST()->asObject($filters);

$object = $_PUT()->asObject($filters);

$object = $_DELETE()->asObject($filters);
```

```php
var_dump($object->user_name); // string(4) "John"

var_dump($object->user_age); // int(35)

var_dump($object->user_age); // NULL (doesn't exist, the default value is returned)
```

* [Example data received in the request](#example-data-received-in-the-request)

#### - Obtain, sanitize all data and return them as object, filter each value according to the data type and specify a value for each key when it's wrong:

```php
$filters = [
    'user_rating' => 'float',
    'user_surname' => 'boolean',
    'is_online' => 'boolean',
    'is_member' => 'boolean'
];

$object = $_GET()->asObject($filters, false);

$object = $_POST()->asObject($filters, false);

$object = $_PUT()->asObject($filters, false);

$object = $_DELETE()->asObject($filters, false);
```

```php
var_dump($object->user_rating); // float(8.5)

var_dump($object->user_surname); // string(3) "Doe"

var_dump($object->is_online); // bool(false) (doesn't exist, the default value is returned)

var_dump($object->is_member); // bool(false) (doesn't exist, the default value is returned)
```

* [Example data received in the request](#example-data-received-in-the-request)

### - As JSON:

#### - Get and sanitize all data and return them as JSON:

```php
$json = $_GET()->asJson();

$json = $_POST()->asJson();

$json = $_PUT()->asJson();

$json = $_DELETE()->asJson();
```

```php
var_dump($json);

/*
string(260) "{"user_name":"John","user_surname":"Doe","user_age":35,"user_rating":8.5,"user_ip":"89.58.54.188","user_website":"http:\/\/www.site.com\/","user_email":"john@site.com","user_address":{"street":"unknown","locality":"Seville","country":"Spain"},"is_active":true}"
*/
```

* [Example data received in the request](#example-data-received-in-the-request)

#### - Get specific key value, sanitize data and return them as JSON:

```php
$json = $_GET('user_address')->asJson();

var_dump($json); // string(59) "{"street":"unknown","locality":"Seville","country":"Spain"}"
```

```php
$json = $_POST('user_name')->asJson();

var_dump($json); // string(6) ""John""
```

```php
$json = $_PUT('is_online')->asJson();

var_dump($json); // NULL (doesn't exist, the default value is returned)
```

```php
$json = $_DELETE('user_address')->asJson([]);

var_dump($json); // string(2) "[]" (doesn't exist, the default value is returned)
```

* [Example data received in the request](#example-data-received-in-the-request)

### - As string:

#### - Get specific key value, sanitize data and return them as string:

```php
$string = $_GET('user_age')->asString();

var_dump($string); // string(2) "35" (although an integer is received, it's returned as a string)
```

```php
$string = $_POST('user_name')->asString();

var_dump($string); // string(4) "John"
```

```php
$string = $_PUT('user_address')->asString();

var_dump($string); // NULL (it's an array, the default value is returned)
```

```php
$string = $_DELETE('user_address')->asString('unknown');

var_dump($string); // string(7) "unknown" (it's an array, the default value is returned)
```

* [Example data received in the request](#example-data-received-in-the-request)

### - As integer:

#### - Get specific key value, sanitize data and return them as integer:

```php
$integer = $_GET('user_age')->asInteger();

var_dump($integer); // int(35)
```

```php
$integer = $_PUT('user_rating')->asInteger();

var_dump($integer); // NULL (it's a float, the default value is returned)
```

```php
$integer = $_DELETE('user_rating')->asInteger(5);

var_dump($integer); // int(5) (it's a float, the default value is returned)
```

* [Example data received in the request](#example-data-received-in-the-request)

### - As float:

#### - Get specific key value, sanitize data and return them as float:

```php
$float = $_GET('user_age')->asFloat();

var_dump($float); // float(35) (although an integer is received, it's returned as a float)
```

```php
$float = $_POST('user_rating')->asFloat();

var_dump($float); // float(8.5)
```

```php
$float = $_PUT('user_name')->asFloat();

var_dump($float); // NULL (it's a string, the default value is returned)
```

```php
$float = $_DELETE('user_name')->asFloat(5.5);

var_dump($float); // float(5.5) (it's a string, the default value is returned)
```

* [Example data received in the request](#example-data-received-in-the-request)

### - As boolean:

#### - Get specific key value, sanitize data and return them as boolean:

```php
$_GET['is_active'] = true;

$boolean = $_GET('is_active')->asBoolean();

var_dump($boolean); // bool(true)
```

```php
$_GET['is_active'] = 'true';

$boolean = $_GET('is_active')->asBoolean();

var_dump($boolean); // bool(true)
```

```php
$_POST['is_active'] = '1';

$boolean = $_POST('is_active')->asBoolean();

var_dump($boolean); // bool(true)
```

```php
$_POST['is_active'] = 1;

$boolean = $_POST('is_active')->asBoolean();

var_dump($boolean); // bool(true)
```

```php
$_GET['is_active'] = false;

$boolean = $_GET('is_active')->asBoolean();

var_dump($boolean); // bool(false)
```

```php
$_GET['is_active'] = 'false';

$boolean = $_GET('is_active')->asBoolean();

var_dump($boolean); // bool(false)
```

```php
$_POST['is_active'] = '0';

$boolean = $_POST('is_active')->asBoolean();

var_dump($boolean); // bool(false)
```

```php
$_POST['is_active'] = 0;

$boolean = $_POST('is_active')->asBoolean();

var_dump($boolean); // bool(false)
```

```php
$boolean = $_PUT('user_name')->asBoolean();

var_dump($boolean); // NULL (it's a string, the default value is returned)
```

```php
$boolean = $_DELETE('is_online')->asBoolean(false);

var_dump($boolean); // bool(false) (doesn't exist, the default value is returned)
```

### - As IP:

#### - Get specific key value, sanitize data and return them as IP:

```php
$ip = $_GET('user_ip')->asIp();

var_dump($ip); // string(12) "89.58.54.188"
```

```php
$ip = $_POST('user_rating')->asIp();

var_dump($ip); // NULL (it's not an IP, the default value is returned)
```

```php
$ip = $_DELETE('user_name')->asIp("87.32.48.164");

var_dump($ip); // string(12) "87.32.48.164" (it's not an IP, the default value is returned)
```

* [Example data received in the request](#example-data-received-in-the-request)

### - As URL:

#### - Get specific key value, sanitize data and return them as URL:

```php
$url = $_GET('user_website')->asUrl();

var_dump($url); // string(20) "http://www.site.com/"
```

```php
$url = $_POST('user_rating')->asUrl();

var_dump($url); // NULL (it's not an URL, the default value is returned)
```

```php
$url = $_DELETE('user_name')->asUrl("http://www.site.com/");

var_dump($url); // string(20) "http://www.site.com/" (it's not an URL, the default value is returned)
```

* [Example data received in the request](#example-data-received-in-the-request)

### - As email:

#### - Get specific key value, sanitize data and return them as email:

```php
$email = $_GET('user_website')->asEmail();

var_dump($email); // string(13) "john@site.com"
```

```php
$email = $_POST('user_rating')->asEmail();

var_dump($email); // NULL (it's not an email, the default value is returned)
```

```php
$email = $_DELETE('user_name')->asEmail("john@site.com");

var_dump($email); // string(13) "john@site.com" (it's not an email, the default value is returned)
```

* [Example data received in the request](#example-data-received-in-the-request)

## Tests 

To run [tests](tests) you just need [composer](http://getcomposer.org/download/) and to execute the following:

    $ git clone https://github.com/Josantonius/php-request.git
    
    $ cd php-request

    $ composer install

Run unit tests with [PHPUnit](https://phpunit.de/):

    $ gnome-terminal -e 'php -S localhost:8000 -t tests/'

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
- [ ] Stop exclusion of test files in [.php_cs.dist](.php_cs.dist).
- [ ] Change the `getParsedInput` method to public, create tests and document it.
- [ ] Change the `getContentType` method to public, create tests and document it.
- [ ] Change the `parseRaw` method to public, create tests and document it.

## Contribute

If you would like to help, please take a look at the list of
[issues](https://github.com/Josantonius/php-request/issues) or the [To Do](#-todo) checklist.

**Pull requests**

* [Fork and clone](https://help.github.com/articles/fork-a-repo).
* Run the command `composer install` to install the dependencies.
  This will also install the [dev dependencies](https://getcomposer.org/doc/03-cli.md#install).
* Run the command `composer fix` to excute code standard fixers.
* Run the [tests](#tests).
* Create a **branch**, **commit**, **push** and send me a
  [pull request](https://help.github.com/articles/using-pull-requests).

**Thank you to all the people who already contributed to this project!**

[<img alt="peter279k" src="https://avatars2.githubusercontent.com/u/9021747?v=4&s=117" height="117" width="117">](https://github.com/peter279k)|[<img alt="Mahdrentys" src="https://avatars2.githubusercontent.com/u/40216477?v=4&s=117" height="117" width="117">](https://github.com/Mahdrentys)|
:---:|:---:|
[peter279k](https://github.com/peter279k)| [Mahdrentys](https://github.com/Mahdrentys)|

## Repository

The file structure from this repository was created with [PHP-Skeleton](https://github.com/Josantonius/PHP-Skeleton).

## License

This project is licensed under **MIT license**. See the [LICENSE](LICENSE) file for more info.

## Copyright

2017 - 2018 Josantonius, [josantonius.com](https://josantonius.com/)

If you find it useful, let me know :wink:

You can contact me on [Twitter](https://twitter.com/Josantonius) or through my [email](mailto:hello@josantonius.com).