# CHANGELOG

## 1.1.3 - 2017-09-14

* Unit tests supported by `PHPUnit` were added.

* The repository was synchronized with Travis CI to implement continuous integration.
 
* Added `Request/src/bootstrap.php` file

* Added `Request/tests/bootstrap.php` file.

* Added `Request/phpunit.xml.dist` file.
* Added `Request/_config.yml` file.
* Added `Request/.travis.yml` file.

* Deleted `Josantonius\Request\Tests\RequestTest` class.
* Deleted `Josantonius\Request\Tests\RequestTest::testGet()` method.
* Deleted `Josantonius\Request\Tests\RequestTest::testGetSpecificKey()` method.
* Deleted `Josantonius\Request\Tests\RequestTest::testPost()` method.
* Deleted `Josantonius\Request\Tests\RequestTest::testPostSpecificKey()` method.
* Deleted `Josantonius\Request\Tests\RequestTest::testFiles()` method.
* Deleted `Josantonius\Request\Tests\RequestTest::testFilesSpecificKey()` method.
* Deleted `Josantonius\Request\Tests\RequestTest::testPut()` method.
* Deleted `Josantonius\Request\Tests\RequestTest::testPutSpecificKey()` method.
* Deleted `Josantonius\Request\Tests\RequestTest::testDel()` method.
* Deleted `Josantonius\Request\Tests\RequestTest::testDelSpecificKey()` method.
* Deleted `Josantonius\Request\Tests\RequestTest::testIsGet()` method.
* Deleted `Josantonius\Request\Tests\RequestTest::testIsPost()` method.
* Deleted `Josantonius\Request\Tests\RequestTest::testIsPut()` method.
* Deleted `Josantonius\Request\Tests\RequestTest::testIsDelete()` method.
* Deleted `Josantonius\Request\Tests\RequestTest::testIsAjax()` method.

* Added `Josantonius\Request\Test\RequestTest::testGet()` method.
* Added `Josantonius\Request\Test\RequestTest::testGetSpecificKey()` method.
* Added `Josantonius\Request\Test\RequestTest::testGetSpecificKeyError()` method.
* Added `Josantonius\Request\Test\RequestTest::testGetError()` method.
* Added `Josantonius\Request\Test\RequestTest::testPost()` method.
* Added `Josantonius\Request\Test\RequestTest::testPostSpecificKey()` method.
* Added `Josantonius\Request\Test\RequestTest::testPostSpecificKeyError()` method.
* Added `Josantonius\Request\Test\RequestTest::testPostError()` method.
* Added `Josantonius\Request\Test\RequestTest::testFiles()` method.
* Added `Josantonius\Request\Test\RequestTest::testFilesSpecificKey()` method.
* Added `Josantonius\Request\Test\RequestTest::testFilesSpecificKeyError()` method.
* Added `Josantonius\Request\Test\RequestTest::testFilesError()` method.
* Added `Josantonius\Request\Test\RequestTest::testPutSpecificKeyError()` method.
* Added `Josantonius\Request\Test\RequestTest::testPutError()` method.
* Added `Josantonius\Request\Test\RequestTest::testDelSpecificKeyError()` method.
* Added `Josantonius\Request\Test\RequestTest::testIsGet()` method.
* Added `Josantonius\Request\Test\RequestTest::testIsPost()` method.
* Added `Josantonius\Request\Test\RequestTest::testIsPut()` method.
* Added `Josantonius\Request\Test\RequestTest::testIsDelete()` method.
* Added `Josantonius\Request\Test\RequestTest::testIsNotDelete()` method.
* Added `Josantonius\Request\Test\RequestTest::testIsAjax()` method.

## 1.1.2 - 2017-07-16

* Deleted `Josantonius\Request\Exception\RequestException` class.
* Deleted `Josantonius\Request\Exception\Exceptions` abstract class.
* Deleted `Josantonius\Request\Exception\RequestException->__construct()` method.

## 1.1.1 - 2017-03-18

* Some files were excluded from download and comments and readme files were updated.

## 1.1.0 - 2017-01-30

* Compatible with PHP 5.6 or higher.

## 1.0.0 - 2017-01-30

* Compatible only with PHP 7.0 or higher. In the next versions, the library will be modified to make it compatible with PHP 5.6 or higher.

## 1.0.0 - 2017-01-17

* Added `Josantonius\Request\Request` class.
* Added `Josantonius\Request\Request::get()` method.
* Added `Josantonius\Request\Request::post()` method.
* Added `Josantonius\Request\Request::files()` method.
* Added `Josantonius\Request\Request::put()` method.
* Added `Josantonius\Request\Request::del()` method.
* Added `Josantonius\Request\Request::isGet()` method.
* Added `Josantonius\Request\Request::isPost()` method.
* Added `Josantonius\Request\Request::isPut()` method.
* Added `Josantonius\Request\Request::isDelete()` method.
* Added `Josantonius\Request\Request::isAjax()` method.

* Added `Josantonius\Request\Exception\RequestException` class.
* Added `Josantonius\Request\Exception\Exceptions` abstract class.
* Added `Josantonius\Request\Exception\RequestException->__construct()` method.

* Added `Josantonius\Request\Tests\RequestTest` class.
* Added `Josantonius\Request\Tests\RequestTest::testGet()` method.
* Added `Josantonius\Request\Tests\RequestTest::testGetSpecificKey()` method.
* Added `Josantonius\Request\Tests\RequestTest::testPost()` method.
* Added `Josantonius\Request\Tests\RequestTest::testPostSpecificKey()` method.
* Added `Josantonius\Request\Tests\RequestTest::testFiles()` method.
* Added `Josantonius\Request\Tests\RequestTest::testFilesSpecificKey()` method.
* Added `Josantonius\Request\Tests\RequestTest::testPut()` method.
* Added `Josantonius\Request\Tests\RequestTest::testPutSpecificKey()` method.
* Added `Josantonius\Request\Tests\RequestTest::testDel()` method.
* Added `Josantonius\Request\Tests\RequestTest::testDelSpecificKey()` method.
* Added `Josantonius\Request\Tests\RequestTest::testIsGet()` method.
* Added `Josantonius\Request\Tests\RequestTest::testIsPost()` method.
* Added `Josantonius\Request\Tests\RequestTest::testIsPut()` method.
* Added `Josantonius\Request\Tests\RequestTest::testIsDelete()` method.
* Added `Josantonius\Request\Tests\RequestTest::testIsAjax()` method.

