# CHANGELOG

## 1.1.0 - 2017-01-30
* Compatible with PHP 5.6 or higher.

## 1.0.0-v - 2017-01-30
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

## 1.0.0 - 2017-01-17
* Added `Josantonius\Request\Exception\RequestException` class.
* Added `Josantonius\Request\Exception\Exceptions` abstract class.
* Added `Josantonius\Request\Exception\RequestException->__construct()` method.

## 1.0.0 - 2017-01-17
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
