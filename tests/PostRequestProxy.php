<?php

/**
 * PHP library for handling requests.
 *
 * @author    Josantonius <hello@josantonius.com>
 * @copyright 2017 - 2018 (c) Josantonius - PHP-Request
 * @license   https://opensource.org/licenses/MIT - The MIT License (MIT)
 * @link      https://github.com/Josantonius/PHP-Request
 * @since     2.0.0
 */

namespace Josantonius\Request\Test;

require '../vendor/autoload.php';

use Josantonius\Request\Request;

$method = $_POST['method'];

PostRequestProxy::$method();

class PostRequestProxy
{
    public static function testGetAllParamsAsArrayFromPostRequest()
    {
        $_POST = Request::input('POST');

        echo json_encode([
            'response' => $_POST()->asArray()
        ]);
    }

    public static function testGetAllParamsAsArrayFromPostRequestAndFilterEachValue()
    {
        $_POST = Request::input('POST');

        echo json_encode([
            'response' => $_POST()->asArray([
                'method' => 'string',
                'nonexistent_key' => 'integer',
            ])
        ]);
    }

    public static function testGetAllParamsAsObjectFromPostRequest()
    {
        $_POST = Request::input('POST');

        echo json_encode([
            'response' => $_POST()->asObject()
        ]);
    }

    public static function testGetAllParamsAsObjectFromPostRequestAndFilterEachValue()
    {
        $_POST = Request::input('POST');

        echo json_encode([
            'response' => $_POST()->asObject([
                'method' => 'string',
                'nonexistent_key' => 'integer',
            ])
        ]);
    }

    public static function testGetAllParamsAsJsonFromPostRequest()
    {
        $_POST = Request::input('POST');

        echo json_encode([
            'response' => $_POST()->asJson()
        ]);
    }

    public static function testGetStringValueAsStringFromPostRequest()
    {
        $_POST = Request::input('POST');

        echo json_encode([
            'response' => $_POST('foo')->asString()
        ]);
    }

    public static function testNonExistentKeyAsStringFromPostRequest()
    {
        $_POST = Request::input('POST');

        echo json_encode([
            'response' => $_POST('?')->asString()
        ]);
    }

    public static function testNonExistentKeyAsStringFromPostRequestAndReturnDefaultParam()
    {
        $_POST = Request::input('POST');

        echo json_encode([
            'response' => $_POST('?')->asString('default_param')
        ]);
    }

    public static function testGetStringValueAsIntegerFromPostRequest()
    {
        $_POST = Request::input('POST');

        echo json_encode([
            'response' => $_POST('foo')->asInteger()
        ]);
    }

    public static function testNonExistentKeyAsIntegerFromPostRequest()
    {
        $_POST = Request::input('POST');

        echo json_encode([
            'response' => $_POST('?')->asInteger()
        ]);
    }

    public static function testNonExistentKeyAsIntegerFromPostRequestAndReturnDefaultParam()
    {
        $_POST = Request::input('POST');

        echo json_encode([
            'response' => $_POST('?')->asInteger(8)
        ]);
    }

    public static function testGetStringValueAsFloatFromPostRequest()
    {
        $_POST = Request::input('POST');

        echo json_encode([
            'response' => $_POST('foo')->asFloat()
        ]);
    }

    public static function testNonExistentKeyAsFloatFromPostRequest()
    {
        $_POST = Request::input('POST');

        echo json_encode([
            'response' => $_POST('?')->asFloat()
        ]);
    }

    public static function testNonExistentKeyAsFloatFromPostRequestAndReturnDefaultParam()
    {
        $_POST = Request::input('POST');

        echo json_encode([
            'response' => $_POST('?')->asFloat(0.8)
        ]);
    }

    public static function testGetStringBooleanTrueValueAsBooleanFromPostRequest()
    {
        $_POST = Request::input('POST');

        echo json_encode([
            'response' => $_POST('foo')->asBoolean()
        ]);
    }

    public static function testGetBooleanTrueValueAsBooleanFromPostRequest()
    {
        $_POST = Request::input('POST');

        echo json_encode([
            'response' => $_POST('foo')->asBoolean()
        ]);
    }

    public static function testGetStringBooleanFalseValueAsBooleanFromPostRequest()
    {
        $_POST = Request::input('POST');

        echo json_encode([
            'response' => $_POST('foo')->asBoolean()
        ]);
    }

    public static function testGetBooleanFalseValueAsBooleanFromPostRequest()
    {
        $_POST = Request::input('POST');

        echo json_encode([
            'response' => $_POST('foo')->asBoolean()
        ]);
    }

    public static function testGetStringIntegerTrueValueAsBooleanFromPostRequest()
    {
        $_POST = Request::input('POST');

        echo json_encode([
            'response' => $_POST('foo')->asBoolean()
        ]);
    }

    public static function testGetIntegerTrueValueAsBooleanFromPostRequest()
    {
        $_POST = Request::input('POST');

        echo json_encode([
            'response' => $_POST('foo')->asBoolean()
        ]);
    }

    public static function testGetStringIntegerFalseValueAsBooleanFromPostRequest()
    {
        $_POST = Request::input('POST');

        echo json_encode([
            'response' => $_POST('foo')->asBoolean()
        ]);
    }

    public static function testGetIntegerFalseValueAsBooleanFromPostRequest()
    {
        $_POST = Request::input('POST');

        echo json_encode([
            'response' => $_POST('foo')->asBoolean()
        ]);
    }

    public static function testNonExistentKeyAsBooleanFromPostRequest()
    {
        $_POST = Request::input('POST');

        echo json_encode([
            'response' => $_POST('?')->asBoolean()
        ]);
    }

    public static function testNonExistentKeyAsBooleanFromPostRequestAndReturnDefaultParam()
    {
        $_POST = Request::input('POST');

        echo json_encode([
            'response' => $_POST('?')->asBoolean(true)
        ]);
    }

    public static function testGetStringValueAsIpFromPostRequest()
    {
        $_POST = Request::input('POST');

        echo json_encode([
            'response' => $_POST('foo')->asIp()
        ]);
    }

    public static function testNonExistentKeyAsIpFromPostRequest()
    {
        $_POST = Request::input('POST');

        echo json_encode([
            'response' => $_POST('?')->asIp()
        ]);
    }

    public static function testNonExistentKeyAsIpFromPostRequestAndReturnDefaultParam()
    {
        $_POST = Request::input('POST');

        echo json_encode([
            'response' => $_POST('?')->asIp('192.168.1.1')
        ]);
    }

    public static function testGetStringValueAsUrlFromPostRequest()
    {
        $_POST = Request::input('POST');

        echo json_encode([
            'response' => $_POST('foo')->asUrl()
        ]);
    }

    public static function testNonExistentKeyAsUrlFromPostRequest()
    {
        $_POST = Request::input('POST');

        echo json_encode([
            'response' => $_POST('?')->asUrl()
        ]);
    }

    public static function testNonExistentKeyAsUrlFromPostRequestAndReturnDefaultParam()
    {
        $_POST = Request::input('POST');

        echo json_encode([
            'response' => $_POST('?')->asUrl('https://josantonius.com')
        ]);
    }

    public static function testGetStringValueAsEmailFromPostRequest()
    {
        $_POST = Request::input('POST');

        echo json_encode([
            'response' => $_POST('foo')->asEmail()
        ]);
    }

    public static function testNonExistentKeyAsEmailFromPostRequest()
    {
        $_POST = Request::input('POST');

        echo json_encode([
            'response' => $_POST('?')->asEmail()
        ]);
    }

    public static function testNonExistentKeyAsEmailFromPostRequestAndReturnDefaultParam()
    {
        $_POST = Request::input('POST');

        echo json_encode([
            'response' => $_POST('?')->asEmail('hello@josantonius.com')
        ]);
    }
}
