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

DeleteRequestProxy::$method();

class DeleteRequestProxy
{
    public static function testGetAllParamsAsArrayFromMultipleContentType()
    {
        $_DELETE = Request::input('DELETE');

        echo json_encode([
            'response' => $_DELETE()->asArray()
        ]);
    }

    public static function testGetAllParamsAsArrayFromDeleteRequest()
    {
        $_DELETE = Request::input('DELETE');

        echo json_encode([
            'response' => $_DELETE()->asArray()
        ]);
    }

    public static function testGetAllParamsAsArrayFromDeleteRequestAndFilterEachValue()
    {
        $_DELETE = Request::input('DELETE');

        echo json_encode([
            'response' => $_DELETE()->asArray([
                'method' => 'string',
                'nonexistent_key' => 'integer',
            ])
        ]);
    }

    public static function testGetAllParamsAsObjectFromDeleteRequest()
    {
        $_DELETE = Request::input('DELETE');

        echo json_encode([
            'response' => $_DELETE()->asObject()
        ]);
    }

    public static function testGetAllParamsAsObjectFromDeleteRequestAndFilterEachValue()
    {
        $_DELETE = Request::input('DELETE');

        echo json_encode([
            'response' => $_DELETE()->asObject([
                'method' => 'string',
                'nonexistent_key' => 'integer',
            ])
        ]);
    }

    public static function testGetAllParamsAsJsonFromDeleteRequest()
    {
        $_DELETE = Request::input('DELETE');

        echo json_encode([
            'response' => $_DELETE()->asJson()
        ]);
    }

    public static function testGetStringValueAsStringFromDeleteRequest()
    {
        $_DELETE = Request::input('DELETE');

        echo json_encode([
            'response' => $_DELETE('foo')->asString()
        ]);
    }

    public static function testNonExistentKeyAsStringFromDeleteRequest()
    {
        $_DELETE = Request::input('DELETE');

        echo json_encode([
            'response' => $_DELETE('?')->asString()
        ]);
    }

    public static function testNonExistentKeyAsStringFromDeleteRequestAndReturnDefaultParam()
    {
        $_DELETE = Request::input('DELETE');

        echo json_encode([
            'response' => $_DELETE('?')->asString('default_param')
        ]);
    }

    public static function testGetStringValueAsIntegerFromDeleteRequest()
    {
        $_DELETE = Request::input('DELETE');

        echo json_encode([
            'response' => $_DELETE('foo')->asInteger()
        ]);
    }

    public static function testNonExistentKeyAsIntegerFromDeleteRequest()
    {
        $_DELETE = Request::input('DELETE');

        echo json_encode([
            'response' => $_DELETE('?')->asInteger()
        ]);
    }

    public static function testNonExistentKeyAsIntegerFromDeleteRequestAndReturnDefaultParam()
    {
        $_DELETE = Request::input('DELETE');

        echo json_encode([
            'response' => $_DELETE('?')->asInteger(8)
        ]);
    }

    public static function testGetStringValueAsFloatFromDeleteRequest()
    {
        $_DELETE = Request::input('DELETE');

        echo json_encode([
            'response' => $_DELETE('foo')->asFloat()
        ]);
    }

    public static function testNonExistentKeyAsFloatFromDeleteRequest()
    {
        $_DELETE = Request::input('DELETE');

        echo json_encode([
            'response' => $_DELETE('?')->asFloat()
        ]);
    }

    public static function testNonExistentKeyAsFloatFromDeleteRequestAndReturnDefaultParam()
    {
        $_DELETE = Request::input('DELETE');

        echo json_encode([
            'response' => $_DELETE('?')->asFloat(0.8)
        ]);
    }

    public static function testGetStringBooleanTrueValueAsBooleanFromDeleteRequest()
    {
        $_DELETE = Request::input('DELETE');

        echo json_encode([
            'response' => $_DELETE('foo')->asBoolean()
        ]);
    }

    public static function testGetBooleanTrueValueAsBooleanFromDeleteRequest()
    {
        $_DELETE = Request::input('DELETE');

        echo json_encode([
            'response' => $_DELETE('foo')->asBoolean()
        ]);
    }

    public static function testGetStringBooleanFalseValueAsBooleanFromDeleteRequest()
    {
        $_DELETE = Request::input('DELETE');

        echo json_encode([
            'response' => $_DELETE('foo')->asBoolean()
        ]);
    }

    public static function testGetBooleanFalseValueAsBooleanFromDeleteRequest()
    {
        $_DELETE = Request::input('DELETE');

        echo json_encode([
            'response' => $_DELETE('foo')->asBoolean()
        ]);
    }

    public static function testGetStringIntegerTrueValueAsBooleanFromDeleteRequest()
    {
        $_DELETE = Request::input('DELETE');

        echo json_encode([
            'response' => $_DELETE('foo')->asBoolean()
        ]);
    }

    public static function testGetIntegerTrueValueAsBooleanFromDeleteRequest()
    {
        $_DELETE = Request::input('DELETE');

        echo json_encode([
            'response' => $_DELETE('foo')->asBoolean()
        ]);
    }

    public static function testGetStringIntegerFalseValueAsBooleanFromDeleteRequest()
    {
        $_DELETE = Request::input('DELETE');

        echo json_encode([
            'response' => $_DELETE('foo')->asBoolean()
        ]);
    }

    public static function testGetIntegerFalseValueAsBooleanFromDeleteRequest()
    {
        $_DELETE = Request::input('DELETE');

        echo json_encode([
            'response' => $_DELETE('foo')->asBoolean()
        ]);
    }

    public static function testNonExistentKeyAsBooleanFromDeleteRequest()
    {
        $_DELETE = Request::input('DELETE');

        echo json_encode([
            'response' => $_DELETE('?')->asBoolean()
        ]);
    }

    public static function testNonExistentKeyAsBooleanFromDeleteRequestAndReturnDefaultParam()
    {
        $_DELETE = Request::input('DELETE');

        echo json_encode([
            'response' => $_DELETE('?')->asBoolean(true)
        ]);
    }

    public static function testGetStringValueAsIpFromDeleteRequest()
    {
        $_DELETE = Request::input('DELETE');

        echo json_encode([
            'response' => $_DELETE('foo')->asIp()
        ]);
    }

    public static function testNonExistentKeyAsIpFromDeleteRequest()
    {
        $_DELETE = Request::input('DELETE');

        echo json_encode([
            'response' => $_DELETE('?')->asIp()
        ]);
    }

    public static function testNonExistentKeyAsIpFromDeleteRequestAndReturnDefaultParam()
    {
        $_DELETE = Request::input('DELETE');

        echo json_encode([
            'response' => $_DELETE('?')->asIp('192.168.1.1')
        ]);
    }

    public static function testGetStringValueAsUrlFromDeleteRequest()
    {
        $_DELETE = Request::input('DELETE');

        echo json_encode([
            'response' => $_DELETE('foo')->asUrl()
        ]);
    }

    public static function testNonExistentKeyAsUrlFromDeleteRequest()
    {
        $_DELETE = Request::input('DELETE');

        echo json_encode([
            'response' => $_DELETE('?')->asUrl()
        ]);
    }

    public static function testNonExistentKeyAsUrlFromDeleteRequestAndReturnDefaultParam()
    {
        $_DELETE = Request::input('DELETE');

        echo json_encode([
            'response' => $_DELETE('?')->asUrl('https://josantonius.com')
        ]);
    }

    public static function testGetStringValueAsEmailFromDeleteRequest()
    {
        $_DELETE = Request::input('DELETE');

        echo json_encode([
            'response' => $_DELETE('foo')->asEmail()
        ]);
    }

    public static function testNonExistentKeyAsEmailFromDeleteRequest()
    {
        $_DELETE = Request::input('DELETE');

        echo json_encode([
            'response' => $_DELETE('?')->asEmail()
        ]);
    }

    public static function testNonExistentKeyAsEmailFromDeleteRequestAndReturnDefaultParam()
    {
        $_DELETE = Request::input('DELETE');

        echo json_encode([
            'response' => $_DELETE('?')->asEmail('hello@josantonius.com')
        ]);
    }
}
