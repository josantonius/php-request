# PHP Request library

[![Latest Stable Version](https://poser.pugx.org/josantonius/request/v/stable)](https://packagist.org/packages/josantonius/request) [![Latest Unstable Version](https://poser.pugx.org/josantonius/request/v/unstable)](https://packagist.org/packages/josantonius/request) [![License](https://poser.pugx.org/josantonius/request/license)](LICENSE) [![Codacy Badge](https://api.codacy.com/project/badge/Grade/aa5b98dbbc5846399bb994318dce3c88)](https://www.codacy.com/app/Josantonius/php-request?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=Josantonius/php-request&amp;utm_campaign=Badge_Grade) [![Total Downloads](https://poser.pugx.org/josantonius/request/downloads)](https://packagist.org/packages/josantonius/request) [![Travis](https://travis-ci.org/Josantonius/php-request.svg)](https://travis-ci.org/Josantonius/php-request) [![PSR2](https://img.shields.io/badge/PSR-2-1abc9c.svg)](http://www.php-fig.org/psr/psr-2/) [![PSR4](https://img.shields.io/badge/PSR-4-9b59b6.svg)](http://www.php-fig.org/psr/psr-4/) [![CodeCov](https://codecov.io/gh/Josantonius/php-request/branch/master/graph/badge.svg)](https://codecov.io/gh/Josantonius/php-request)

[English version](README.md) 

Biblioteca PHP para manejo de peticiones.

---

- [Requisitos](#requisitos)
- [Instalación](#instalación)
- [Métodos disponibles](#métodos-disponibles)
- [Cómo empezar](#cómo-empezar)
- [Uso](#uso)
- [Tests](#tests)
- [Tareas pendientes](#-tareas-pendientes)
- [Contribuir](#contribuir)
- [Repositorio](#repositorio)
- [Licencia](#licencia)
- [Copyright](#copyright)

---

## Requisitos

Esta biblioteca es soportada por versiones de **PHP 7.0** o superiores y es compatible con versiones de **HHVM 3.0** o superiores.

**IMPORTANTE**: La versión 2.x no es compatible con la versión [1.x](https://github.com/Josantonius/php-request/tree/1.1.7) de esta biblioteca. 

**IMPORTANTE**: La version [1.x](https://github.com/Josantonius/php-request/tree/1.1.7) se considera obsoleta, aún así, si deseas utilizarla para versiones 5.6 de PHP puedes echar un vistazo a su [documentación](https://github.com/Josantonius/php-request/tree/1.1.7).

## Instalación 

La mejor forma de instalar esta extensión es a través de [Composer](http://getcomposer.org/download/).

Para instalar **PHP Request library**, simplemente escribe:

    $ composer require Josantonius/Request

El comando anterior sólo instalará los archivos necesarios, si prefieres **descargar todo el código fuente** puedes utilizar:

    $ composer require Josantonius/Request --prefer-source

También puedes **clonar el repositorio** completo con Git:

  $ git clone https://github.com/Josantonius/PHP-Request.git

O **instalarlo manualmente**:

Descarga [Request.php](https://raw.githubusercontent.com/Josantonius/php-request/master/src/Request.php) y [Validate.php](https://raw.githubusercontent.com/Josantonius/php-validate/master/src/Validate.php):

    $ wget https://raw.githubusercontent.com/Josantonius/php-request/master/src/Request.php

    $ wget https://raw.githubusercontent.com/Josantonius/php-validate/master/src/Validate.php

## Métodos disponibles

Métodos disponibles en esta biblioteca:

### - Comprobar si es una petición GET:

```php
Request::isGet();
```

**# Return** (boolean)

### - Comprobar si es una petición POST:

```php
Request::isPost();
```

**# Return** (boolean)

### - Comprobar si es una petición PUT:

```php
Request::isPut();
```

**# Return** (boolean)

### - Comprobar si es una petición DELETE:

```php
Request::isDelete();
```

**# Return** (boolean)

### - Get request params.

Para peticiones PUT y DELETE se comprobará el tipo de contenido para obtener correctamente los datos recibidos en la petición.

Los tipos de contenido compatibles con esta librería son:

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

| Atributo | Descripción | Tipo | Requerido | Predeterminado
| --- | --- | --- | --- | --- |
| $type | Tipo de solicitud. | string | Sí | |

**# Return** función anónima que devolverá el objeto Request cuando esta sea llamada

### - Saneamiento de datos y retornar como array:

```php
asArray($filters, $default);
```

| Atributo | Descripción | Tipo | Requerido | Predeterminado
| --- | --- | --- | --- | --- |
| $filters | Array asociativo con tipo de datos para cada clave. Los campos que no estén incluidos en los filtros no se sanearán. | array | No | `[]` |
| $default | Valor por defecto. Se devolverá NULL o el valor por defecto para los valores de los campos que no coincidan con el tipo de dato indicado.  | mixed | No | `null` |

**# Return** (array) → devolverá un array vacío en caso de error

### - Saneamiento de datos y retornar como objeto:

```php
asObject($filters, $default);
```

| Atributo | Descripción | Tipo | Requerido | Predeterminado
| --- | --- | --- | --- | --- |
| $filters | Array asociativo con tipo de datos para cada clave. Los campos que no estén incluidos en los filtros no se sanearán. | array | No | `[]` |
| $default | Valor por defecto. Se devolverá NULL o el valor por defecto para los valores de los campos que no coincidan con el tipo de dato indicado. | mixed | No | `null` |

**# Return** (object) → devolverá un array vacío en caso de error

### - Saneamiento de datos y retornar como JSON:

```php
asJson($default);
```

| Atributo | Descripción | Tipo | Requerido | Predeterminado
| --- | --- | --- | --- | --- |
| $default | Valor por defecto. Se devolverá NULL o el valor por defecto para los valores de los campos que no coincidan con el tipo de dato indicado. | mixed | No | `null` |

**# Return** (mixed|null) → valor, null o valor de retorno personalizado

### - Saneamiento de datos y retornar como cadena de texto:

```php
asString($default);
```

| Atributo | Descripción | Tipo | Requerido | Predeterminado
| --- | --- | --- | --- | --- |
| $default | Valor por defecto. Se devolverá NULL o el valor por defecto para los valores de los campos que no coincidan con el tipo de dato indicado. | mixed | No | `null` |

**# Return** (mixed|null) → valor, null o valor de retorno personalizado

### - Saneamiento de datos y retornar como entero:

```php
asInteger($default);
```

| Atributo | Descripción | Tipo | Requerido | Predeterminado
| --- | --- | --- | --- | --- |
| $default | Valor por defecto. Se devolverá NULL o el valor por defecto para los valores de los campos que no coincidan con el tipo de dato indicado. | mixed | No | `null` |

**# Return** (mixed|null) → valor, null o valor de retorno personalizado

### - Saneamiento de datos y retornar como decimal:

```php
asFloat($default);
```

| Atributo | Descripción | Tipo | Requerido | Predeterminado
| --- | --- | --- | --- | --- |
| $default | Valor por defecto. Se devolverá NULL o el valor por defecto para los valores de los campos que no coincidan con el tipo de dato indicado. | mixed | No | `null` |

**# Return** (mixed|null) → valor, null o valor de retorno personalizado

### - Saneamiento de datos y retornar como booleano:

```php
asBoolean($default);
```

| Atributo | Descripción | Tipo | Requerido | Predeterminado
| --- | --- | --- | --- | --- |
| $default | Valor por defecto. Se devolverá NULL o el valor por defecto para los valores de los campos que no coincidan con el tipo de dato indicado. | mixed | No | `null` |

**# Return** (mixed|null) → valor, null o valor de retorno personalizado

### - Saneamiento de datos y retornar como dirección IP:

```php
asIp($default);
```

| Atributo | Descripción | Tipo | Requerido | Predeterminado
| --- | --- | --- | --- | --- |
| $default | Valor por defecto. Se devolverá NULL o el valor por defecto para los valores de los campos que no coincidan con el tipo de dato indicado. | mixed | No | `null` |

**# Return** (mixed|null) → valor, null o valor de retorno personalizado

### - Saneamiento de datos y retornar como URL:

```php
asUrl($default);
```

| Atributo | Descripción | Tipo | Requerido | Predeterminado
| --- | --- | --- | --- | --- |
| $default | Valor por defecto. Se devolverá NULL o el valor por defecto para los valores de los campos que no coincidan con el tipo de dato indicado. | mixed | No | `null` |

**# Return** (mixed|null) → valor, null o valor de retorno personalizado

### - Saneamiento de datos y retornar como email:

```php
asEmail($default);
```

| Atributo | Descripción | Tipo | Requerido | Predeterminado
| --- | --- | --- | --- | --- |
| $default | Valor por defecto. Se devolverá NULL o el valor por defecto para los valores de los campos que no coincidan con el tipo de dato indicado. | mixed | No | `null` |

**# Return** (mixed|null) → valor, null o valor de retorno personalizado

## Cómo empezar

Para utilizar esta biblioteca con **Composer**:

```php
require __DIR__ . '/vendor/autoload.php';

use Josantonius\Request\Request;
```

Si la instalaste **manualmente**, utiliza:

```php
require_once __DIR__ . '/Request.php';
require_once __DIR__ . '/Validate.php';

use Josantonius\Request\Request;
use Josantonius\Validate\Validate;
```

## Uso

Para los ejemplos se simulará que se reciben los siguientes datos en la solicitud:

### Ejemplo de datos recibidos en la solicitud:

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

Ejemplo de uso para esta biblioteca:

### - Comprobar si es una petición GET:

```php
Request::isGet(); // true or false
```

### - Comprobar si es una petición POST:

```php
Request::isPost(); // true or false
```

### - Comprobar si es una petición PUT:

```php
Request::isPut(); // true or false
```

### - Comprobar si es una petición DELETE:

```php
Request::isDelete(); // true or false
```

### - Acceder a los parámetros de la solicitud:

```php
$_GET = Request::input('GET');

$_POST = Request::input('POST');

$_PUT = Request::input('PUT');

$_DELETE = Request::input('DELETE');
```

Devuelve una función anónima que devolverá el objeto Request cuando esta sea llamada.

### - Array:

#### - Sanear y devolver los datos como array:

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

* [Ejemplo de datos recibidos en la solicitud](#ejemplo-de-datos-recibidos-en-la-solicitud)

#### - Sanear, filtrar cada valor por el tipo de dato indicado y devolver como array:

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

var_dump($array['user_age']); // string(2) "35" (aunque se recibe un número entero, se devuelve como una cadena de texto)

var_dump($array['user_age']); // NULL (no existe, se devuelve el valor por defecto)
```

* [Ejemplo de datos recibidos en la solicitud](#ejemplo-de-datos-recibidos-en-la-solicitud)

#### - Sanear todos los datos recibidos como array, filtrar cada valor según el tipo de datos y especificar un valor para cada tecla cuando sea incorrecto:

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

var_dump($array['is_online']); // string(0) "" (no existe, se devuelve el valor por defecto)
```

* [Ejemplo de datos recibidos en la solicitud](#ejemplo-de-datos-recibidos-en-la-solicitud)

### - Objeto:

#### - Sanear y devolver los datos como objeto:

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

* [Ejemplo de datos recibidos en la solicitud](#ejemplo-de-datos-recibidos-en-la-solicitud)

#### - Sanear, filtrar cada valor por el tipo de dato indicado y devolver como objeto:

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

var_dump($object->user_age); // NULL (no existe, se devuelve el valor por defecto)
```

* [Ejemplo de datos recibidos en la solicitud](#ejemplo-de-datos-recibidos-en-la-solicitud)

#### - Sanear todos los datos recibidos como objeto, filtrar cada valor según el tipo de dato y especificar un valor para cada campo cuando sea incorrecto:

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

var_dump($object->is_online); // bool(false) (no existe, se devuelve el valor por defecto)

var_dump($object->is_member); // bool(false) (no existe, se devuelve el valor por defecto)
```

* [Ejemplo de datos recibidos en la solicitud](#ejemplo-de-datos-recibidos-en-la-solicitud)

### - JSON:

#### - Sanear y devolver los datos como JSON:

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

* [Ejemplo de datos recibidos en la solicitud](#ejemplo-de-datos-recibidos-en-la-solicitud)

#### - Obtener el valor de un campo específico, sanear los datos y devolverlos como JSON:

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

var_dump($json); // NULL (no existe, se devuelve el valor por defecto)
```

```php
$json = $_DELETE('user_address')->asJson([]);

var_dump($json); // string(2) "[]" (no existe, se devuelve el valor por defecto)
```

* [Ejemplo de datos recibidos en la solicitud](#ejemplo-de-datos-recibidos-en-la-solicitud)

### - String:

#### - Obtener el valor de un campo específico, sanear los datos y devolverlos como string:

```php
$string = $_GET('user_age')->asString();

var_dump($string); // string(2) "35" (aunque se recibe un número entero, se devuelve como una cadena de texto)
```

```php
$string = $_POST('user_name')->asString();

var_dump($string); // string(4) "John"
```

```php
$string = $_PUT('user_address')->asString();

var_dump($string); // NULL (es un array, se devuelve el valor por defecto)
```

```php
$string = $_DELETE('user_address')->asString('unknown');

var_dump($string); // string(7) "unknown" (es un array, se devuelve el valor por defecto)
```

* [Ejemplo de datos recibidos en la solicitud](#ejemplo-de-datos-recibidos-en-la-solicitud)

### - Integer:

#### - Obtener el valor de un campo específico, sanear los datos y devolverlos como número entero:

```php
$integer = $_GET('user_age')->asInteger();

var_dump($integer); // int(35)
```

```php
$integer = $_PUT('user_rating')->asInteger();

var_dump($integer); // NULL (es un número decimal, se devuelve el valor por defecto)
```

```php
$integer = $_DELETE('user_rating')->asInteger(5);

var_dump($integer); // int(5) (es un número decimal, se devuelve el valor por defecto)
```

* [Ejemplo de datos recibidos en la solicitud](#ejemplo-de-datos-recibidos-en-la-solicitud)

### - Float:

#### - Obtener el valor de un campo específico, sanear los datos y devolverlos como número decimal:

```php
$float = $_GET('user_age')->asFloat();

var_dump($float); // float(35) (aunque se recibe un número entero, se devuelve como un número decimal)
```

```php
$float = $_POST('user_rating')->asFloat();

var_dump($float); // float(8.5)
```

```php
$float = $_PUT('user_name')->asFloat();

var_dump($float); // NULL (es una cadena de texto, se devuelve el valor por defecto)
```

```php
$float = $_DELETE('user_name')->asFloat(5.5);

var_dump($float); // float(5.5) (es una cadena de texto, se devuelve el valor por defecto)
```

* [Ejemplo de datos recibidos en la solicitud](#ejemplo-de-datos-recibidos-en-la-solicitud)

### - Boolean:

#### - Obtener el valor de un campo específico, sanear los datos y devolverlos como booleanos:

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

var_dump($boolean); // NULL (es una cadena de texto, se devuelve el valor por defecto)
```

```php
$boolean = $_DELETE('is_online')->asBoolean(false);

var_dump($boolean); // bool(false) (no existe, se devuelve el valor por defecto)
```

### - IP:

#### - Obtener el valor de un campo específico, sanear los datos y devolverlos como dirección IP:

```php
$ip = $_GET('user_ip')->asIp();

var_dump($ip); // string(12) "89.58.54.188"
```

```php
$ip = $_POST('user_rating')->asIp();

var_dump($ip); // NULL (no es una IP, se devuelve el valor por defecto)
```

```php
$ip = $_DELETE('user_name')->asIp("87.32.48.164");

var_dump($ip); // string(12) "87.32.48.164" (no es una IP, se devuelve el valor por defecto)
```

* [Ejemplo de datos recibidos en la solicitud](#ejemplo-de-datos-recibidos-en-la-solicitud)

### - URL:

#### - Obtener el valor de un campo específico, sanear los datos y devolverlos como URL:

```php
$url = $_GET('user_website')->asUrl();

var_dump($url); // string(20) "http://www.site.com/"
```

```php
$url = $_POST('user_rating')->asUrl();

var_dump($url); // NULL (no es una URL, se devuelve el valor por defecto)
```

```php
$url = $_DELETE('user_name')->asUrl("http://www.site.com/");

var_dump($url); // string(20) "http://www.site.com/" (no es una URL, se devuelve el valor por defecto)
```

* [Ejemplo de datos recibidos en la solicitud](#ejemplo-de-datos-recibidos-en-la-solicitud)

### - email:

#### - Obtener el valor de un campo específico, sanear los datos y devolverlos como email:

```php
$email = $_GET('user_website')->asEmail();

var_dump($email); // string(13) "john@site.com"
```

```php
$email = $_POST('user_rating')->asEmail();

var_dump($email); // NULL (no es un correo electrónico, se devuelve el valor por defecto)
```

```php
$email = $_DELETE('user_name')->asEmail("john@site.com");

var_dump($email); // string(13) "john@site.com" (no es un correo electrónico, se devuelve el valor por defecto)
```

* [Ejemplo de datos recibidos en la solicitud](#ejemplo-de-datos-recibidos-en-la-solicitud)

## Tests 

Para ejecutar las [pruebas](tests) necesitarás [Composer](http://getcomposer.org/download/) y seguir los siguientes pasos:

    $ git clone https://github.com/Josantonius/php-request.git
    
    $ cd php-request

    $ composer install

Ejecutar pruebas unitarias con [PHPUnit](https://phpunit.de/):

    $ gnome-terminal -e 'php -S localhost:8000 -t tests/'

    $ composer phpunit

Ejecutar pruebas de estándares de código [PSR2](http://www.php-fig.org/psr/psr-2/) con [PHPCS](https://github.com/squizlabs/PHP_CodeSniffer):

    $ composer phpcs

Ejecutar pruebas con [PHP Mess Detector](https://phpmd.org/) para detectar inconsistencias en el estilo de codificación:

    $ composer phpmd

Ejecutar todas las pruebas anteriores:

    $ composer tests

## ☑ Tareas pendientes

- [ ] Añadir nueva funcionalidad.
- [ ] Mejorar pruebas.
- [ ] Mejorar documentación.
- [ ] Refactorizar código para las reglas de estilo de código deshabilitadas. Ver [phpmd.xml](phpmd.xml) y [.php_cs.dist](.php_cs.dist).
- [ ] Detener la exclusión de archivos de prueba en [.php_cs.dist](.php_cs.dist).
- [ ] Cambiar el método `getParsedInput` a público, crear tests y documentarlo.
- [ ] Cambiar el método `getContentType` a público, crear tests y documentarlo.
- [ ] Cambiar el método `parseRaw` a público, crear tests y documentarlo.

## Contribuir

Si deseas colaborar, puedes echar un vistazo a la lista de
[issues](https://github.com/Josantonius/PHP-Request/issues) o [tareas pendientes](#-tareas-pendientes).

**Pull requests**

* [Fork and clone](https://help.github.com/articles/fork-a-repo).
* Ejecuta el comando `composer install` para instalar dependencias.
  Esto también instalará las [dependencias de desarrollo](https://getcomposer.org/doc/03-cli.md#install).
* Ejecuta el comando `composer fix` para estandarizar el código.
* Ejecuta las [pruebas](#tests).
* Crea una nueva rama (**branch**), **commit**, **push** y envíame un
  [pull request](https://help.github.com/articles/using-pull-requests).

**¡Gracias a quienes ya habéis contribuido a este proyecto!**

[<img alt="peter279k" src="https://avatars2.githubusercontent.com/u/9021747?v=4&s=117" height="117" width="117">](https://github.com/peter279k)|[<img alt="Mahdrentys" src="https://avatars2.githubusercontent.com/u/40216477?v=4&s=117" height="117" width="117">](https://github.com/Mahdrentys)|
:---:|:---:|
[peter279k](https://github.com/peter279k)| [Mahdrentys](https://github.com/Mahdrentys)|

## Repositorio

La estructura de archivos de este repositorio se creó con [PHP-Skeleton](https://github.com/Josantonius/PHP-Skeleton).

## Licencia

Este proyecto está licenciado bajo **licencia MIT**. Consulta el archivo [LICENSE](LICENSE) para más información.

## Copyright

2017 - 2018 Josantonius, [josantonius.com](https://josantonius.com/)

Si te ha resultado útil, házmelo saber :wink:

Puedes contactarme en [Twitter](https://twitter.com/Josantonius) o a través de mi [correo electrónico](mailto:hello@josantonius.com).