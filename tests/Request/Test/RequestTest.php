<?php
/**
 * PHP library for handling requests.
 * 
 * @author     Josantonius - hello@josantonius.com
 * @copyright  Copyright (c) 2017
 * @license    https://opensource.org/licenses/MIT - The MIT License (MIT)
 * @link       https://github.com/Josantonius/PHP-Request
 * @since      1.1.3 
 */

namespace Josantonius\Request\Test;

use Josantonius\Request\Request,
    PHPUnit\Framework\TestCase;

/**
 * Tests class for Request library.
 *
 * @since 1.1.3
 */
class RequestTest extends TestCase { 

    /**
     * Access to all GET parameters.
     *
     * @since 1.1.3
     *
     * @return void
     */
    public function testGet() {

        $_GET = ['test' => 'value', 'test-2' => 1];

        $this->assertInternalType('array', Request::get());
    }

    /**
     * Access to GET specific key parameter.
     *
     * @since 1.1.3
     *
     * @return void
     */
    public function testGetSpecificKey() {

        $this->assertContains('value', Request::get('test'));
    }

    /**
     * Access to GET specific key parameter when not exists.
     *
     * @since 1.1.3
     *
     * @return void
     */
    public function testGetSpecificKeyError() {

        unset($_GET);

        $this->assertNull(Request::get('?'));        
    }

    /**
     * Access to all GET parameters when not exists.
     *
     * @since 1.1.3
     *
     * @return void
     */
    public function testGetError() {

        $this->assertNull(Request::get());
    }

    /**
     * Access to all POST parameters.
     *
     * @since 1.1.3
     *
     * @return void
     */
    public function testPost() {

        $_POST = ['test' => 'value', 'test-2' => 1];

        $this->assertInternalType('array', Request::post());
    }

    /**
     * Access to POST specific key parameter.
     *
     * @since 1.1.3
     *
     * @return void
     */
    public function testPostSpecificKey() {

        $this->assertContains('value', Request::post('test'));
    }

    /**
     * Access to POST specific key parameter when not exists.
     *
     * @since 1.1.3
     *
     * @return void
     */
    public function testPostSpecificKeyError() {

        unset($_POST);

        $this->assertNull(Request::post('?'));
    }

    /**
     * Access to all POST parameters when not exists.
     *
     * @since 1.1.3
     *
     * @return void
     */
    public function testPostError() {

        $this->assertNull(Request::post());
    }

    /**
     * Access to all FILES parameters.
     *
     * @since 1.1.3
     *
     * @return void
     */
    public function testFiles() {

        $_FILES = ['test' => 'value', 'test-2' => 1];

        $this->assertInternalType('array', Request::files());
    }

    /**
     * Access to FILES specific key parameter.
     *
     * @since 1.1.3
     *
     * @return void
     */
    public function testFilesSpecificKey() {

        $this->assertContains('value', Request::files('test'));
    }

    /**
     * Access to FILES specific key parameter when not exists.
     *
     * @since 1.1.3
     *
     * @return void
     */
    public function testFilesSpecificKeyError() {

        unset($_FILES);

        $this->assertNull(Request::files('?'));
    }

    /**
     * Access to all FILES parameters when not exists.
     *
     * @since 1.1.3
     *
     * @return void
     */
    public function testFilesError() {

        $this->assertNull(Request::files());
    }

    /**
     * Access to PUT specific key parameter when not exists.
     *
     * @since 1.1.3
     *
     * @return void
     */
    public function testPutSpecificKeyError() {

        unset($_PUT);

        $this->assertNull(Request::put('?'));
    }

    /**
     * Access to all PUT parameters when not exists.
     *
     * @since 1.1.3
     *
     * @return void
     */
    public function testPutError() {

        $this->assertCount(0, Request::put());
    }

    /**
     * Access to DEL specific key parameter when not exists.
     *
     * @since 1.1.3
     *
     * @return void
     */
    public function testDelSpecificKeyError() {

        unset($_DEL);

        $this->assertNull(Request::del('?'));
    }

    /**
     * Check if it is a GET request.
     *
     * @since 1.1.3
     *
     * @return void
     */
    public function testIsGet() {

        $this->assertFalse(Request::isGet());
    }

    /**
     * Check if it is a POST request.
     *
     * @since 1.1.3
     *
     * @return void
     */
    public function testIsPost() {

        $this->assertTrue(Request::isPost());
    }

    /**
     * Check if it is a PUT request.
     *
     * @since 1.1.3
     *
     * @return void
     */
    public function testIsPut() {

        $this->assertFalse(Request::isPut());
    }

    /**
     * Check if it is a DELETE request.
     *
     * @since 1.1.3
     *
     * @return void
     */
    public function testIsDelete() {

        $this->assertFalse(Request::isDelete());
    }

    /**
     * Check if it isn't a DELETE request.
     *
     * @since 1.1.3
     *
     * @return void
     */
    public function testIsNotDelete() {

        $this->assertFalse(Request::isDelete());
    }

    /**
     * Check if it is a Ajax request.
     *
     * @since 1.1.3
     *
     * @return void
     */
    public function testIsAjax() {

        $this->assertTrue(Request::isAjax());
    }
}
