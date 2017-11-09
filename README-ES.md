# PHP Request library

[![Latest Stable Version](https://poser.pugx.org/josantonius/Request/v/stable)](https://packagist.org/packages/josantonius/Request) [![Latest Unstable Version](https://poser.pugx.org/josantonius/Request/v/unstable)](https://packagist.org/packages/josantonius/Request) [![License](https://poser.pugx.org/josantonius/Request/license)](LICENSE) [![Codacy Badge](https://api.codacy.com/project/badge/Grade/aa5b98dbbc5846399bb994318dce3c88)](https://www.codacy.com/app/Josantonius/PHP-Request?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=Josantonius/PHP-Request&amp;utm_campaign=Badge_Grade) [![Total Downloads](https://poser.pugx.org/josantonius/Request/downloads)](https://packagist.org/packages/josantonius/Request) [![Travis](https://travis-ci.org/Josantonius/PHP-Request.svg)](https://travis-ci.org/Josantonius/PHP-Request) [![PSR2](https://img.shields.io/badge/PSR-2-1abc9c.svg)](http://www.php-fig.org/psr/psr-2/) [![PSR4](https://img.shields.io/badge/PSR-4-9b59b6.svg)](http://www.php-fig.org/psr/psr-4/) [![CodeCov](https://codecov.io/gh/Josantonius/PHP-Request/branch/master/graph/badge.svg)](https://codecov.io/gh/Josantonius/PHP-Request)

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

Esta clase es soportada por versiones de **PHP 5.6** o superiores y es compatible con versiones de **HHVM 3.0** o superiores.

## Instalación 

La mejor forma de instalar esta extensión es a través de [Composer](http://getcomposer.org/download/).

Para instalar **PHP Request library**, simplemente escribe:

    $ composer require Josantonius/Request

El comando anterior sólo instalará los archivos necesarios, si prefieres **descargar todo el código fuente** puedes utilizar:

    $ composer require Josantonius/Request --prefer-source

También puedes **clonar el repositorio** completo con Git:

  $ git clone https://github.com/Josantonius/PHP-Request.git

O **instalarlo manualmente**:

[Descargar Request.php](https://raw.githubusercontent.com/Josantonius/PHP-Request/master/src/Request.php):

    $ wget https://raw.githubusercontent.com/Josantonius/PHP-Request/master/src/Request.php

## Métodos disponibles

Métodos disponibles en esta biblioteca:

### - Acceso seguro a parámetros GET:

```php
Request::get($key);
```

| Atributo | Descripción | Tipo | Requerido | Predeterminado
| --- | --- | --- | --- | --- |
| $key | Clave para parámetro. | string | Sí | |

**# Return** (mixed|null) → valor/es o null

### - Acceso seguro a parámetros POST:

```php
Request::post($key);
```

| Atributo | Descripción | Tipo | Requerido | Predeterminado
| --- | --- | --- | --- | --- |
| $key | Clave para parámetro. | string | Sí | |

**# Return** (mixed|null) → valor/es o null

### - Acceso seguro a parámetros FILES:

```php
Request::files($key);
```

| Atributo | Descripción | Tipo | Requerido | Predeterminado
| --- | --- | --- | --- | --- |
| $key | Clave para parámetro. | string | Sí | |

**# Return** (mixed|null) → valor/es o null

### - Acceso seguro a parámetros PUT:

```php
Request::put($key);
```

| Atributo | Descripción | Tipo | Requerido | Predeterminado
| --- | --- | --- | --- | --- |
| $key | Clave para parámetro. | string | Sí | |

**# Return** (mixed|null) → valor/es o null

### - Acceso seguro a parámetros DEL:

```php
Request::del($key);
```

| Atributo | Descripción | Tipo | Requerido | Predeterminado
| --- | --- | --- | --- | --- |
| $key | Clave para parámetro. | string | Sí | |

**# Return** (mixed|null) → valor/es o null

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

### - Comprobar si es una petición AJAX:

```php
Request::isAjax();
```

**# Return** (boolean)

## Cómo empezar

Para utilizar esta biblioteca con **Composer**:

```php
require __DIR__ . '/vendor/autoload.php';

use Josantonius\Request\Request;
```

Si la instalaste **manualmente**, utiliza:

```php
require_once __DIR__ . '/Request.php';

use Josantonius\Request\Request;
```

## Uso

Ejemplo de uso para esta biblioteca:

### - Obtener todos los valores GET:

```php
$_GET = ['test' => 'value', 'test-2' => 1];

Request::get();
```

### - Acceder al parámetro GET indicando clave específica:

```php
$_GET = ['test' => 'value', 'test-2' => 1];

Request::get('test');
```

### - Obtener todos los valores POST:

```php
$_POST = ['test' => 'value', 'test-2' => 1];

Request::post();
```

### - Acceder al parámetro POST indicando clave específica:

```php
$_POST = ['test' => 'value', 'test-2' => 1];

Request::post('test');
```

### - Obtener todos los valores FILES:

```php
$_FILES = ['test' => 'value', 'test-2' => 1];

Request::files();
```

### - Acceder al parámetro FILES indicando clave específica:

```php
$_FILES = ['test' => 'value', 'test-2' => 1];

Request::files('test');
```

### - Obtener todos los valores PUT:

```php
$_PUT = ['test' => 'value', 'test-2' => 1];

Request::put();
```

### - Acceder al parámetro PUT indicando clave específica:

```php
$_PUT = ['test' => 'value', 'test-2' => 1];

Request::put('test');
```

### - Comprobar si es una petición POST:

```php
$_SERVER['REQUEST_METHOD'] = 'POST';

Request::isPost()
```

### - Comprobar si es una petición PUT:

```php
$_SERVER['REQUEST_METHOD'] = 'PUT';

Request::isPut()
```

### - Comprobar si es una petición DELETE:

```php
$_SERVER['REQUEST_METHOD'] = 'DELETE';

Request::isDelete()
```

### - Comprobar si es una petición AJAX:

```php
$_SERVER['HTTP_X_REQUESTED_WITH'] = 'xmlhttprequest';

Request::isAjax()
```

## Tests 

Para ejecutar las [pruebas](tests) necesitarás [Composer](http://getcomposer.org/download/) y seguir los siguientes pasos:

    $ git clone https://github.com/Josantonius/PHP-Request.git
    
    $ cd PHP-Request

    $ composer install

Ejecutar pruebas unitarias con [PHPUnit](https://phpunit.de/):

    $ composer phpunit

Ejecutar pruebas de estándares de código [PSR2](http://www.php-fig.org/psr/psr-2/) con [PHPCS](https://github.com/squizlabs/PHP_CodeSniffer):

    $ composer phpcs

Ejecutar pruebas con [PHP Mess Detector](https://phpmd.org/) para detectar inconsistencias en el estilo de codificación:

    $ composer phpmd

Ejecutar todas las pruebas anteriores:

    $ composer tests

## ☑ Tareas pendientes

- [ ] Añadir nueva funcionalidad
- [ ] Mejorar pruebas
- [ ] Mejorar documentación
- [ ] Refactorizar código

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

## Repositorio

La estructura de archivos de este repositorio se creó con [PHP-Skeleton](https://github.com/Josantonius/PHP-Skeleton).

## Licencia

Este proyecto está licenciado bajo **licencia MIT**. Consulta el archivo [LICENSE](LICENSE) para más información.

## Copyright

2017 Josantonius, [josantonius.com](https://josantonius.com/)

Si te ha resultado útil, házmelo saber :wink:

Puedes contactarme en [Twitter](https://twitter.com/Josantonius) o a través de mi [correo electrónico](mailto:hello@josantonius.com).