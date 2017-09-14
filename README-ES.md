# PHP Request library

[![Latest Stable Version](https://poser.pugx.org/josantonius/request/v/stable)](https://packagist.org/packages/josantonius/request) [![Total Downloads](https://poser.pugx.org/josantonius/request/downloads)](https://packagist.org/packages/josantonius/request) [![Latest Unstable Version](https://poser.pugx.org/josantonius/request/v/unstable)](https://packagist.org/packages/josantonius/request) [![License](https://poser.pugx.org/josantonius/request/license)](https://packagist.org/packages/josantonius/request) [![Travis](https://travis-ci.org/Josantonius/PHP-Request.svg)](https://travis-ci.org/Josantonius/PHP-Request)

[Spanish version](README-ES.md) 

Biblioteca PHP para manejo de peticiones.

---

- [Instalación](#instalación)
- [Requisitos](#requisitos)
- [Cómo empezar y ejemplos](#cómo-empezar-y-ejemplos)
- [Métodos disponibles](#métodos-disponibles)
- [Uso](#uso)
- [Tests](#tests)
- [Tareas pendientes](#-tareas-pendientes)
- [Contribuir](#contribuir)
- [Repositorio](#repositorio)
- [Licencia](#licencia)
- [Copyright](#copyright)

---

### Instalación 

La mejor forma de instalar esta extensión es a través de [composer](http://getcomposer.org/download/).

Para instalar PHP Request library, simplemente escribe:

    $ composer require Josantonius/Request

El comando anterior sólo instalará los archivos necesarios, si prefieres descargar todo el código fuente (incluyendo tests, directorio vendor, excepciones no utilizadas, documentos...) puedes utilizar:

    $ composer require Josantonius/Request --prefer-source

También puedes clonar el repositorio completo con Git:

	$ git clone https://github.com/Josantonius/PHP-Request.git

### Requisitos

Esta biblioteca es soportada por versiones de PHP 5.6 o superiores y es compatible con versiones de HHVM 3.0 o superiores.

### Cómo empezar y ejemplos

Para utilizar esta biblioteca, simplemente:

```php
require __DIR__ . '/vendor/autoload.php';

use Josantonius\Request\Request;
```
### Métodos disponibles

Métodos disponibles en esta biblioteca:

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
### Uso

Ejemplo de uso para esta biblioteca:

```php
<?php
require __DIR__ . '/vendor/autoload.php';

use Josantonius\Request\Request;

if (Request::isPost()) {

    $name = Request::post('name');
}
```

### Tests 

Para ejecutar las [pruebas](tests/Request/Test) simplemente:

    $ git clone https://github.com/Josantonius/PHP-Request.git
    
    $ cd PHP-Request

    $ phpunit

### ☑ Tareas pendientes

- [x] Completar tests
- [ ] Mejorar la documentación
- [ ] Completar tests para PUT
- [ ] Completar tests para DEL

### Contribuir

1. Comprobar si hay incidencias abiertas o abrir una nueva para iniciar una discusión en torno a un fallo o función.
1. Bifurca la rama del repositorio en GitHub para iniciar la operación de ajuste.
1. Escribe una o más pruebas para la nueva característica o expón el error.
1. Haz cambios en el código para implementar la característica o reparar el fallo.
1. Envía pull request para fusionar los cambios y que sean publicados.

Esto está pensado para proyectos grandes y de larga duración.

### Repositorio

Los archivos de este repositorio se crearon y subieron automáticamente con [Reposgit Creator](https://github.com/Josantonius/BASH-Reposgit).

### Licencia

Este proyecto está licenciado bajo **licencia MIT**. Consulta el archivo [LICENSE](LICENSE) para más información.

### Copyright

2017 Josantonius, [josantonius.com](https://josantonius.com/)

Si te ha resultado útil, házmelo saber :wink:

Puedes contactarme en [Twitter](https://twitter.com/Josantonius) o a través de mi [correo electrónico](mailto:hello@josantonius.com).