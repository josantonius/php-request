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

$method = $_GET['method'];

PutRequestProxy::$method();

class PutRequestProxy
{
    public static function testGetAllParamsAsArrayFromMultipleContentType()
    {
        $_PUT = Request::input('PUT');

        echo json_encode([
            'response' => $_PUT()->asArray()
        ]);
    }

    public static function testGetAllParamsAsArrayFromPutRequest()
    {
        $_PUT = Request::input('PUT');

        echo json_encode([
            'response' => $_PUT()->asArray()
        ]);
    }

    public static function testGetAllParamsAsArrayFromPutRequestAndFilterEachValue()
    {
        $_PUT = Request::input('PUT');

        echo json_encode([
            'response' => $_PUT()->asArray([
                'method' => 'string',
                'nonexistent_key' => 'integer',
            ])
        ]);
    }

    public static function testGetAllParamsAsObjectFromPutRequest()
    {
        $_PUT = Request::input('PUT');

        echo json_encode([
            'response' => $_PUT()->asObject()
        ]);
    }

    public static function testGetAllParamsAsObjectFromPutRequestAndFilterEachValue()
    {
        $_PUT = Request::input('PUT');

        echo json_encode([
            'response' => $_PUT()->asObject([
                'method' => 'string',
                'nonexistent_key' => 'integer',
            ])
        ]);
    }

    public static function testGetAllParamsAsJsonFromPutRequest()
    {
        $_PUT = Request::input('PUT');

        echo json_encode([
            'response' => $_PUT()->asJson()
        ]);
    }

    public static function testGetStringValueAsStringFromPutRequest()
    {
        $_PUT = Request::input('PUT');

        echo json_encode([
            'response' => $_PUT('foo')->asString()
        ]);
    }

    public static function testNonExistentKeyAsStringFromPutRequest()
    {
        $_PUT = Request::input('PUT');

        echo json_encode([
            'response' => $_PUT('?')->asString()
        ]);
    }

    public static function testNonExistentKeyAsStringFromPutRequestAndReturnDefaultParam()
    {
        $_PUT = Request::input('PUT');

        echo json_encode([
            'response' => $_PUT('?')->asString('default_param')
        ]);
    }

    public static function testGetStringValueAsIntegerFromPutRequest()
    {
        $_PUT = Request::input('PUT');

        echo json_encode([
            'response' => $_PUT('foo')->asInteger()
        ]);
    }

    public static function testNonExistentKeyAsIntegerFromPutRequest()
    {
        $_PUT = Request::input('PUT');

        echo json_encode([
            'response' => $_PUT('?')->asInteger()
        ]);
    }

    public static function testNonExistentKeyAsIntegerFromPutRequestAndReturnDefaultParam()
    {
        $_PUT = Request::input('PUT');

        echo json_encode([
            'response' => $_PUT('?')->asInteger(8)
        ]);
    }

    public static function testGetStringValueAsFloatFromPutRequest()
    {
        $_PUT = Request::input('PUT');

        echo json_encode([
            'response' => $_PUT('foo')->asFloat()
        ]);
    }

    public static function testNonExistentKeyAsFloatFromPutRequest()
    {
        $_PUT = Request::input('PUT');

        echo json_encode([
            'response' => $_PUT('?')->asFloat()
        ]);
    }

    public static function testNonExistentKeyAsFloatFromPutRequestAndReturnDefaultParam()
    {
        $_PUT = Request::input('PUT');

        echo json_encode([
            'response' => $_PUT('?')->asFloat(0.8)
        ]);
    }

    public static function testGetStringBooleanTrueValueAsBooleanFromPutRequest()
    {
        $_PUT = Request::input('PUT');

        echo json_encode([
            'response' => $_PUT('foo')->asBoolean()
        ]);
    }

    public static function testGetBooleanTrueValueAsBooleanFromPutRequest()
    {
        $_PUT = Request::input('PUT');

        echo json_encode([
            'response' => $_PUT('foo')->asBoolean()
        ]);
    }

    public static function testGetStringBooleanFalseValueAsBooleanFromPutRequest()
    {
        $_PUT = Request::input('PUT');

        echo json_encode([
            'response' => $_PUT('foo')->asBoolean()
        ]);
    }

    public static function testGetBooleanFalseValueAsBooleanFromPutRequest()
    {
        $_PUT = Request::input('PUT');

        echo json_encode([
            'response' => $_PUT('foo')->asBoolean()
        ]);
    }

    public static function testGetStringIntegerTrueValueAsBooleanFromPutRequest()
    {
        $_PUT = Request::input('PUT');

        echo json_encode([
            'response' => $_PUT('foo')->asBoolean()
        ]);
    }

    public static function testGetIntegerTrueValueAsBooleanFromPutRequest()
    {
        $_PUT = Request::input('PUT');

        echo json_encode([
            'response' => $_PUT('foo')->asBoolean()
        ]);
    }

    public static function testGetStringIntegerFalseValueAsBooleanFromPutRequest()
    {
        $_PUT = Request::input('PUT');

        echo json_encode([
            'response' => $_PUT('foo')->asBoolean()
        ]);
    }

    public static function testGetIntegerFalseValueAsBooleanFromPutRequest()
    {
        $_PUT = Request::input('PUT');

        echo json_encode([
            'response' => $_PUT('foo')->asBoolean()
        ]);
    }

    public static function testNonExistentKeyAsBooleanFromPutRequest()
    {
        $_PUT = Request::input('PUT');

        echo json_encode([
            'response' => $_PUT('?')->asBoolean()
        ]);
    }

    public static function testNonExistentKeyAsBooleanFromPutRequestAndReturnDefaultParam()
    {
        $_PUT = Request::input('PUT');

        echo json_encode([
            'response' => $_PUT('?')->asBoolean(true)
        ]);
    }

    public static function testGetStringValueAsIpFromPutRequest()
    {
        $_PUT = Request::input('PUT');

        echo json_encode([
            'response' => $_PUT('foo')->asIp()
        ]);
    }

    public static function testNonExistentKeyAsIpFromPutRequest()
    {
        $_PUT = Request::input('PUT');

        echo json_encode([
            'response' => $_PUT('?')->asIp()
        ]);
    }

    public static function testNonExistentKeyAsIpFromPutRequestAndReturnDefaultParam()
    {
        $_PUT = Request::input('PUT');

        echo json_encode([
            'response' => $_PUT('?')->asIp('192.168.1.1')
        ]);
    }

    public static function testGetStringValueAsUrlFromPutRequest()
    {
        $_PUT = Request::input('PUT');

        echo json_encode([
            'response' => $_PUT('foo')->asUrl()
        ]);
    }

    public static function testNonExistentKeyAsUrlFromPutRequest()
    {
        $_PUT = Request::input('PUT');

        echo json_encode([
            'response' => $_PUT('?')->asUrl()
        ]);
    }

    public static function testNonExistentKeyAsUrlFromPutRequestAndReturnDefaultParam()
    {
        $_PUT = Request::input('PUT');

        echo json_encode([
            'response' => $_PUT('?')->asUrl('https://josantonius.com')
        ]);
    }

    public static function testGetStringValueAsEmailFromPutRequest()
    {
        $_PUT = Request::input('PUT');

        echo json_encode([
            'response' => $_PUT('foo')->asEmail()
        ]);
    }

    public static function testNonExistentKeyAsEmailFromPutRequest()
    {
        $_PUT = Request::input('PUT');

        echo json_encode([
            'response' => $_PUT('?')->asEmail()
        ]);
    }

    public static function testNonExistentKeyAsEmailFromPutRequestAndReturnDefaultParam()
    {
        $_PUT = Request::input('PUT');

        echo json_encode([
            'response' => $_PUT('?')->asEmail('hello@josantonius.com')
        ]);
    }
}
