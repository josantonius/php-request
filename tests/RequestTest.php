<?php 
/**
 * PHP library for handling requests.
 * 
 * @category   JST
 * @package    Request
 * @subpackage RequestTest
 * @author     Josantonius - info@josantonius.com
 * @copyright  Copyright (c) 2017 JST PHP Framework
 * @license    https://opensource.org/licenses/MIT - The MIT License (MIT)
 * @version    1.0.0
 * @link       https://github.com/Josantonius/PHP-Request
 * @since      File available since 1.0.0 - Update: 2017-01-17
 */

namespace Josantonius\Request\Tests;

use Josantonius\Request\Request;

/**
 * Tests class for Request library.
 *
 * @since 1.0.0
 */
class RequestTest {

    /**
     * Secure access to GET parameters.
     *
     * @since 1.0.0
     */
    public static function testGet() {

        var_dump(Request::get());
    }

    /**
     * Secure access to GET specific key parameters.
     *
     * @since 1.0.0
     */
    public static function testGetSpecificKey() {

        var_dump(Request::get('key'));
    }

    /**
     * Secure access to POST parameters.
     *
     * @since 1.0.0
     */
    public static function testPost() {

        var_dump(Request::post());
    }

    /**
     * Secure access to POST specific key parameters.
     *
     * @since 1.0.0
     */
    public static function testPostSpecificKey() {

        var_dump(Request::post('key'));
    }

    /**
     * Secure access to FILES parameters.
     *
     * @return mixed
     */
    public static function testFiles() {

        var_dump(Request::files());
    }

    /**
     * Secure access to FILES specific key parameters.
     *
     * @return mixed
     */
    public static function testFilesSpecificKey() {

        var_dump(Request::files('key'));
    }

    /**
     * Secure access to PUT parameters.
     *
     * @since 1.0.0
     */
    public static function testPut() {

        var_dump(Request::put());
    }

    /**
     * Secure access to PUT specific key parameters.
     *
     * @since 1.0.0
     */
    public static function testPutSpecificKey() {

        var_dump(Request::put('key'));
    }

    /**
     * Secure access to DELETE parameters.
     *
     * @since 1.0.0
     */
    public static function testDel() {

        var_dump(Request::del());
    }

    /**
     * Secure access to DELETE specific key parameters.
     *
     * @since 1.0.0
     */
    public static function testDelSpecificKey() {

        var_dump(Request::del('key'));
    }

    /**
     * Check if it is a GET request.
     *
     * @since 1.0.0
     */
    public static function testIsGet() {

        var_dump(Request::isGet());
    }

    /**
     * Check if it is a POST request.
     *
     * @since 1.0.0
     *
     * @return boolean
     */
    public static function testIsPost() {

        var_dump(Request::isPost());
    }

    
    /**
     * Check if it is a PUT request.
     *
     * @since 1.0.0
     *
     * @return boolean
     */
    public static function testIsPut() {

        var_dump(Request::isPut());
    }
    
    /**
     * Check if it is a DELETE request.
     *
     * @since 1.0.0
     *
     * @return boolean
     */
    public static function testIsDelete() {

        var_dump(Request::isDelete());
    }

    /**
     * Check if it is a AJAX request.
     *
     * @since 1.0.0
     *
     * @return boolean
     */
    public static function testIsAjax() {

        var_dump(Request::isAjax());
    }
}
